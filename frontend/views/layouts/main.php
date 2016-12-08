<?php
use yii\helpers\Html;
//use yii\bootstrap\Nav;
///use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use frontend\assets\TokoAsset;
//use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

TokoAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
  <!-- Navbar
    ================================================== -->
<div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
                	<a id="logoM" href="index.html"><img src="<?php echo \Yii::$app->request->baseUrl; ?>/img/logo.png" alt="Bootsshop"/>
                	</a>

            	  <a data-target="#sidebar" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="nav-collapse">
                    <ul class="nav">
					  <li class="active"><a href="index.html">Home	</a></li>
					  <li class=""><a href="special_offer.html">Specials Offer</a></li>
					  <li class=""><a href="normal.html">Delivery</a></li>
					  <li class=""><a href="contact.html">Contact</a></li>
					</ul>
                    <form action="#" class="navbar-search pull-left">
                     <input id="srchFld" type="text" placeholder="I'm looking for ..." class="search-query span5"/>
                    </form>
                    <ul class="nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Login <b class="caret"></b></a>
						<div class="dropdown-menu">
						<form class="form-horizontal loginFrm">
						  <div class="control-group">								
							<input type="text" class="span2" id="inputEmail" placeholder="Email">
						  </div>
						  <div class="control-group">
							<input type="password" class="span2" id="inputPassword" placeholder="Password">
						  </div>
						  <div class="control-group">
							<label class="checkbox">
							<input type="checkbox"> Remember me
							</label>
							<button type="submit" class="btn pull-right">Sign in</button>
						  </div>
						</form>					
						</div>
					</li>
					</ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
<!-- ======================================================================================================================== -->	
<?php
$cart = \Yii::$app->cart;
?>
<div id="mainBody" class="container">
<header id="header">
<div class="row">
<div class="span12">
	<a href="index.html"><img src="<?php echo \Yii::$app->request->baseUrl; ?>/img/logo.png" alt="Bootsshop"/></a>
<div class="pull-right"> <br/>
	<a href="<?php echo \Yii::$app->request->baseUrl.'/cart/list'; ?>"> <span class="btn btn-medium btn-info"> <i class="icon-shopping-cart icon-white"></i> [ <?= $cart->getCount(); ?> ] </span> </a>
	<a href="<?php echo \Yii::$app->request->baseUrl.'/cart/list'; ?>"><span class="btn btn-medium btn-warning">Rp. <?= number_format( $cart->getCost(), 0 , '' , '.' ); ?></span></a>
</div>
</div>
</div>
<div class="clr"></div>
</header>
<!-- ==================================================Header End====================================================================== -->

<?php
		echo $content;
?>

<!-- Footer ------------------------------------------------------ -->
<hr class="soft">
<div  id="footerSection">
	<div class="row">
		<div class="span3">
			<h5>TENTANG KAMI</h6>
			<a href="login.html">YOUR ACCOUNT</a>
			<a href="login.html">PERSONAL INFORMATION</a> 
		 </div>
		<div class="span3">
			<h5>INFORMATION</h5>
			<a href="contact.html">CONTACT</a>  
			<a href="register.html">REGISTRATION</a>  
			<a href="legal_notice.html">LEGAL NOTICE</a>  
		 </div>
		<div class="span3">
			<h5>CONTACT US</h5>
			<img width="25" src="<?php echo \Yii::$app->request->baseUrl; ?>/img/rss.png" title="facebook"/> 08500000001<br />
			<img width="25" src="<?php echo \Yii::$app->request->baseUrl; ?>/img/rss.png" title="facebook"/> 08500000002<br />
			<img width="25" src="<?php echo \Yii::$app->request->baseUrl; ?>/img/rss.png" title="facebook"/> 08500000003<br />
		 </div>
		<div id="socialMedia" class="span3 pull-right">
			<h5>SOCIAL MEDIA </h5>
			<a href="#"><img width="60" src="<?php echo \Yii::$app->request->baseUrl; ?>/img/facebook.png" title="facebook"/></a>
			<a href="#"><img width="60" src="<?php echo \Yii::$app->request->baseUrl; ?>/img/twitter.png" title="twitter"/></a>
			<!--
			<a href="#"><img width="60" src="img/rss.png" title="rss"/></a>
			<a href="#"><img width="60" src="img/youtube.png" title="youtube"/></a>
			-->
		 </div> 
	 </div>
	 <hr class="soft">
	<p class="pull-right">&copy; Boot'sshop</p>
</div><!-- /container -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="js/jquery.js"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/jquery.lightbox-0.5.js"></script>
	<script src="js/bootsshoptgl.js"></script>
	-->
	 <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>