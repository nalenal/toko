<?php
/* @var $this yii\web\View */
?>


		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
              <div class="item active">
                <img style="width:100%" src="assets/carousel/1.jpg" alt=""/>
				<div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
              </div>
			  <div class="item">
                <img style="width:100%" src="assets/carousel/2.jpg" alt=""/>
					<div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
              </div>
			</div>
			<!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
			<a href="special_offer.html" id="spcialBtn" class="btn btn-large pull-right btn-success" >Special Offer</a> 
          </div>
		  
	<div class="row">
	<div id="sidebar" class="span3">
	
	<ul class="nav nav-list bs-docs-sidenav" style="display: block;">
		<strong>
	KATEGORI
	</strong>

	<?php

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
		
		?>

		<li style="border:0"> &nbsp;</li>						
		<li> <a href="product_summary.html"><strong>Belanja: 3  <span class="btn btn-warning pull-right" style="line-height:16px;">Rp. 155.000</span></strong></a></li>
		<li style="border:0"> &nbsp;</li>	

	  </ul>
</div>

	<div class="span9">
	<div>
		<h3>Produk Baru</h3>
		<div class="row-fluid">
		<div id="myCarousel1" class="carousel slide">
              <div class="item active">
		  
		   <div class="item">
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/5.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/6.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/7.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/8.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>
		  </div>
		   <div class="item">
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/9.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/10.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/11.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/1.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>
		  </div>
		   <div class="item">
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/2.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/3.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/4.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/5.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>
		  </div>
		  </div>
		  </div>		  
		  </div>
		  
		  
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/6.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/7.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/8.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>
		  
		  <h3>Produk Terlaris</h3>
		  
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/9.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/10.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				  <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a  href="product_details.html"><img src="assets/products/11.jpg" alt=""/></a>
				<div class="caption">
				  <h5>Product name</h5>
				  <p> 
					Lorem Ipsum is simply dummy text. 
				  </p>
				   <h4><a class="btn btn-large" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>	
		</div>
	</div>
	</div>