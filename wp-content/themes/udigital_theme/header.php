<?php global $my_redux; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="" type="image/vnd.microsoft.icon" />	

<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--------------------- HEADER ----------------------->
	<header>
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-12 col-md-8">
            <p class="mb-0 py-2 py-lg-0"><?php echo $my_redux['cta-header'] ?></p>
          </div>
          <div class="col-lg-auto d-none d-lg-block">
            <nav class="navbar navbar-expand-lg top-menu">
              <div class="collapse navbar-collapse" id="navbarTop">
                <?php
                    wp_nav_menu(array(
                      'theme_location' => 'top-menu',
                      'depth'		 => 2,
                      'container'	 => false,
                      'menu_class' => 'navbar-nav',
                    ));
                ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="main-header">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-6 col-lg-3 ps-md-0">
            <a href="<?php echo home_url('/'); ?>">
              <img class="ml-0" src="<?php echo $my_redux['logo-image']['url']; ?>" alt="">
            </a>
          </div>
          <div class="d-block d-lg-none">
            <div class="col-auto">
            <a href="#" class="showmenu text-secondary" data-toggle="collapse" data-bs-target="#navbarSupportedContentMb" aria-controls="navbarSupportedContentMb" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></a>
            </div>
            
          </div>
          <div class="col-lg-auto d-none d-lg-block pe-md-0">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="pr-0">
                  <nav class="navbar navbar-expand-lg pt-3 pb-0 px-0">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                      <?php
                          wp_nav_menu(array(
                            'theme_location' => 'first-menu',
                            'depth'		 => 3,
                            'container'	 => false,
                            'menu_class' => 'navbar-nav',
                            'walker'	 => new Bootstrap_Walker_Nav_Menu(),
                          ));
                      ?>
                    </div>
                  </nav>
              </div>
            </nav>
          </div>
        </div>
        <div class="mobile-menu d-block d-lg-none">
          <div class="container px-0">
            <nav class="navbar navbar-expand-lg py-0 px-0">
              <div class="collapse navbar-collapse pt-2" id="navbarSupportedContentMb">
                <?php
                  wp_nav_menu(array(
                      'theme_location' => 'first-menu-m',
                      'depth'		 => 3,
                      'container'	 => false,
                      'menu_class' => 'navbar-nav',
                      'walker'	 => new Bootstrap_Walker_Nav_Menu(),
                  ));
                ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
      
    </div>
  </header>