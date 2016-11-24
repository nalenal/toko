
<?php

use yii\helpers\Html;
// @var variable dari controller 
//	print_r($product);
	print_r($images[0]);

//$this->title = ;
$this->registerMetaTag(['name' => 'keyword', 'content'=>'shop']);
$this->registerMetaTag(['name'=> 'description', 'content'=>'shop'], 'description');
?>
<!-- ==================================================Header End====================================================================== -->
<div class="row">

	<div id="sidebar" class="span3">
	
	<ul class="nav nav-list bs-docs-sidenav" style="display: block;">
		<strong>
	KATEGORI
	</strong>

	<?php
	/*
		foreach ($menuItems as $item) {
            echo "<li class='subMenu'> <a>".$item['label']." </a>";
				if ($item['items'] !== null) {
					echo "<ul>";
					foreach($item['items'] as $i) {            
		        		echo "<li> <a>".$i['label']." </a></li>";
		    		}
					echo "</ul>";
				}
				echo "</li>";
        }
	*/	
		?>

		<li style="border:0"> &nbsp;</li>						
		<li> <a href="product_summary.html"><strong>Belanja: 3  <span class="btn btn-warning pull-right" style="line-height:16px;">Rp. 155.000</span></strong></a></li>
		<li style="border:0"> &nbsp;</li>	

	  </ul>
</div>

	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Produk</a> <span class="divider">/</span></li>
    <li class="active">Detail Produk</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
			
            <a href="assets/products/large/f1.jpg" title="<h4>Fujifilm FinePix S2950 Digital Camera</h4>">
            <?php
				if (isset($images[0])) {
		            echo Html::img($images[0]->getUrl(), ['width' => '100%']);
		        }
				else {
					echo "Gambar Tidak Tersedia";
				}
			?>

            </a>
			<div id="myCarousel" class="moreOptopm carousel slide">
				<center>
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="assets/products/large/f1.jpg"> <img width="29%" src="assets/products/large/f1.jpg" alt=""/></a>
                   <a href="assets/products/large/f2.jpg"> <img width="29%" src="assets/products/large/f2.jpg" alt=""/></a>

                  </div>
                  <div class="item">
                   <a href="assets/products/large/f3.jpg" > <img width="29%" src="assets/products/large/f3.jpg" alt=""/></a>
                   <a href="assets/products/large/f1.jpg"> <img width="29%" src="assets/products/large/f1.jpg" alt=""/></a>

                  </div>
                </div>
               </center>
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
              <br />
			 <h6>Klik Gambar Untuk Memperbesar Gambar</h6>
              </div>
			  
			</div>
			<div class="span6">
				<h3> <?= $product->title; ?>  </h3>
				<small> <?= $product->shortdesc; ?> </small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>Rp. <?= $product->price; ?> </span></label>
					<div class="controls">
					  <button type="submit" class="btn btn-large"><i class=" icon-shopping-cart"></i> Beli Ini</button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4>Ready Stock</h4>

				<hr class="soft"/>
				<p>
				<?= $product->description; ?>

				Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).
				
				</p>
				<hr class="soft"/>
			</div>
			
			
	</div>
</div>
</div> <!-- Body wrapper -->
<!-- Footer ------------------------------------------------------ -->
<hr class="soft">

    <!-- Le javascript
    ================================================== -->
	 <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
  </body>
</html>