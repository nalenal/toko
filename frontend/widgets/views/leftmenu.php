<?php
$cart = \Yii::$app->cart;


foreach ($menuItems as $item) {

 //   echo "<li class='subMenu'> <a>".strtoupper($item['label'])." </a>";
    ?>          
    	<li> <a href="<?php echo \Yii::$app->request->baseUrl.'/'.$item['url']; ?> "> <?php echo strtoupper($item['label']) ?> </a>
    	</li>
	<?php
		if ($item['items'] !== null) {
			echo "<ul>";
			foreach($item['items'] as $i) { 
			?>          
	        	<li> <a href= <?php echo $i['url']; ?> > <?php echo strtoupper($i['label']) ?> </a>
	        	</li>
	    	<?php
	    		}
			echo "</ul>";
		}
	echo "</li>";
}

// print_r($menuItems);
?>

	<li style="border:0"> &nbsp;</li>						
	<li> <a href="<?php echo \Yii::$app->request->baseUrl; ?>/cart/list"><strong>Belanja: <?= $cart->getCount(); ?>  <span class="btn btn-warning pull-right" style="line-height:16px;">Rp. <?= number_format( $cart->getCost(), 0 , '' , '.' ); ?></span></strong></a></li>
	<li style="border:0"> &nbsp;</li>	