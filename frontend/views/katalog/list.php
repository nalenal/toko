<?php
/* @var $this yii\web\View */

 use frontend\widgets\LeftMenu; 
 use yii\widgets\ListView;
?>


<div class="row">
	<div id="sidebar" class="span3">
	
		<ul class="nav nav-list bs-docs-sidenav" style="display: block;">
			<strong>
		KATEGORI
		</strong>

		<?php

		echo LeftMenu::widget();	
		?>

		  </ul>
	</div>


	<div class="span9 pull-right thumbnails">
		<?php
		//	print_r($productsDataProvider);
		?>
		<br />
		<?= ListView::widget([
              'dataProvider' => $productsDataProvider,
              'itemView' => '_product',
        //      'class' => 'span3',
          ]) ?>
	</div>
</div>
