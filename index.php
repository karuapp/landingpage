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
		<meta name="author" content="WhaTitan.com">	
		<meta name="description" content="<?php echo $textos['namesite']; ?> <?php echo $textos['description']; ?>">
		<meta name="keywords" content="<?php echo $textos['keywords']; ?>">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
  		<!-- SITE TITLE -->
		<title><?php echo $textos['namesite']; ?> <?php echo $textos['titulo']; ?></title>
							
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
		<style>






		    .sub-menu {
    display: none;
    position: absolute;
    background: #fff;
    list-style: none;
    padding: 10px;
    border: 1px solid #ddd;
    z-index: 1000;
}

.sub-menu li {
    margin: 5px 0;
}

.sub-menu li a {
    text-decoration: none;
    color: #333;
}

li[aria-haspopup="true"]:hover .sub-menu {
    display: block;
}

		</style>

		<style>
        .typewriter {
            font-size: 2em;
            font-weight: bold;
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            border-right: 2px solid black; /* El cursor de escritura */
            padding-right: 5px;
            animation: typing 2s steps(20) 1s forwards, blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        .rotating-text-container {
            display: inline-block;
            overflow: hidden;
        }

        /* Animation for erasing text */
        @keyframes erase {
            from {
                width: 100%;
            }
            to {
                width: 0;
            }
        }
    </style>

    <style>
        .typewriter {
            font-size: 2em;
            font-weight: bold;
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            border-right: 2px solid black; /* El cursor de escritura */
            padding-right: 5px;
            animation: typing 2s steps(20) 1s forwards, blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }
      .text-h2-size {
        font-size: 20px;
        
      }

        .rotating-text-container {
            display: inline-block;
            overflow: hidden;
            font-size: 20px; /* Cambia esto al tamaño que desees */
    font-weight: bold; /* Opcional para negritas */
    color: #7946d1; /* Opcional para cambiar el color del texto */
        }

        /* Animation for erasing text */
        @keyframes erase {
            from {
                width: 100%;
            }
            to {
                width: 0;
            }
        }
    </style>
		
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

			<!-- HERO-23
			============================================= -->	
			<section id="hero-23" class="bg--scroll hero-section">
				<div class="container text-center">	
					<!-- HERO TEXT -->	
					<div class="row justify-content-center">
						<div class="col-md-10 col-lg-9 col-xl-10">
							<div class="hero-23-txt wow fadeInUp">
								<!-- Hero Logo  -->
								<div class="hero-square-logo">
									<img class="img-fluid" src="images/square-logo.png" alt="hero-logo">
								</div>
								<h2 class="p-xl">
                                          <?php echo $textos['plataforma']; ?><br>
                                          <div class="rotating-text-container">
                                              <span class="rotating-text">
                                                  <span class="typewriter" id="word"> </span>
                                              </span>
                                          </div>
                                          <br><?php echo $textos['chats']; ?>
                                 </h2>
								<!-- Title -->
								<h2 class="text-h2-size">
									 <span class="color--theme"><?php echo $textos['tittle1']; ?></span> <?php echo $textos['tittle2']; ?>
								</h2>
								<!-- Text -->
								<p class="p-xl"><?php echo $textos['subtittle1']; ?> <span class="color--black"><?php echo $textos['namesite']; ?></span>  <?php echo $textos['subtittle2']; ?>
								</p>
								<!-- Buttons -->	
									<div class="btns-group">
										<a href="<?php echo $config['domain_signup']; ?>" class="btn r-04 btn--theme hover--theme" target="_blank"><?php echo $textos['button1']; ?></a>
										<a href="<?php echo $config['domain_app']; ?>" class="btn r-04 btn--tra-black hover--theme ico-20 ico-right" target="_blank">
											<?php echo $textos['butto2']; ?> 
										</a> 
									</div>
							</div>
						</div>
					</div>	<!--END HERO TEXT -->	
					<!-- HERO IMAGE -->
					<div class="row">
						<div class="col">	
							<div class="hero-23-img video-preview wow fadeInUp">
								<!-- Play Icon  --> 
								<a class="video-popup1" href="<?php echo $config['youtube']; ?>" >				
									<div class="video-btn video-btn-xl bg--theme">	
										<div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
									</div>
								</a> 
								<!-- Preview Image --> 
								<img class="img-fluid" src="images/dashboard-03.png" alt="video-preview">	
							</div>
						</div>	
					</div>	<!-- END HERO IMAGE -->
				</div>	   <!-- End container --> 	
				<!-- WAVE SHAPE BOTTOM -->	
				<div class="wave-shape-bottom">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,128L80,149.3C160,171,320,213,480,240C640,267,800,277,960,277.3C1120,277,1280,267,1360,261.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
				</div>
			</section>	<!-- END HERO-23 -->


										<!-- BRANDS-1
			============================================= -->
			<div id="brands-1" class="py-10 brands-section">
				<div class="container">	


					<!-- BRANDS CAROUSEL -->				
					<div class="row">
						<div class="col text-center">	
							<div class="owl-carousel brands-carousel-6">

												
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-1.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-2.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-3.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-4.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-5.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-6.png" alt="brand-logo"></a>
								</div>


								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-7.png" alt="brand-logo"></a>
								</div>

															
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8.png" alt="brand-logo"></a>
								</div>

								
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-9.png" alt="brand-logo"></a>
								</div>


							</div>	
						</div>
					</div>  <!-- END BRANDS CAROUSEL -->


				</div>	<!-- End container -->
			</div>	<!-- END BRANDS-1 -->



						<!-- BRANDS-2
			============================================= -->
			<div id="brands-2" class="py-10 brands-section">
				<div class="container">	


					<!-- BRANDS CAROUSEL -->				
					<div class="row">
						<div class="col text-center">	
							<div class="owl-carousel brands-carousel-6-2">

												
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-10.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-11.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-12.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-13.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-14.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-15.png" alt="brand-logo"></a>
								</div>


								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-16.png" alt="brand-logo"></a>
								</div>

															
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-17.png" alt="brand-logo"></a>
								</div>

								
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-18.png" alt="brand-logo"></a>
								</div>


							</div>	
						</div>
					</div>  <!-- END BRANDS CAROUSEL -->


				</div>	<!-- End container -->
			</div>	<!-- END BRANDS-2 -->


													<!-- BRANDS-3
			============================================= -->
			<div id="brands-3" class="py-10 brands-section">
				<div class="container">	


					<!-- BRANDS CAROUSEL -->				
					<div class="row">
						<div class="col text-center">	
							<div class="owl-carousel brands-carousel-6">

												
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-1.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-2.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-3.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-4.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-5.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-6.png" alt="brand-logo"></a>
								</div>


								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-7.png" alt="brand-logo"></a>
								</div>

															
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8.png" alt="brand-logo"></a>
								</div>

								
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-9.png" alt="brand-logo"></a>
								</div>


							</div>	
						</div>
					</div>  <!-- END BRANDS CAROUSEL -->


				</div>	<!-- End container -->
			</div>	<!-- END BRANDS-3 -->


						<section id="features-6" class="py-100 features-section division">
    						<div class="container">

							<div class="row justify-content-center">
						            <div class="col-md-10 col-lg-9">
						                <div class="section-title mb-70">
						                    <!-- Title -->
						                    <h4 class="s-50 w-700">Sacale el maximo provecho a WhatsApp con llamadas en <?php echo $textos['namesite']; ?></h4>
						                    <!-- Text -->
						                    <p class="s-18 color--grey">Mediante la integracion de WhaVoiP, realiza llamadas de whatsapp, nuestra alizanta te permitira muy rentable para sacarle aun mas provecho a <?php echo $textos['namesite']; ?> </p>
						                </div>
						            </div>
						        </div>
								
						<div class="row">
						<div class="col">	
							<div class="hero-23-img video-preview wow fadeInUp">

								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8112.png" alt="brand-logo"></a>
								</div>
							</div>
						</div>
					</div>

						</div>

					</section>
					<hr>


			<!-- FEATURES-6 ============================================= -->
<section id="features-6" class="py-100 features-section division">
    <div class="container">
        <!-- SECTION TITLE -->
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="section-title mb-70">
                    <!-- Title -->
                    <h4 class="s-50 w-700"><?php echo $textos['featuretitle']; ?> <?php echo $textos['namesite']; ?></h4>
                    <!-- Text -->
                    <p class="s-18 color--grey"><?php echo $textos['featuretitle2']; ?></p>
                </div>
            </div>
        </div>

        <!-- FEATURES-6 WRAPPER -->
        <div class="fbox-wrapper text-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <!-- FEATURE BOX #1 -->
                <div class="col">
                    <div class="fbox-6 fb-1 wow fadeInUp">
                        <!-- Icon -->
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-whatsapp"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature']; ?></h6>
                            <p style="text-align: left;"><?php echo $textos['featuretext']; ?></p>
                            </div>
                    </div>
                </div> <!-- END FEATURE BOX #1 -->

                <!-- FEATURE BOX #2 -->
                <div class="col">
                    <div class="fbox-6 fb-2 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-idea"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature2']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext2']; ?></p>
                               </div>
                    </div>
                </div> <!-- END FEATURE BOX #2 -->

                <!-- FEATURE BOX #3 -->
                <div class="col">
                    <div class="fbox-6 fb-3 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-graphic"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature3']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext3']; ?></p>
                              </div>
                    </div>
                </div> <!-- END FEATURE BOX #3 -->

                <!-- FEATURE BOX #4 -->
                <div class="col">
                    <div class="fbox-6 fb-4 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-search-engine-1"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature4']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext4']; ?></p>
                            </div>
                    </div>
                </div> <!-- END FEATURE BOX #4 -->
                <!-- FEATURE BOX #5 -->
                <div class="col">
                    <div class="fbox-6 fb-1 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-graphics"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature5']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext5']; ?></p>
                           </div>
                    </div>
                </div> <!-- END FEATURE BOX #5 -->

                <!-- FEATURE BOX #6 -->
                <div class="col">
                    <div class="fbox-6 fb-2 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-idea"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature6']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext6']; ?></p>
                          </div>
                    </div>
                </div> <!-- END FEATURE BOX #6 -->
                <!-- FEATURE BOX #7 -->
                <div class="col">
                    <div class="fbox-6 fb-3 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-graphic"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature7']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext7']; ?></p>
                           </div>
                    </div>
                </div> <!-- END FEATURE BOX #7 -->

                <!-- FEATURE BOX #8 -->
                <div class="col">
                    <div class="fbox-6 fb-4 wow fadeInUp">
                        <!-- Icon -->
                        <div class="fbox-ico ico-55">
                            <div class="shape-ico color--theme">
                                <span class="flaticon-search-engine-1"></span>
                                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
                                </svg>
                            </div>
                        </div>
                        <!-- Text -->
                        <div class="fbox-txt">
                            <h6 class="s-20 w-700"><?php echo $textos['feature8']; ?></h6>
                             <p style="text-align: left;"><?php echo $textos['featuretext8']; ?></p>
                           </div>
                    </div>
                </div> <!-- END FEATURE BOX #8 -->
            </div> <!-- End row -->
        </div> <!-- END FEATURES-6 WRAPPER -->
    </div> <!-- End container -->
</section> <!-- END FEATURES-6 -->
<hr>	
			<div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="section-title mb-70">
                    <!-- Title -->
                    <h4 class="s-50 w-700">Poderosas Integraciones de Inteligencia Artificial</h4>
                    <!-- Text -->
                    <p class="s-18 color--grey">Las Inteligencias Artificiales y creadores de agentes de AI mas populares y poderosas del mercado</p>
                </div>
            </div>
        </div>

											<!-- BRANDS-4
			============================================= -->
			<div id="brands-4" class="py-10 brands-section">
				<div class="container">	


					<!-- BRANDS CAROUSEL -->				
					<div class="row">
						<div class="col text-center">	
							<div class="owl-carousel brands-carousel-6">

												
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-811.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-812.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-813.png" alt="brand-logo"></a>
								</div>

													
								

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-815.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-816.png" alt="brand-logo"></a>
								</div>


								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-817.png" alt="brand-logo"></a>
								</div>

															
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-818.png" alt="brand-logo"></a>
								</div>

								
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-819.png" alt="brand-logo"></a>
								</div>
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8110.png" alt="brand-logo"></a>
								</div>
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8111.png" alt="brand-logo"></a>
								</div>
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8113.png" alt="brand-logo"></a>
								</div>
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8114.png" alt="brand-logo"></a>
								</div>
								


							</div>	
						</div>
					</div>  <!-- END BRANDS CAROUSEL -->


				</div>	<!-- End container -->
			</div>	<!-- END BRANDS-4 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">
			<section class="bg--white-400 py-100 ct-01 content-section division">
				<div class="container">
					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">
						<!-- TEXT BLOCK -->	
						<div class="col-md-6 order-last order-md-2">
							<div class="txt-block left-column wow fadeInRight">
								<!-- Section ID -->	
						 		<span class="section-id color--grey"><?php echo $textos['flowtext']; ?></span>
								<!-- Title -->	
								<h2 class="s-46 w-700"><?php echo $textos['flowtittle']; ?></h2>
								<!-- Text -->	
								<p><?php echo $textos['flowcontent']; ?></p>
								<!-- Text -->	
								<p class="mb-0"><?php echo $textos['flowcontent2']; ?></p>
								<!-- Link -->	
								<div class="txt-block-tra-link mt-25">
									<a href="<?php echo $config['domain_signup']; ?>" class="tra-link ico-20 color--theme"><?php echo $textos['flowcontent3']; ?>
									 <span class="flaticon-next"></span>
									</a>
								</div>
							</div>
						</div>	<!-- END TEXT BLOCK -->	
						<!-- IMAGE BLOCK -->
						<div class="col-md-6 order-first order-md-2">
							<div class="img-block right-column wow fadeInLeft">
								<img class="img-fluid" src="images/img-21.png" alt="content-image">
							</div>
						</div>
					</div>	<!-- END SECTION CONTENT (ROW) -->	
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<!-- TEXT CONTENT
			============================================= -->
			<section id="lnk-1" class="py-100 ct-02 content-section division">
				<div class="container">
					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">
						<!-- IMAGE BLOCK -->
						<div class="col-md-6">
							<div class="img-block left-column wow fadeInRight">
								<img class="img-fluid" src="images/img-07.png" alt="content-image">
							</div>
						</div>

						<!-- TEXT BLOCK -->	
						<div class="col-md-6">
							<div class="txt-block right-column wow fadeInLeft">
								<!-- Section ID -->	
						 		<span class="section-id color--grey"><?php echo $textos['estrategiatittle']; ?></span>
								<!-- Title -->	
								<h3 class="s-46 w-700"><?php echo $textos['estrategiasubtittle']; ?></h3>
								<!-- Text -->	
								<p><?php echo $textos['estrategiatext']; ?>
								</p>
								<!-- Small Title -->	
								<h5 class="s-24 w-700"><?php echo $textos['estrategiasmalltext']; ?></h5>
								<!-- CONTENT BOX #1 -->
								<div class="cbox-1 ico-15">
		 							<div class="ico-wrap color--theme">
		 								<div class="cbox-1-ico"><span class="flaticon-check"></span></div>
		 							</div>
									<div class="cbox-1-txt">
										<p><?php echo $textos['estrategiasmalltext5']; ?></p>
									</div>
								</div>
								<!-- CONTENT BOX #2 -->
								<div class="cbox-1 ico-15">
		 							<div class="ico-wrap color--theme">
		 								<div class="cbox-1-ico"><span class="flaticon-check"></span></div>
		 							</div>
									<div class="cbox-1-txt">
										<p><?php echo $textos['estrategiasmalltext3']; ?>
										</p>
									</div>
								</div>
								<!-- CONTENT BOX #3 -->
								<div class="cbox-1 ico-15">
		 							<div class="ico-wrap color--theme">
		 								<div class="cbox-1-ico"><span class="flaticon-check"></span></div>
		 							</div>
									<div class="cbox-1-txt">
										<p class="mb-0"><?php echo $textos['estrategiasmalltext4']; ?></p>
									</div>
							   </div>
							</div>
						</div>	<!-- END TEXT BLOCK -->	
					</div>	<!-- END SECTION CONTENT (ROW) -->	
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<!-- TEXT CONTENT
			============================================= -->
			<section class="bg--white-400 py-100 ct-01 content-section division">
				<div class="container">
					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">
						<!-- TEXT BLOCK -->	
						<div class="col-md-6 order-last order-md-2">
							<div class="txt-block left-column wow fadeInRight">
								<!-- Section ID -->	
						 		<span class="section-id color--grey"><?php echo $textos['maximatittle']; ?></span>
								<!-- Title -->	
								<h2 class="s-46 w-700"><?php echo $textos['namesite']; ?> <?php echo $textos['maximasubtittle']; ?> </h2>
								<!-- Text -->	
								<p><?php echo $textos['maximatext']; ?>
								</p>
								<!-- Text -->	
								<p class="mb-0"><?php echo $textos['maximatext2']; ?> <?php echo $textos['namesite']; ?>, <?php echo $textos['maximatext3']; ?> <?php echo $textos['namesite']; ?>!
								</p>
								<!-- Link -->	
								<div class="txt-block-tra-link mt-25">
									<a href="https://app.CRM Whatsapp.com/signup" class="tra-link ico-20 color--theme"><?php echo $textos['maximatextaction']; ?>
									 <span class="flaticon-next"></span>
									</a>
								</div>
							</div>
						</div>	<!-- END TEXT BLOCK -->	
						<!-- IMAGE BLOCK -->
						<div class="col-md-6 order-first order-md-2">
							<div class="img-block right-column wow fadeInLeft">
								<img class="img-fluid" src="images/img-09.png" alt="content-image">
							</div>
						</div>
					</div>	<!-- END SECTION CONTENT (ROW) -->	
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<!-- TEXT CONTENT
			============================================= -->
			<section class="pt-100 ct-02 content-section division">
				<div class="container">
					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">
						<!-- IMAGE BLOCK -->
						<div class="col-md-6">
							<div class="img-block left-column wow fadeInRight">
								<img class="img-fluid" src="images/img-06.png" alt="content-image">
							</div>
						</div>
						<!-- TEXT BLOCK -->	
						<div class="col-md-6">
							<div class="txt-block right-column wow fadeInLeft">
								<!-- TEXT BOX -->	
								<div class="txt-box">
									<!-- Title -->	
									<h5 class="s-24 w-700"><?php echo $textos['solutiontittle']; ?></h5>
									<!-- Text -->	
									<p><?php echo $textos['solutiontext']; ?>
									</p>
								</div>	<!-- END TEXT BOX -->	
								<!-- TEXT BOX -->	
								<div class="txt-box mb-0">
									<!-- Title -->	
									<h5 class="s-24 w-700"><?php echo $textos['bottittle']; ?></h5>
									<!-- Text -->	
									<p><?php echo $textos['bottext']; ?>
									</p>
									<!-- List -->	
									<ul class="simple-list">
										<li class="list-item">
											<p><?php echo $textos['bottext2']; ?>
											</p>
										</li>
										<li class="list-item">
											<p class="mb-0"><?php echo $textos['bottext3']; ?>
											</p>
										</li>
									</ul>
									<!-- Link -->	
									<div class="txt-block-tra-link mt-25">
										<a href="https://app.CRM Whatsapp.com/signup" class="tra-link ico-20 color--theme"><?php echo $textos['bottext4']; ?>
										 <span class="flaticon-next"></span>
									</a>
								</div>
								</div>	<!-- END TEXT BOX -->	
							</div>
						</div>	<!-- END TEXT BLOCK -->	
					</div>	<!-- END SECTION CONTENT (ROW) -->	
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<!-- FEATURES-12
			============================================= -->
			<section id="features-12" class="shape--bg shape--white-400 pt-100 features-section division">
				<div class="container">
					<div class="row d-flex align-items-center">
						<!-- TEXT BLOCK -->	
						<div class="col-md-5">
							<div class="txt-block left-column wow fadeInRight">
								<!-- Section ID -->	
						 		<span class="section-id"><?php echo $textos['intuitivotittle']; ?></span>
			 					<!-- Title -->	
								<h2 class="s-46 w-700"><?php echo $textos['intuitivosubtittle']; ?></h2>
								<!-- Text -->	
								<p><?php echo $textos['intuitivotext']; ?>
									</p>
								<!-- List -->	
								<ul class="simple-list">
									<li class="list-item">
										<p><?php echo $textos['intuitivotext2']; ?>
										</p>
									</li>
									<li class="list-item">
										<p class="mb-0"><?php echo $textos['intuitivotext3']; ?>
									</li>
								</ul>
							</div>
						</div>	<!-- END TEXT BLOCK -->	

						<!-- FEATURES-12 WRAPPER -->
						<div class="col-md-7">
							<div class="fbox-12-wrapper wow fadeInLeft">	
								<div class="row">
				 					<div class="col-md-6">
				 						<!-- FEATURE BOX #1 -->
				 						<div id="fb-12-1" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">
													<!-- Vector Icon -->
													<span class="flaticon-layers-1"></span>
													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													 <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>
												</div>
											</div>	<!-- End Icon -->
											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700"><?php echo $textos['integrado']; ?></h5>
												<p><?php echo $textos['integrado2']; ?> </p>
											</div>
				 						</div>

				 						<!-- FEATURE BOX #2 -->
				 						<div id="fb-12-2" class="fbox-12 bg--white-100 block-shadow r-12">
											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">
													<!-- Vector Icon -->
													<span class="flaticon-click-1"></span>
													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>
												</div>
											</div>	<!-- End Icon -->
											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700"><?php echo $textos['intuitivo']; ?></h5>
												<p><?php echo $textos['intuitivo2']; ?>. </p>
											</div>
				 						</div>
				 					</div>

				 					<div class="col-md-6">
				 						<!-- FEATURE BOX #3 -->
				 						<div id="fb-12-3" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">
											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">
													<!-- Vector Icon -->
													<span class="flaticon-prioritize"></span>
													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>
												</div>
											</div>	<!-- End Icon -->
											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700"><?php echo $textos['flexible']; ?></h5>
												<p><?php echo $textos['flexible2']; ?> </p>
											</div>
				 						</div>

				 						<!-- FEATURE BOX #4 -->
				 						<div id="fb-12-4" class="fbox-12 bg--white-100 block-shadow r-12">
											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">
													<!-- Vector Icon -->
													<span class="flaticon-analytics"></span>
													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>
												</div>
											</div>	<!-- End Icon -->
											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700"><?php echo $textos['eficiente']; ?></h5>
												<p><?php echo $textos['eficiente2']; ?></p>
											</div>
				 						</div>
				 					</div>
				 				</div>
							</div>	<!-- End row -->
						</div>	<!-- END FEATURES-12 WRAPPER -->
					</div>    <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-12 -->

			<!-- DIVIDER LINE -->
			<hr class="divider">

			<!-- FEATURES-11
			============================================= -->
			<section id="features-11" class="pt-90 pb-100 features-section division">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-70">	
								<!-- Title -->	
								<h2 class="s-50 w-700"><?php echo $textos['campaning']; ?></h2>	
								<!-- Text -->	
								<p class="s-21 color--grey"><?php echo $textos['campaning2']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['campaning3']; ?></p>
							</div>	
						</div>
					</div>

					<!-- FEATURES-11 WRAPPER -->
					<div class="fbox-wrapper">
						<div class="row row-cols-1 row-cols-md-2 rows-3">
							<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-11 fb-1 wow fadeInUp">
		 							<!-- Icon -->
		 							<div class="fbox-ico-wrap">
		 								<div class="fbox-ico ico-50">
		 									<div class="shape-ico color--theme">
												<!-- Vector Icon -->
												<span class="flaticon-graphics"></span>
												<!-- Shape -->
												<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
												  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
												</svg>
											</div>
		 								</div>
									</div>	<!-- End Icon -->
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['efectiva']; ?></h6>
										<p><?php echo $textos['efectiva2']; ?>
										</p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #1 -->	

		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-11 fb-2 wow fadeInUp">
		 							<!-- Icon -->
		 							<div class="fbox-ico-wrap">
		 								<div class="fbox-ico ico-50">
		 									<div class="shape-ico color--theme">
												<!-- Vector Icon -->
												<span class="flaticon-idea"></span>
												<!-- Shape -->
												<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
												  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
												</svg>
											</div>
		 								</div>
									</div>	<!-- End Icon -->
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['segmentacion']; ?></h6>
										<p><?php echo $textos['segmentacion1']; ?>
										</p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #2 -->	

		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-11 fb-3 wow fadeInUp">
		 							<!-- Icon -->
		 							<div class="fbox-ico-wrap">
		 								<div class="fbox-ico ico-50">
		 									<div class="shape-ico color--theme">
												<!-- Vector Icon -->
												<span class="flaticon-graphic"></span>
												<!-- Shape -->
												<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
												  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
												</svg>
											</div>
		 								</div>
									</div>	<!-- End Icon -->
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['automatizacion']; ?></h6>
										<p><?php echo $textos['automatizacion2']; ?>
										</p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #3 -->	
		 					
		 					<!-- FEATURE BOX #4 -->
		 					<div class="col">
		 						<div class="fbox-11 fb-4 wow fadeInUp">
		 							<!-- Icon -->
		 							<div class="fbox-ico-wrap">
		 								<div class="fbox-ico ico-50">
		 									<div class="shape-ico color--theme">
												<!-- Vector Icon -->
												<span class="flaticon-wireframe"></span>
												<!-- Shape -->
												<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
												  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
												</svg>
											</div>
		 								</div>
									</div>	<!-- End Icon -->
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['analisis']; ?></h6>
										<p><?php echo $textos['analisis2']; ?>
										</p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #4 -->	
						</div>  <!-- End row -->  
					</div>	<!-- END FEATURES-11 WRAPPER -->
				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-11 -->
			<!-- FEATURES-2
			============================================= -->
			<section id="features-2" class="py-100 features-section division">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-80">
								<!-- Title -->	
								<h2 class="s-50 w-700"><?php echo $textos['todo']; ?></h2>	
								<!-- Text -->	
								<p class="s-21 color--grey"><?php echo $textos['todo2']; ?></p>
							</div>	
						</div>
					</div>
					<!-- FEATURES-2 WRAPPER -->
					<div class="fbox-wrapper text-center">
						<div class="row row-cols-1 row-cols-md-3">
							<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-1 wow fadeInUp">
		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid" src="images/f_01.png" alt="feature-image">
									</div>
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['panel']; ?></h6>
										<p><?php echo $textos['panel2']; ?></p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #1 -->	

		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-2 wow fadeInUp">
		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid" src="images/f_02.png" alt="feature-image">
									</div>
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['conversaciones']; ?></h6>
										<p><?php echo $textos['conversaciones2']; ?></p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #2 -->		
		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-3 wow fadeInUp">
		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid" src="images/f_03.png" alt="feature-image">
									</div>
									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700"><?php echo $textos['protection']; ?></h6>
										<p><?php echo $textos['protection2']; ?></p>
									</div>
		 						</div>
		 					</div>	<!-- END FEATURE BOX #3 -->	
						</div>  <!-- End row -->  
					</div>	<!-- END FEATURES-2 WRAPPER -->
				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-2 -->

			<!-- DIVIDER LINE -->
			<hr class="divider">
			
			<!-- BANNER-16
			============================================= -->
			<section id="banner-16" class="banner-section">
				<div class="container">
					<!-- BANNER-16 WRAPPER -->
					<div class="banner-16-wrapper bg--white-100 block-border r-16">
						<div class="banner-overlay bg--fixed">
							<div class="row">
					<!-- BANNER-1 TEXT -->
								<div class="col">
									<div class="banner-16-txt text-center">
										<!-- Title -->	
										<h4 class="s-24 w-700"><?php echo $textos['eligeplan']; ?></h4>
										<!-- Text -->
										<p class="p-md mb-0"><?php echo $textos['eligeplan2']; ?> 
										</p>
										<!-- Link -->	
										<div class="txt-block-tra-link mt-15">
											<a href="pricing.php" class="tra-link ico-20 color--theme"><?php echo $textos['eligeplan3']; ?><span class="flaticon-next"></span>
											</a>
										</div>
									</div>
								</div>	<!-- END BANNER-16 TEXT -->
							</div>   <!-- End row -->	
						</div>   <!-- End banner overlay -->	
					</div>    <!-- END BANNER-16 WRAPPER -->
				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-16 -->
			
			<!-- BANNER-7
			============================================= -->
			<section id="banner-7" class="banner-section">
				<div class="banner-overlay py-100">
					<div class="container">
						<!-- BANNER-7 WRAPPER -->
						<div class="banner-7-wrapper">
							<div class="row justify-content-center">
								<!-- BANNER-7 TEXT -->
								<div class="col-md-8">
									<div class="banner-7-txt text-center">
										<!-- Title -->	
										<h2 class="s-50 w-700"><?php echo $textos['empezar']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['empezar2']; ?></h2>
										<!-- Buttons -->
										<div class="btns-group">
											<a href="<?php echo $config['domain_signup']; ?>" class="btn r-04 btn--theme hover--theme"><?php echo $textos['actionregister']; ?>
											</a>
											<a href="pricing.php" class="btn r-04 btn--tra-black hover--theme"><?php echo $textos['descubreprice']; ?></a>
										</div>	
		        					<!-- Button Text -->
										<p class="btn-txt ico-15"><?php echo $textos['trialfree']; ?></p>	
									</div>
								</div>
							</div>   <!-- End row -->	
						</div>    <!-- END BANNER-7 WRAPPER -->
					</div>    <!-- End container -->	
				</div>     <!-- End banner overlay -->	
			</section>	<!-- END BANNER-7 -->
			<!-- FAQs-2
			============================================= -->
			<section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">				
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-11 col-xl-10">
							<!-- INNER PAGE TITLE -->
							<div class="inner-page-title">
								<h2 class="s-52 w-700"><?php echo $textos['preguntasfrecuentes']; ?></h2>
								<p class="p-lg"><?php echo $textos['preguntasfrecuentes2']; ?></p>
							</div>

							<!-- QUESTIONS ACCORDION -->
					 		<div class="accordion-wrapper">
								<ul class="accordion">
							<!-- QUESTIONS CATEGORY #1 -->
									<li class="accordion-item ">
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700"><?php echo $textos['aprovecha']; ?> <?php echo $textos['namesite']; ?></h4>
										</div>
										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">
											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> <?php echo $textos['pregunta1']; ?></h5>
												</div>
												<!--Answer -->	
												<div class="faqs-2-answer color--grey">
													<!-- Text -->
													<p><?php echo $textos['respuesta1']; ?> <?php echo $textos['namesite']; ?>, <?php echo $textos['respuesta12']; ?>
													</p>
												</div>
											</div>	<!-- END QUESTION #1 -->
										</div>	<!-- END CATEGORY ANSWERS -->
									</li>	<!-- END QUESTIONS CATEGORY #1 -->

									<!-- QUESTIONS CATEGORY #2 -->
									<li class="accordion-item">
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700"><?php echo $textos['pregunta2']; ?></h4>
										</div>
										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">
											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> <?php echo $textos['respuesta2']; ?> <?php echo $textos['namesite']; ?>?</h5>
												</div>
												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													<!-- Text -->
													<p> <?php echo $textos['respuesta21']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['respuesta212']; ?>
													</p>
												</div>
											</div>	<!-- END QUESTION #2 -->
										</div>	<!-- END CATEGORY ANSWERS -->
									</li>	<!-- END QUESTIONS CATEGORY #2 -->

                                    <!-- QUESTIONS CATEGORY #3 -->
									<li class="accordion-item">
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700"><?php echo $textos['pregunta3']; ?></h4>
										</div>
										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">
											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> <?php echo $textos['respuesta3']; ?> <?php echo $textos['namesite']; ?>
													<?php echo $textos['respuesta32']; ?></h5>
												</div>
												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													<!-- Text -->
													<p> <?php echo $textos['respuesta323']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['respuesta3234']; ?></p>
												</div>
											</div>	<!-- END QUESTION #3 -->
										</div>	<!-- END CATEGORY ANSWERS -->
									</li>	<!-- END QUESTIONS CATEGORY #3 -->
									
									<!-- QUESTIONS CATEGORY 4 -->
									<li class="accordion-item">
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700"><?php echo $textos['pregunta4']; ?> <?php echo $textos['namesite']; ?></h4>
										</div>
										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">
											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> <?php echo $textos['respuesta4']; ?> <?php echo $textos['namesite']; ?>?</h5>
												</div>
												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													<!-- Text -->
													<p><?php echo $textos['respuesta1']; ?> <?php echo $textos['namesite']; ?>, <?php echo $textos['respuesta42']; ?> 
													</p>
												</div>
											</div>	<!-- END QUESTION #4 -->
										</div>	<!-- END CATEGORY ANSWERS -->
									</li>	<!-- END QUESTIONS CATEGORY #4 -->
									
									<!-- QUESTIONS CATEGORY #5 -->
									<li class="accordion-item">
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700"> <?php echo $textos['pregunta5']; ?> <?php echo $textos['namesite']; ?>?</h4>
										</div>
										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">
											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> <?php echo $textos['respuesta52']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['respuesta523']; ?></h5>
												</div>
												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													<!-- Text -->
													<p> <?php echo $textos['pregunta6']; ?> <?php echo $textos['namesite']; ?> <?php echo $textos['respuesta6']; ?></p>
												</div>
											</div>	<!-- END QUESTION #5 -->
										</div>	<!-- END CATEGORY ANSWERS -->
									</li>	<!-- END QUESTIONS CATEGORY #5 -->
								</ul>
							</div>	<!-- END QUESTIONS ACCORDION -->
							<!-- MORE QUESTIONS LINK -->	
							<div class="more-questions">
								<div class="more-questions-txt bg--white-400 r-100">
									<p class="p-lg"><?php echo $textos['call']; ?> <a href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text=Hola&type=phone_number&app_absent=0" class="color--theme" target="_blank"><?php echo $textos['call2']; ?></a></p>
								</div>
							</div>
						</div>	
					</div>    <!-- End row -->	
				</div>	   <!-- End container -->	
			</section>	<!-- END FAQs-2 -->
			<!-- DIVIDER LINE -->
			<hr class="divider">
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
									<p class="p-sm">&copy; 2024 <?php echo $textos['namesite']; ?>.  <span><?php echo $textos['copy']; ?></span></p><br>
								
								</div>
							</div>
							<!-- FOOTER SECONDARY LINK -->
							<div class="col">
								<div class="bottom-secondary-link ico-15 text-end">
									<p class="p-sm"><a href="#"><?php echo $textos['madein']; ?> 
										<span class="flaticon-heart color--pink-400"></span> <?php echo $textos['developer']; ?><?php echo $textos['namesite']; ?></a><br>
									</p>
								</div>
							</div>
						</div>  <!-- End row -->
					</div>	<!-- END BOTTOM FOOTER -->
				</div>     <!-- End container -->	
			</footer>   <!-- END FOOTER-3 -->	
		</div>	<!-- END PAGE CONTENT -->	
		<!-- EXTERNAL SCRIPTS
		============================================= -->	
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

	<!--Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
	
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
		<script>
		    $('.video-popup1').magnificPopup({
		    type: 'iframe',		  	  
				iframe: {
					patterns: {
						youtube: {			   
							index: 'youtube.com',
							src: 'https://www.youtube.com/embed/UtijXkcq3GA?si=c0CvgxjwPYZWmIzG'				
								}
							}
						}		  		  
		});
		</script>
		<script>
        let words = [
            "<?php echo $textos['textanimation1']; ?>",
            "<?php echo $textos['textanimation2']; ?>",
            "<?php echo $textos['textanimation3']; ?>",
            "<?php echo $textos['textanimation4']; ?>"
        ];
        let currentWord = 0;
        let wordElement = document.getElementById('word');
        let typingSpeed = 100; // Velocidad de escritura (ms)
        let erasingSpeed = 50; // Velocidad de borrado (ms)
        let pauseTime = 1500; // Tiempo de espera entre cada palabra
        let isErasing = false;

        function type() {
            let word = words[currentWord];
            let letterIndex = 0;

            // Escribir letra por letra
            function write() {
                if (letterIndex < word.length) {
                    wordElement.textContent += word.charAt(letterIndex);
                    letterIndex++;
                    setTimeout(write, typingSpeed);
                } else {
                    setTimeout(erase, pauseTime); // Esperar antes de borrar
                }
            }

            // Borrar letra por letra
            function erase() {
                let currentText = wordElement.textContent;
                if (currentText.length > 0) {
                    wordElement.textContent = currentText.substring(0, currentText.length - 1);
                    setTimeout(erase, erasingSpeed);
                } else {
                    currentWord = (currentWord + 1) % words.length; // Cambiar palabra
                    setTimeout(type, pauseTime); // Esperar antes de escribir la siguiente palabra
                }
            }

            write(); // Comenzar a escribir
        }

        // Iniciar el proceso de escritura
        window.onload = function() {
            type();
        };
    </script>
    <script>
    	// Obtener elementos del DOM
const modal = document.getElementById("modal");
const modalOverlay = document.getElementById("modal-overlay");
const closeBtn = document.getElementById("close-btn");

// Función para mostrar el modal
function openModal() {
    modal.classList.add("active");
    modalOverlay.classList.add("active");
}

// Función para cerrar el modal
function closeModal() {
    modal.classList.remove("active");
    modalOverlay.classList.remove("active");
}

// Cerrar el modal cuando haces clic en el fondo (overlay)
modalOverlay.addEventListener("click", closeModal);

// Evento para cerrar el modal al hacer clic en el botón de cierre
closeBtn.addEventListener("click", closeModal);

// Función para abrir el modal programáticamente
function showModal() {
    if (!modal.classList.contains("active")) {
        openModal();
    }
}

// Evento para abrir el modal (puedes agregarlo a un botón o cuando desees)
document.getElementById("open-modal-btn").addEventListener("click", showModal);

    </script>
	</body>
</html>