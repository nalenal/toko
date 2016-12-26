<?php

namespace frontend\widgets;

use yii\base\Widget;
//use yii\helpers\Html;
use common\models\Category;


Class LeftMenu extends Widget
{

    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        $categories = Category::find()->indexBy('id')->orderBy('id')->all();
        
        return $this->render('leftmenu', [
                'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
            ]);
    }

    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => $activeId === $category->id,
                    'label' => $category->title,
                    'url' => 'katalog/list?kategori='.$category->slug,
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }

}