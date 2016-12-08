<?php
$cart = \Yii::$app->cart;

foreach ($menuItems as $item) {
    echo "<li class='subMenu'> <a>".strtoupper($item['label'])." </a>";
		if ($item['items'] !== null) {
			echo "<ul>";
			foreach($item['items'] as $i) {            
	        	echo "<li> <a>".strtoupper($i['label'])." </a></li>";
	    		}
			echo "</ul>";
		}
	echo "</li>";
}

?>

	<li style="border:0"> &nbsp;</li>						
	<li> <a href="product_summary.html"><strong>Belanja: <?= $cart->getCount(); ?>  <span class="btn btn-warning pull-right" style="line-height:16px;">Rp. <?= number_format( $cart->getCost(), 0 , '' , '.' ); ?></span></strong></a></li>
	<li style="border:0"> &nbsp;</li>	