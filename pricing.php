<?php
// Detectar el idioma seleccionado manualmente o automáticamente
function obtenerIdioma() {
    $idiomasDisponibles = ['es', 'en', 'fr', 'ptBR']; // Idiomas soportados

    // Si se pasa un idioma como parámetro en la URL, lo utilizamos
    if (isset($_GET['lang']) && in_array($_GET['lang'], $idiomasDisponibles)) {
        return $_GET['lang'];
    }

    // Si no hay parámetro, detectamos el idioma del navegador
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if (in_array($idioma, $idiomasDisponibles)) {
            return $idioma;
        }
    }

    // Idioma predeterminado si no se detecta o no es soportado
    return 'es';
}

// Establece el idioma actual
$idioma = obtenerIdioma();

// Carga los textos según el idioma
$textos = include("lang/{$idioma}.php");

// Información de la bandera y nombre del idioma actual (opcional)
$idiomasBandera = [
    'es' => ['nombre' => 'Español', 'bandera' => 'images/flags/spain.png'],
    'en' => ['nombre' => 'English', 'bandera' => 'images/flags/usa.png'],
    'fr' => ['nombre' => 'Français', 'bandera' => 'images/flags/france.png'],
    'ptBR' => ['nombre' => 'Português', 'bandera' => 'images/flags/brazil.png'],
];

$idiomaActual = $idiomasBandera[$idioma];
?>
<?php
$config = include('config.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $idioma; ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DSAThemes">	
		<meta name="description" content="<?php echo $textos['descripcion']; ?>">
		<meta name="keywords" content="Whatsapp, Durky, CRM, Multiagentes, Multi operadores">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
  		<!-- SITE TITLE -->
		<title><?php echo $textos['titulo']; ?></title>
							
		<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="images/square-logo.png" type="">
		<link rel="icon" href="images/square-logo.png" type="">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
		
		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="css/flaticon.css" rel="stylesheet">
		
		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">	
		<link id="effect" href="css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">	
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">
		<link href="css/lunar.css" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		<!-- <link href="css/blue-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/crocus-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/green-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/magenta-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/pink-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/purple-theme.css" rel="stylesheet"> -->
		<link href="css/skyblue-theme.css" rel="stylesheet">
		<!-- <link href="css/red-theme.css" rel="stylesheet"> -->
		<!-- <link href="css/violet-theme.css" rel="stylesheet"> -->
		
		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="css/styles2.css">
	</head>
	<body>
	    <div id="whatsapp-widget">
        <div class="whatsapp-bubble" id="whatsapp-bubble">
            <div class="typing-animation" id="typing-animation"></div>
        </div>
        <a href="https://wa.me/<?php echo $config['whatsapp_number']; ?>" target="_blank" class="whatsapp-link">
            <img src="/images/whatsapp-icon.png" alt="WhatsApp Icon">
        </a>
    </div>
		<!-- PRELOADER SPINNER
		============================================= -->	
		<div id="loading" class="loading--theme">
			<div id="loading-center"><span class="loader"></span></div>
		</div>
		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">
			<!-- HEADER
			============================================= -->
			<header id="header" class="hidden-nav tra-menu navbar-dark white-scroll">
				<div class="header-wrapper">
					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	  	
				    	<span class="smllogo"><img src="images/logo-skyblue.png" alt="mobile-logo"></span>
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	
				 	</div>
				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">
	    					<!-- HEADER BLACK LOGO -->
	    					<div class="desktoplogo">
	    						<a href="#hero-23" class="logo-black"><img src="images/logo-skyblue.png" alt="logo"></a>
	    					</div>
	    					<!-- HEADER WHITE LOGO -->
	    					<div class="desktoplogo">
	    						<a href="#hero-23" class="logo-white"><img src="images/logo-skyblue.png" alt="logo"></a>
	    					</div>
	    					<!-- MAIN MENU -->
	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list nav-theme">
	        						<!-- DROPDOWN SUB MENU -->
						   
								    
								    <!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="#features-6" class="h-link"><?php echo $textos['Characteristics']; ?></a></li>
								    <!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="pricing.php" class="h-link"><?php echo $textos['Price']; ?></a></li>
						          	<!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="/doc/index.php" class="h-link" target="_blank"><?php echo $textos['Documentation']; ?></a></li>
							    	<!-- SIGN IN LINK -->
							    	<li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
							    		<a href="<?php echo $config['domain_app']; ?>" class="h-link" target="_blank"><?php echo $textos['Login']; ?></a>
							    	</li>
								    <!-- SIGN UP BUTTON -->
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="<?php echo $config['domain_signup']; ?>" class="btn r-04 btn--theme hover--theme last-link" target="_blank"><?php echo $textos['Register']; ?></a>
								    </li>
								    <li class="nl-simple" aria-haspopup="true">
									    <a href="#" class="h-link">
									        <img src="<?php echo $idiomaActual['bandera']; ?>" alt="<?php echo $idiomaActual['nombre']; ?>" style="width: 20px; margin-right: 5px;">
									        <?php echo $idiomaActual['nombre']; ?>
									        <i class="fas fa-angle-down"></i>
									    </a>
									    <ul class="sub-menu">
									        <li><a href="?lang=es"><img src="images/flags/spain.png" alt="Español" style="width: 20px; margin-right: 5px;"> Español</a></li>
									        <li><a href="?lang=en"><img src="images/flags/usa.png" alt="English" style="width: 20px; margin-right: 5px;"> English</a></li>
									        <li><a href="?lang=fr"><img src="images/flags/france.png" alt="Français" style="width: 20px; margin-right: 5px;"> Français</a></li>
									        <li><a href="?lang=ptBR"><img src="images/flags/brazil.png" alt="Português" style="width: 20px; margin-right: 5px;"> Português</a></li>
									    </ul>
									</li>
	        					</ul>
	        				</nav>	<!-- END MAIN MENU -->
	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->
				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->
			<!-- PRICING-1
			============================================= -->
			<section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-8">
							<div class="section-title mb-70">	
								<!-- Title -->	
								<h2 class="s-52 w-700"><?php echo $textos['price1']; ?></h2>	
								<!-- TOGGLE BUTTON -->
								<div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
									<span class="toggler-txt"><?php echo $textos['price2']; ?></span>
							        <label class="switch-wrap">
							          <input type="checkbox" id="checbox" onclick="check()">
							          <span class="switcher bg--grey switcher--theme">
											<span class="show-annual"></span>
								   			<span class="show-monthly"></span>
							          </span>
							        </label>
							        <span class="toggler-txt"><?php echo $textos['price3']; ?></span>
							        <!-- Text -->	
						        <p class="color--theme"><?php echo $textos['price4']; ?></p>
							    </div>
							</div>	
						</div>
					</div>	<!-- END SECTION TITLE -->	
					<!-- PRICING TABLES -->
					<div class="pricing-1-wrapper">
						<div class="row row-cols-1 row-cols-md-3">
							<!-- STARTER PLAN -->
							<div class="col">
								<div id="pt-1-1" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">
									<!-- TABLE HEADER -->
									<div class="pricing-table-header">
										<!-- Title -->
										<h5 class="s-24 w-700"><?php echo $config['plan1name']; ?></h5>
										<!-- Price -->	
										<div class="price">								
											<sup class="color--black"><?php echo $config['moneda']; ?></sup>								
											<span class="color--black"><?php echo $config['plan1price']; ?></span>
											<sup class="validity color--grey">&nbsp;/&ensp;<?php echo $textos['price5']; ?></sup>
											<p class="color--grey"><?php echo $textos['price6']; ?></p>
										</div>
										<!-- Button -->
										<a href="#" class="pt-btn btn r-04 btn--theme hover--theme"><?php echo $textos['price8']; ?></a>
										<p class="p-sm btn-txt text-center color--grey"><?php echo $textos['price9']; ?></p>
									</div>	<!-- END TABLE HEADER -->
									<!-- PRICING FEATURES -->
									<ul class="pricing-features color--black ico-10 ico--green mt-25">
										<li><p><span class="flaticon-check"></span><?php echo $textos['price10']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price11']; ?>
										 </p></li>
										<li class="disabled-option"><p><span class="flaticon-check"></span><?php echo $textos['price12']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price13']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price14']; ?> 
										</p></li>	
										<li><p><span class="flaticon-check"></span><?php echo $textos['price15']; ?>
										 </p></li>
										 <li class="disabled-option"><p><span class="flaticon-check"></span><?php echo $textos['price16']; ?>
										 </p></li>
										 <li class="disabled-option"><p><span class="flaticon-check"></span><?php echo $textos['price17']; ?>
										 </p></li>
									</ul>
								</div>
							</div>	<!-- END STARTER PLAN -->
							<!-- BASIC PLAN -->
							<div class="col">
								<div id="pt-1-2" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">
							<!-- TABLE HEADER -->
									<div class="pricing-table-header">
										<!-- Title -->
										<h5 class="s-24"><?php echo $config['plan2name']; ?></h5>
										<!-- Price -->	
										<div class="price">								
											<!-- Monthly Price -->	
											<div class="price2">
												<sup class="color--black"><?php echo $config['moneda']; ?></sup>								
												<span class="color--black"><?php echo $config['plan2price']; ?></span>
												<sup class="validity color--grey">&nbsp;/&ensp;<?php echo $textos['price24']; ?></sup>
											</div>
											<!-- Yearly Price -->	
											<div class="price1">
												<sup class="color--black"><?php echo $config['moneda']; ?></sup>								
												<span class="color--black"><?php echo $config['plan2priceanual']; ?></span>
												<sup class="validity color--grey">&nbsp;/&ensp;<?php echo $textos['price19']; ?></sup>
												<!-- Discount Badge -->
												<div class="pricing-discount bg--yellow-400 color--black r-36">
													<h6 class="s-17"><?php echo $textos['price20']; ?></h6>
												</div>
											</div>
											<!-- Text -->	
											<p class="color--grey"><?php echo $textos['price21']; ?></p>
										</div>	<!-- End Price -->	
										<!-- Button -->
										<a href="#" class="pt-btn btn r-04 btn--theme hover--theme"><?php echo $textos['price22']; ?></a>
										<p class="p-sm btn-txt text-center color--grey"><?php echo $textos['price23']; ?></p>	
									</div>	<!-- END TABLE HEADER -->
									<!-- PRICING FEATURES -->
									<ul class="pricing-features color--black ico-10 ico--green mt-25">
										<li><p><span class="flaticon-check"></span><?php echo $textos['price25']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price26']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price27']; ?>
										 </p></li>
										 <li><p><span class="flaticon-check"></span><?php echo $textos['price25']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price29']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price30']; ?> 
										</p></li>	
										<li><p><span class="flaticon-check"></span><?php echo $textos['price31']; ?>
										 </p></li>
										 <li><p><span class="flaticon-check"></span><?php echo $textos['price32']; ?>
										 </p></li>
									</ul>
								</div>
							</div>	<!-- END BASIC PLAN -->

							<!-- ADVANCED PLAN -->
							<div class="col">
								<div id="pt-1-3" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">
									<!-- TABLE HEADER -->
									<div class="pricing-table-header">
										<!-- Title -->
										<h5 class="s-24"><?php echo $config['plan3name']; ?></h5>
										<!-- Price -->	
										<div class="price">	
											<!-- Monthly Price -->	
											<div class="price2">
												<sup class="color--black"><?php echo $config['moneda']; ?></sup>								
												<span class="color--black"><?php echo $config['plan3price']; ?></span>
												<sup class="validity color--grey">&nbsp;/&ensp;<?php echo $textos['price24']; ?></sup>
											</div>
											<!-- Yearly Price -->	
											<div class="price1">
												<sup class="color--black"><?php echo $config['moneda']; ?></sup>								
												<span class="color--black"><?php echo $config['plan3priceanual']; ?></span>
												<sup class="validity color--grey">&nbsp;/&ensp;<?php echo $textos['price19']; ?></sup>
												<!-- Discount Badge -->
												<div class="pricing-discount bg--yellow-400 color--black r-36">
													<h6 class="s-17"><?php echo $textos['price33']; ?></h6>
												</div>
											</div>
											<!-- Text -->	
											<p class="color--grey"><?php echo $textos['price34']; ?></p>
										</div>	<!-- End Price -->	
										<!-- Button -->
										<a href="#" class="pt-btn btn r-04 btn--theme hover--theme"><?php echo $textos['price35']; ?></a>
										<p class="p-sm btn-txt text-center color--grey"><?php echo $textos['price36']; ?></p>	
								</div>	<!-- END TABLE HEADER -->
									<!-- PRICING FEATURES -->
									<ul class="pricing-features color--black ico-10 ico--green mt-25">
										<li><p><span class="flaticon-check"></span><?php echo $textos['price37']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price38']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price39']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price40']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price41']; ?>
										 </p></li>
										<li><p><span class="flaticon-check"></span><?php echo $textos['price42']; ?> 
										</p></li>	
										<li><p><span class="flaticon-check"></span><?php echo $textos['price43']; ?>
										 </p></li>
										 <li><p><span class="flaticon-check"></span><?php echo $textos['price44']; ?>
										 </p></li>
									</ul>
								</div>
							</div>	<!-- END ADVANCED PLAN -->
						</div>
					</div>	<!-- PRICING TABLES -->
				</div>	   <!-- End container -->
			</section>	<!-- END PRICING-1 -->

			<!-- DIVIDER LINE -->
			<hr class="divider">

			<!-- PRICING COMPARE
			============================================= -->
			<section id="comp-table" class="pt-100 pb-60 pricing-section division">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-70">	

								<!-- Title -->	
								<h2 class="s-52 w-700"><?php echo $textos['price45']; ?></h2>	
								<!-- Text -->	
								<p class="p-xl"><?php echo $textos['price46']; ?></p>
							</div>	
						</div>
					</div>
					<!-- PRICING COMPARE -->
					<div class="comp-table wow fadeInUp">
						<div class="row">
							<div class="col">
								<!-- Table -->	
	   							<div class="table-responsive mb-50">
	     							<table class="table text-center">
	        							<thead>
									        <tr>
									            <th style="width: 34%;"></th>
									            <th style="width: 22%;"><?php echo $config['plan1name']; ?></th>
									            <th style="width: 22%;"><?php echo $config['plan2name']; ?></th>
									            <th style="width: 22%;"><?php echo $config['plan3name']; ?></th>
									       	</tr>
								        </thead>

								        <tbody>

									       	<tr>
									            <th scope="row" class="text-start"><?php echo $textos['price47']; ?></th>
									            <td class="color--black"><?php echo $textos['price48']; ?></td>
									            <td class="color--black"><?php echo $textos['price49']; ?></td>
									            <td class="color--black"><?php echo $textos['price50']; ?></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price51']; ?></th>
									            <td class="color--black"><?php echo $textos['price52']; ?></td>
									            <td class="color--black"><?php echo $textos['price53']; ?></td>
									            <td class="color--black"><?php echo $textos['price54']; ?></td>
									        </tr>
									        
									         <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price55']; ?></th>
									            <td class="disabled-option"><?php echo $textos['price56']; ?></td>
									            <td class="color--black"><?php echo $textos['price57']; ?></td>
									            <td class="color--black"><?php echo $textos['price58']; ?></td>
									        </tr>
    
									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price59']; ?></th>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price60']; ?></th>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price61']; ?></th>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price62']; ?></th>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									       

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price63']; ?></th>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price64']; ?></th>
									            <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price65']; ?></th>
									            <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr>
									            <th scope="row" class="text-start"><?php echo $textos['price66']; ?></th>
									            <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									            <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
									        </tr>

									        <tr class="table-last-tr">
									            <th scope="row" class="text-start"><?php echo $textos['price67']; ?></th>
									            <td class="color--black"><?php echo $textos['price68']; ?></td>
									            <td class="color--black"><?php echo $textos['price69']; ?></td>
									            <td class="color--black"><?php echo $textos['price70']; ?></td>
									        </tr>

								        </tbody>

	      							</table>
	   							</div>	<!-- End Table -->	

							</div>
						</div>
					</div>	<!-- END PRICING COMPARE -->

					<!-- PRICING COMPARE PAYMENT -->
					<div class="comp-table-payment">	
						<div class="row row-cols-1 row-cols-md-3">


							<!-- Payment Methods -->
							<div class="col col-lg-5">
								<div id="pbox-1" class="pbox mb-40 wow fadeInUp">

									<!-- Title -->
									<h6 class="s-18 w-700"><?php echo $textos['price71']; ?></h6>

									<!-- Payment Icons -->
									<ul class="payment-icons ico-45 mt-25">
										<li><img src="images/png_icons/visa.png" alt="payment-icon"></li>
										<li><img src="images/png_icons/am.png" alt="payment-icon"></li>
										<li><img src="images/png_icons/discover.png" alt="payment-icon"></li>
										<li><img src="images/png_icons/paypal.png" alt="payment-icon"></li>	
										<li><img src="images/png_icons/jcb.png" alt="payment-icon"></li>
										<li><img src="images/png_icons/shopify.png" alt="payment-icon"></li>
									</ul>

								</div>
							</div>	


							<!-- Payment Guarantee -->
							<div class="col col-lg-4">
								<div id="pbox-2" class="pbox mb-40 wow fadeInUp">

									<!-- Title -->
									<h6 class="s-18 w-700"><?php echo $textos['price72']; ?></h6>

									<!-- Text -->
									<p><?php echo $textos['price73']; ?></p>
									
								</div>
							</div>	


							<!-- Payment Encrypted -->
							<div class="col col-lg-3">
								<div id="pbox-3" class="pbox mb-40 wow fadeInUp">

									<!-- Title -->
									<h6 class="s-18 w-700"><?php echo $textos['price74']; ?></h6>

									<!-- Text -->
									<p><?php echo $textos['price75']; ?></p>

								</div>
							</div>	


						</div>
					</div>	<!-- END PRICING COMPARE PAYMENT -->


				</div>	   <!-- End container -->
			</section>	<!-- END PRICING COMPARE -->

			
			<!-- BANNER-1
			============================================= -->
			<section id="banner-1" class="pt-100 banner-section">
				<div class="container">
					<!-- BANNER-1 WRAPPER -->
					<div class="banner-1-wrapper r-16">
						<div class="banner-overlay bg--05 bg--fixed">
							<div class="row">
								<!-- BANNER-1 TEXT -->
								<div class="col">
									<div class="banner-1-txt color--white">
										<!-- Title -->	
										<h2 class="s-45 w-700"><?php echo $textos['price76']; ?></h2>
										<!-- Text -->
										<p class="p-xl"><?php echo $textos['price77']; ?></p>
										<!-- Button -->
										<a href="<?php echo $config['domain_signup']; ?>" class="btn r-04 btn--theme hover--tra-white" target="_blank"><?php echo $textos['price78']; ?>
										</a>
										<!-- Button Text -->
										<p class="p-sm btn-txt ico-15 o-85">
											<span class="flaticon-check"></span> <?php echo $textos['price79']; ?>
										</p>
									</div>
								</div>	<!-- END BANNER-1 TEXT -->
							</div>   <!-- End row -->	
						</div>   <!-- End banner overlay -->	
					</div>    <!-- END BANNER-1 WRAPPER -->
				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-1 -->

		<!-- FOOTER-3
			============================================= -->
			<footer id="footer-3" class="pt-100 footer ft-3-ntr">
				<div class="container">
					<!-- FOOTER CONTENT -->
					<div class="row">
						<!-- FOOTER LOGO -->
						<div class="col-xl-3">
							<div class="footer-info">
								<img class="footer-logo" src="images/logo-skyblue.png" alt="footer-logo">
							</div>	
						</div>	

						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-lg-3 col-xl-2">
							<div class="footer-links fl-1">
								<!-- Title -->
								<h6 class="s-17 w-700"><?php echo $textos['footer']; ?></h6>
								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="#header"><?php echo $textos['footer2']; ?></a></p></li>
								</ul>
							</div>
						</div>	<!-- END FOOTER LINKS -->	

						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-lg-2">
							<div class="footer-links fl-2">
								<!-- Title -->
								<h6 class="s-17 w-700"><?php echo $textos['footer3']; ?></h6>
								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="#features-6"><?php echo $textos['footer4']; ?></a></p></li>	
									<li><p><a href="pricing.php"><?php echo $textos['footer5']; ?></a></p></li>	
									<li><p><a href="/doc/index.php" target="_blank"><?php echo $textos['footer6']; ?></a></p></li>			
								</ul>
							</div>	
						</div>	<!-- END FOOTER LINKS -->	

						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-lg-3 col-xl-2">
							<div class="footer-links fl-3">
								<!-- Title -->
								<h6 class="s-17 w-700"><?php echo $textos['footer7']; ?></h6>
								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="#" target="_blank"><?php echo $textos['footer8']; ?></a></p></li>										
									<li><p><a href="#" target="_blank"><?php echo $textos['footer9']; ?></a></p></li>
									<li><p><a href="#" target="_blank"><?php echo $textos['footer10']; ?></a></p></li>
								</ul>
							</div>	
						</div>	<!-- END FOOTER LINKS -->	

							<!-- FOOTER LINKS -->
						<div class="col-sm-6 col-md-3">
							<div class="footer-links fl-4">
												
								<!-- Title -->
								<h6 class="s-17 w-700"><?php echo $textos['footer11']; ?></h6>

								<!-- Mail Link -->
								<p class="footer-mail-link ico-25">
									<a href="mailto:<?php echo $config['mail']; ?>" target="_blank"><?php echo $textos['mail']; ?></a>
								</p>

								<!-- Social Links -->	
								<ul class="footer-socials ico-25 text-center clearfix">		
									<li><a href="<?php echo $config['facebook']; ?>" target="_blank"><span class="flaticon-facebook"></span></a></li>
									<li><a href="<?php echo $config['twitter']; ?>" target="_blank"><span class="flaticon-twitter"></span></a></li>
									<li><a href="<?php echo $config['github']; ?>" target="_blank"><span class="flaticon-github"></span></a></li>
									
								</ul>

							</div>	
						</div>	<!-- END FOOTER LINKS -->	
					</div>	<!-- END FOOTER CONTENT -->
					<hr>	<!-- FOOTER DIVIDER LINE -->
					<!-- BOTTOM FOOTER -->
					<div class="bottom-footer">
						<div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">
							<div class="col">
								<div class="footer-copyright">
									<p class="p-sm">&copy; 2024 <?php echo $textos['namesite']; ?>. <span><?php echo $textos['copy']; ?></span></p><br>
								
								</div>
							</div>
							<!-- FOOTER SECONDARY LINK -->
							<div class="col">
								<div class="bottom-secondary-link ico-15 text-end">
									<p class="p-sm"><a href="#"><?php echo $textos['madein']; ?>Hecho con 
										<span class="flaticon-heart color--pink-400"></span> por <?php echo $textos['developer']; ?></a><br>
									</p>
								</div>
							</div>
						</div>  <!-- End row -->
					</div>	<!-- END BOTTOM FOOTER -->
				</div>     <!-- End container -->	
			</footer>   <!-- END FOOTER-3 -->	
	
		<!-- EXTERNAL SCRIPTS
		============================================= -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<script src="js/jquery-3.7.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/pricing-toggle.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/request-form.js"></script>	
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>	
		<script src="js/popper.min.js"></script>
		<script src="js/lunar.js"></script>
		<script src="js/wow.js"></script>
		<!-- Custom Script -->		
		<script src="js/custom.js"></script>
		<script src="js/script2.js"></script>
		
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
	
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>