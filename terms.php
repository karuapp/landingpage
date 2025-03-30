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
                                <a href="index.php" class="logo-black"><img src="images/logo-skyblue.png" alt="logo"></a>
                            </div>
                            <!-- HEADER WHITE LOGO -->
                            <div class="desktoplogo">
                                <a href="index.php" class="logo-white"><img src="images/logo-skyblue.png" alt="logo"></a>
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
                                
                            </nav>  <!-- END MAIN MENU -->
                        </div>
                    </div>  <!-- END NAVIGATION MENU -->
                </div>     <!-- End header-wrapper -->
            </header>   <!-- END HEADER -->



        <!-- PAGE CONTENT
        ============================================= -->   
        <div id="page" class="page font--jakarta">




            <!-- LOGIN PAGE
            ============================================= -->
            <div id="login" class="bg--scroll login-section division">
                <div class="container">
                    <div class="row justify-content-center">


                        <!-- INNER PAGE TITLE -->
                            <div class="inner-page-title">
                                    <h2 class="s-52 w-700"><?php echo $textos['terms1_title']; ?></h2>
                                    <p class="p-lg"><?php echo $textos['terms1']; ?></p>
                                </div>

                                <div class="txt-block legal-info">
                                    <h4 class="s-30 w-700"><span>1.</span> <?php echo $textos['terms2_title']; ?></h4>
                                    <p><?php echo $textos['terms2']; ?></p>
                                    

                                    <h4 class="s-30 w-700"><span>2.</span> <?php echo $textos['terms3_title']; ?></h4>
                                    <p><?php echo $textos['terms3']; ?></p>
                                    

                                    <h4 class="s-30 w-700"><span>3.</span> <?php echo $textos['terms4_title']; ?></h4>
                                    <p><?php echo $textos['terms4']; ?></p>
                                    
                                    <ul class="simple-list">
                                        <li class="list-item">
                                            <p><?php echo $textos['terms5_title']; ?></p>
                                        </li>
                                        <li class="list-item">
                                            <p><?php echo $textos['terms5']; ?></p>
                                        </li>
                                    </ul>

                                    <h5 class="s-24 w-700"><span>3.1.</span> <?php echo $textos['terms5_title']; ?></h5>
                                    <p><?php echo $textos['terms5']; ?></p>
                                    

                                    <h4 class="s-30 w-700"><span>4.</span> <?php echo $textos['terms6_title']; ?></h4>
                                    <p><?php echo $textos['terms6']; ?></p>
                                    
                                    <h5 class="s-24 w-700"><span>4.1.</span> <?php echo $textos['terms7_title']; ?></h5>
                                    <p><?php echo $textos['terms7']; ?></p>
                                    

                                    <h5 class="s-24 w-700"><span>4.2.</span> <?php echo $textos['terms8_title']; ?></h5>
                                    <p><?php echo $textos['terms8']; ?></p>

                                    <h4 class="s-30 w-700"><span>5.</span> <?php echo $textos['terms9_title']; ?></h4>
                                    <ul class="simple-list">
                                        <li class="list-item">
                                            <p><?php echo $textos['terms9']; ?></p>
                                        </li>
                                        <li class="list-item">
                                            <p><?php echo $textos['terms9']; ?></p>
                                        </li>
                                    </ul>
                                    <p><?php echo $textos['terms25']; ?></p>

                                    <h4 class="s-30 w-700"><span>6.</span> <?php echo $textos['terms10_title']; ?></h4>
                                    <p><?php echo $textos['terms10']; ?></p>
                                    
                                    
                                    <h5 class="s-24 w-700"><span>6.1.</span> <?php echo $textos['terms11_title']; ?></h5>
                                    <p><?php echo $textos['terms11']; ?></p>
                                    

                                    <h4 class="s-30 w-700"><span>7.</span> <?php echo $textos['terms12_title']; ?></h4>
                                    <p><?php echo $textos['terms12']; ?></p>

                                    <h4 class="s-30 w-700"><span>8.</span> <?php echo $textos['terms13_title']; ?></h4>
                                    <p><?php echo $textos['terms13']; ?></p>
                                    <h4 class="s-30 w-700"><span>9.</span> <?php echo $textos['terms14_title']; ?></h4>
                                    <p><?php echo $textos['terms14']; ?></p>

                                    <h4 class="s-30 w-700"><span>10.</span> <?php echo $textos['terms15_title']; ?></h4>
                                    <p><?php echo $textos['terms15']; ?></p>

                                    <h4 class="s-30 w-700"><span>11.</span> <?php echo $textos['terms16_title']; ?></h4>
                                    <p><?php echo $textos['terms16']; ?></p>
                                    
                                    <h4 class="s-30 w-700"><span>12.</span> <?php echo $textos['terms17_title']; ?></h4>
                                    <p><?php echo $textos['terms17']; ?></p>

                                    <h4 class="s-30 w-700"><span>13.</span> <?php echo $textos['terms18_title']; ?></h4>
                                    <p><?php echo $textos['terms18']; ?></p>

                                    <h4 class="s-30 w-700"><span>14.</span> <?php echo $textos['terms19_title']; ?></h4>
                                    <p><?php echo $textos['terms19']; ?></p>

                                    <h4 class="s-30 w-700"><span>15.</span> <?php echo $textos['terms20_title']; ?></h4>
                                    <p><?php echo $textos['terms20']; ?></p>

                                    <h4 class="s-30 w-700"><span>16.</span> <?php echo $textos['terms21_title']; ?></h4>
                                    <p><?php echo $textos['terms21']; ?></p>

                                    <h4 class="s-30 w-700"><span>17.</span> <?php echo $textos['terms22_title']; ?></h4>
                                    <p><?php echo $textos['terms22']; ?></p>

                                    <h4 class="s-30 w-700"><span>18.</span> <?php echo $textos['terms23_title']; ?></h4>
                                    <p><?php echo $textos['terms23']; ?></p>

                                    <h4 class="s-30 w-700"><span>19.</span> <?php echo $textos['terms24_title']; ?></h4>
                                    <p><?php echo $textos['terms24']; ?></p>

                                    <h4 class="s-30 w-700"><span>20.</span> <?php echo $textos['terms25_title']; ?></h4>
                                    <p><?php echo $textos['terms25']; ?></p>

                                    <h4 class="s-30 w-700"><span>21.</span> <?php echo $textos['terms26_title']; ?></h4>
                                    <p><?php echo $textos['terms26']; ?></p>

                                    <h4 class="s-30 w-700"><span>22.</span> <?php echo $textos['terms27_title']; ?></h4>
                                    <p><?php echo $textos['terms27']; ?></p>

                                    <h4 class="s-30 w-700"><span>23.</span> <?php echo $textos['terms28_title']; ?></h4>
                                    <p><?php echo $textos['terms28']; ?></p>

                                    <h4 class="s-30 w-700"><span>24.</span> <?php echo $textos['terms29_title']; ?></h4>
                                    <p><?php echo $textos['terms29']; ?></p>

                                    <h4 class="s-30 w-700"><span>25.</span> <?php echo $textos['terms30_title']; ?></h4>
                                    <p><?php echo $textos['terms30']; ?></p>

                                    <h4 class="s-30 w-700"><span>26.</span> <?php echo $textos['terms31_title']; ?></h4>
                                    <p><?php echo $textos['terms31']; ?></p>

                                    <h4 class="s-30 w-700"><span>27.</span> <?php echo $textos['terms32_title']; ?></h4>
                                    <p><?php echo $textos['terms32']; ?></p>


                                    <h4 class="s-30 w-700"><span>9.</span> <?php echo $textos['terms14_title']; ?></h4>
                                    <p><?php echo $textos['terms32']; ?> <a href="mailto:<?php echo $textos['email_contact']; ?>" class="color--theme"><?php echo $textos['email_contact']; ?></a></p>
                                </div>



                            </div>  <!-- END TEXT BLOCK --> 


                    </div>     <!-- End row --> 
                </div>     <!-- End container -->       
            </div>  <!-- END LOGIN PAGE -->




        </div>  <!-- END PAGE CONTENT -->   




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

        <script>
            document.getElementById("password").addEventListener("input", function() {
                var password = this.value;
                var alertMessage = document.getElementById("password-alert");

                var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{7,}$/;

                if (!regex.test(password)) {
                    alertMessage.style.display = "block";
                } else {
                    alertMessage.style.display = "none";
                }
            });
            </script>
 

            <script>
                function toggleWarning() {
                    let checkbox = document.getElementById("trial");
                    let warningText = document.getElementById("trial-warning");

                    // Si el checkbox está marcado, mostramos el mensaje, si no, lo ocultamos
                    warningText.style.display = checkbox.checked ? "inline" : "none";
                }
            </script>


        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->                                                         
        <!--
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
        --> 


    </body>




</html>