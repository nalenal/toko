<?php

namespace yz\shoppingcart;

use Yii;
use yii\base\Component;
use yii\base\Event;
use yii\di\Instance;
use yii\web\Session;


/**
 * Class ShoppingCart
 * @property CartPositionInterface[] $positions
 * @property int $count Total count of positions in the cart
 * @property int $cost Total cost of positions in the cart
 * @property bool $isEmpty Returns true if cart is empty
 * @property string $hash Returns hash (md5) of the current cart, that is uniq to the current combination
 * of positions, quantities and costs
 * @property string $serialized Get/set serialized content of the cart
 * @package \yz\shoppingcart
 */
class ShoppingCart extends Component
{
    /** Triggered on position put */
    const EVENT_POSITION_PUT = 'putPosition';
    /** Triggered on position update */
    const EVENT_POSITION_UPDATE = 'updatePosition';
    /** Triggered on after position remove */
    const EVENT_BEFORE_POSITION_REMOVE = 'removePosition';
    /** Triggered on any cart change: add, update, delete position */
    const EVENT_CART_CHANGE = 'cartChange';
    /** Triggered on after cart cost calculation */
    const EVENT_COST_CALCULATION = 'costCalculation';

    /**
     * If true (default) cart will be automatically stored in and loaded from session.
     * If false - you should do this manually with saveToSession and loadFromSession methods
     * @var bool
     */
    public $storeInSession = true;
    /**
     * Session component
     * @var string|Session
     */
    public $session = 'session';
    /**
     * Shopping cart ID to support multiple carts
     * @var string
     */
    public $cartId = __CLASS__;
    /**
     * @var CartPositionInterface[]
     */
    protected $_positions = [];

    public function init()
    {
        if ($this->storeInSession)
            $this->loadFromSession();
    }

    /**
     * Loads cart from session
     */
    public function loadFromSession()
    {
        $this->session = Instance::ensure($this->session, Session::className());
        if (isset($this->session[$this->cartId]))
            $this->setSerialized($this->session[$this->cartId]);
    }

    /**
     * Saves cart to the session
     */
    public function saveToSession()
    {
        $this->session = Instance::ensure($this->session, Session::className());
        $this->session[$this->cartId] = $this->getSerialized();
    }

    /**
     * Sets cart from serialized string
     * @param string $serialized
     */
    public function setSerialized($serialized)
    {
        $this->_positions = unserialize($serialized);
    }

    /**
     * @param CartPositionInterface $position
     * @param int $quantity
     */
    public function put($position, $quantity = 1)
    {
        if (isset($this->_positions[$position->getId()])) {
            $this->_positions[$position->getId()]->setQuantity(
                $this->_positions[$position->getId()]->getQuantity() + $quantity);
        } else {
            $position->setQuantity($quantity);
            $this->_positions[$position->getId()] = $position;
        }
        $this->trigger(self::EVENT_POSITION_PUT, new Event([
            'data' => $this->_positions[$position->getId()],
        ]));
        $this->trigger(self::EVENT_CART_CHANGE, new Event([
            'data' => ['action' => 'put', 'position' => $this->_positions[$position->getId()]],
        ]));
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns cart positions as serialized items
     * @return string
     */
    public function getSerialized()
    {
        return serialize($this->_positions);
    }

    /**
     * @param CartPositionInterface $position
     * @param int $quantity
     */
    public function update($position, $quantity)
    {
        if ($quantity <= 0) {
            $this->remove($position);
            return;
        }

        if (isset($this->_positions[$position->getId()])) {
            $this->_positions[$position->getId()]->setQuantity($quantity);
        } else {
            $position->setQuantity($quantity);
            $this->_positions[$position->getId()] = $position;
        }
        $this->trigger(self::EVENT_POSITION_UPDATE, new Event([
            'data' => $this->_positions[$position->getId()],
        ]));
        $this->trigger(self::EVENT_CART_CHANGE, new Event([
            'data' => ['action' => 'update', 'position' => $this->_positions[$position->getId()]],
        ]));
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Removes position from the cart
     * @param CartPositionInterface $position
     */
    public function remove($position)
    {
        $this->trigger(self::EVENT_BEFORE_POSITION_REMOVE, new Event([
            'data' => $this->_positions[$position->getId()],
        ]));
        $this->trigger(self::EVENT_CART_CHANGE, new Event([
            'data' => ['action' => 'remove', 'position' => $this->_positions[$position->getId()]],
        ]));
        unset($this->_positions[$position->getId()]);
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Remove all positions
     */
    public function removeAll()
    {
        $this->_positions = [];
        $this->trigger(self::EVENT_CART_CHANGE, new Event([
            'data' => ['action' => 'removeAll'],
        ]));
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns position by it's id. Null is returned if position was not found
     * @param string $id
     * @return CartPositionInterface|null
     */
    public function getPositionById($id)
    {
        if ($this->hasPosition($id))
            return $this->_positions[$id];
        else
            return null;
    }

    /**
     * Checks whether cart position exists or not
     * @param string $id
     * @return bool
     */
    public function hasPosition($id)
    {
        return isset($this->_positions[$id]);
    }

    /**
     * @return CartPositionInterface[]
     */
    public function getPositions()
    {
        return $this->_positions;
    }

    /**
     * @param CartPositionInterface[] $positions
     */
    public function setPositions($positions)
    {
        $this->_positions = $positions;
        $this->trigger(self::EVENT_CART_CHANGE, new Event([
            'data' => ['action' => 'positions'],
        ]));
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns true if cart is empty
     * @return bool
     */
    public function getIsEmpty()
    {
        return count($this->_positions) == 0;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        $count = 0;
        foreach ($this->_positions as $position)
            $count += $position->getQuantity();
        return $count;
    }

    /**
     * Return full cart cost as a sum of the individual positions costs
     * @param $withDiscount
     * @return int
     */
    public function getCost($withDiscount = false)
    {
        $cost = 0;
        foreach ($this->_positions as $position) {
            $cost += $position->getCost($withDiscount);
        }
        $costEvent = new CostCalculationEvent([
            'baseCost' => $cost,
        ]);
        $this->trigger(self::EVENT_COST_CALCULATION, $costEvent);
        if ($withDiscount)
            $cost = max(0, $cost - $costEvent->discountValue);
        return $cost;
    }

    /**
     * Returns hash (md5) of the current cart, that is unique to the current combination
     * of positions, quantities and costs. This helps us fast compare if two carts are the same, or not, also
     * we can detect if cart is changed (comparing hash to the one's saved somewhere)
     * @return string
     */
    public function getHash()
    {
        $data = [];
        foreach ($this->positions as $position) {
            $data[] = [$position->getId(), $position->getQuantity(), $position->getPrice()];
        }
        return md5(serialize($data));
    }


}
