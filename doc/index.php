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
$textos = include("../lang/{$idioma}.php");

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
$config = include('../config.php');
?>
<!DOCTYPE html>

<html>
<html lang="<?php echo $idioma; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Documentation">
    <meta name="author" content=" ">
    <title><?php echo $textos['documentacion']; ?> <?php echo $config['namesite']; ?></title>
    <link rel="stylesheet" href="assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/site.css" id="stylesheet">
    <link rel="stylesheet" href="assets/css/docs.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <!--estilo de la caja de codigo-->
    <style>
    .code-container {
      background-color: #2d2d2d;
      color: #ffffff;
      padding: 20px;
      border-radius: 5px;
    }
    .code {
      font-family: 'Courier New', Courier, monospace;
      font-size: 14px;
      white-space: pre-wrap;
      color: #ffffff;
      text-align: left !important; /* Alineación del texto a la izquierda */
    }
  </style>
  <style>
    /* Contenedor principal del idioma */
.nl-simple {
    position: relative;
    display: inline-block;
    font-family: Arial, sans-serif;
}

/* Enlace principal de la selección de idioma */
.nl-simple .h-link {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 5px 10px;
    background-color: transparent;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nl-simple .h-link:hover {
    background-color: #f0f0f0;
}

/* Estilos para la bandera */
.nl-simple .h-link img {
    width: 20px;
    margin-right: 5px;
}

/* Icono de la flecha */
.nl-simple .h-link .fas.fa-angle-down {
    margin-left: 5px;
    font-size: 12px;
}

/* Submenú */
.nl-simple .sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 180px;
    z-index: 10;
}

/* Elementos dentro del submenú */
.nl-simple .sub-menu li {
    list-style: none;
}

.nl-simple .sub-menu li a {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

/* Efecto hover en los enlaces del submenú */
.nl-simple .sub-menu li a:hover {
    background-color: #f0f0f0;
}

/* Mostrar el submenú cuando se hace clic */
.nl-simple:hover .sub-menu {
    display: block;
}
</style>
    <!--fin stilo de la caja de codigo-->                  
</head>
<body class="docs">
<header class="header fixed-top border-bottom">
    <nav id="navbar-main" class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo $textos['documentacion']; ?> <?php echo $config['namesite']; ?>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="menu-item-depth-0"><a href="<?php echo $config['domain']; ?>" target="_blank"><?php echo $textos['inicio']; ?></a></li>&nbsp;&nbsp;&nbsp;
                                
                </ul>               
                                
               <!-- <ul class="navbar-nav ml-auto">
                    
                                <li><a href=""><img src="/assets/img/flat-spanish.png" alt="es"> <strong>Es</strong></a></li>&nbsp;&nbsp;
                                    
                                <li><a href="index.php"><img src="/assets/img/flat-english.png" alt="en"> En</a></li>
                                        
                                
                                
                </ul>&nbsp;&nbsp;-->
                <li class="nl-simple" aria-haspopup="true">
                            <a href="#" class="h-link">
                                <img src="../<?php echo $idiomaActual['bandera']; ?>" alt="<?php echo $idiomaActual['nombre']; ?>" style="width: 20px; margin-right: 5px;">
                                <?php echo $idiomaActual['nombre']; ?>
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="?lang=es"><img src="../images/flags/spain.png" alt="Español" style="width: 20px; margin-right: 5px;"> Español</a></li>
                                <li><a href="?lang=en"><img src="../images/flags/usa.png" alt="English" style="width: 20px; margin-right: 5px;"> English</a></li>
                                <li><a href="?lang=fr"><img src="../images/flags/france.png" alt="Français" style="width: 20px; margin-right: 5px;"> Français</a></li>
                                <li><a href="?lang=ptBR"><img src="../images/flags/brazil.png" alt="Português" style="width: 20px; margin-right: 5px;"> Português</a></li>
                            </ul>
                        </li>
                <a href="<?php echo $config['domain_signup']; ?>" class="btn btn-sm btn-primary btn-icon d-none d-lg-inline-flex" target="_blank">
                    <span class="btn-inner--icon"><i class=""></i></span>
                    <span class="btn-inner--text"><?php echo $textos['iniciafree']; ?></span>
             
                </a>
            </div>
        </div>
    </nav>
</header>

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="px-3 scrollbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav navbar-nav-docs">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-getting-started" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-getting-started">
                        <?php echo $textos['doc1']; ?>
                    </a>
                    <div class="collapse" id="navbar-getting-started" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?php echo $textos['doc2']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#license" class="nav-link"><?php echo $textos['doc3']; ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-payment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation">
                        Instalacion
                    </a>
                    <div class="collapse" id="navbar-payment" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#installation" class="nav-link">Requisitos del Sistema</a>
                            </li>
                            <li class="nav-item">
                                <a href="#create_database" class="nav-link">Creacion de base de datos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#upload_files" class="nav-link">Subir Archivos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#installation_wizard" class="nav-link">Instalador de un click</a>
                            </li>
                            <li class="nav-item">
                                <a href="#installation_nodejs" class="nav-link">Intalar Node.js</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cloudpanel" class="nav-link">Intalar en VPS Cloud Panel</a>
                            </li>
                            <li class="nav-item">
                                <a href="#default_login" class="nav-link">Inicio de Sesion</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cron_job" class="nav-link">Trabajo Cron</a>
                            </li>
                        </ul>
                    </div>
                </li-->
                <!--li class="nav-item">
                    <a class="nav-link" href="#paypal">
                        Configurar Paypal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#razorpay">
                        Configurar Razor Pay
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mercadopago">
                        Configurar Mercado Pago
                    </a>
                </li-->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-payment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation">
                        <?php echo $textos['doc4']; ?>
                    </a>
                    <div class="collapse" id="navbar-payment" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#crear-cuenta" class="nav-link"><?php echo $textos['doc5']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#iniciar-sesion" class="nav-link"><?php echo $textos['doc6']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#configuracion-inicial" class="nav-link"><?php echo $textos['doc7']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#crear-departamento" class="nav-link"><?php echo $textos['doc8']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#registrar-whatsapp" class="nav-link"><?php echo $textos['doc9']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#agregar-operadores" class="nav-link"><?php echo $textos['doc10']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#agregar-etiquetas" class="nav-link"><?php echo $textos['doc11']; ?> </a>
                            </li>
                            <li class="nav-item">
                                <a href="#agregar-etiquetas-embudo" class="nav-link"><?php echo $textos['doc12']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#respuestas-rapidas" class="nav-link"><?php echo $textos['doc13']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#recargar-membresia" class="nav-link"><?php echo $textos['doc14']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#rest-api" class="nav-link"><?php echo $textos['doc15']; ?></a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-avanzado" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation"><?php echo $textos['doc16']; ?>
              
                    </a>
                    <div class="collapse" id="navbar-avanzado" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#chat" class="nav-link"><?php echo $textos['doc17']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#bot-default" class="nav-link"><?php echo $textos['doc18']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#agendamientos" class="nav-link"><?php echo $textos['doc19']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#chat-interno" class="nav-link"><?php echo $textos['doc20']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#contactos" class="nav-link"><?php echo $textos['doc21']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#tutoriales" class="nav-link"><?php echo $textos['doc22']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#dashboard" class="nav-link"><?php echo $textos['doc23']; ?></a>
                            </li>
                            <!--li class="nav-item">
                                <a href="#open.ai" class="nav-link"><?php echo $textos['doc24']; ?></a>
                            </li-->
                            
                            <li class="nav-item">
                                <a href="#anuncios" class="nav-link"><?php echo $textos['doc25']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#tareas" class="nav-link"><?php echo $textos['doc26']; ?></a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-automatizaciones" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation"><?php echo $textos['doc27']; ?>
              
                    </a>
                    <div class="collapse" id="navbar-automatizaciones" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#lista-difusion" class="nav-link"><?php echo $textos['doc28']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#contactos-difusion" class="nav-link"><?php echo $textos['doc29']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#ajuste-difusion" class="nav-link"><?php echo $textos['doc30']; ?></a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-api" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation"><?php echo $textos['doc31']; ?>
                    </a>
                    <div class="collapse" id="navbar-api" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                    <a href="#open" class="nav-link"><?php echo $textos['iniciafree']; ?><?php echo $textos['doc32']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#dialogflow" class="nav-link"><?php echo $textos['iniciafree']; ?><?php echo $textos['doc33']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#n8n" class="nav-link"><?php echo $textos['iniciafree']; ?><?php echo $textos['doc34']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#webhooks" class="nav-link"><?php echo $textos['iniciafree']; ?><?php echo $textos['doc35']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#typebot" class="nav-link"><?php echo $textos['iniciafree']; ?><?php echo $textos['doc36']; ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-flujobot" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-installation"><?php echo $textos['doc396']; ?>
                    </a>
                    <div class="collapse" id="navbar-flujobot" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                    <a href="#tiposdeflujo" class="nav-link"><?php echo $textos['doc397']; ?><?php echo $textos['doc32']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#opcionesdeflujobot" class="nav-link"><?php echo $textos['doc398']; ?><?php echo $textos['doc33']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#fluobotconversacion" class="nav-link"><?php echo $textos['doc399']; ?><?php echo $textos['doc34']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#fluobotcampana" class="nav-link"><?php echo $textos['doc400']; ?><?php echo $textos['doc35']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#integrarflujobottypebot" class="nav-link"><?php echo $textos['doc401']; ?><?php echo $textos['doc36']; ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
            <h6 class="navbar-heading text-muted mt-4"><?php echo $textos['iniciafree']; ?>Ayuda</h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" target="_blank">
                        <i class="fas fa-question-circle"></i><?php echo $textos['doc37']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" target="_blank">
                        <i class="fas fa-user"></i><?php echo $textos['doc38']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#condiciones">
                        <i class="fa fa-check-circle"></i><?php echo $textos['doc39']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#politicas">
                        <i class="fa fa-user-secret"></i><?php echo $textos['doc40']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cookies">
                        <i class="fa fa-shield"></i><?php echo $textos['doc41']; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <div class="docs-content">
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc42']; ?></strong> :<?php echo $textos['doc43']; ?>
                    </div>
                    <div class="docs-page-title">
                        <h2><?php echo $textos['doc44']; ?></h2>
                    </div>
                    <p><?php echo $textos['doc45']; ?></p>
                    <p><?php echo $textos['doc46']; ?></p>
                    <ul>
                    <li><?php echo $textos['doc47']; ?></li>
                    <li><?php echo $textos['doc48']; ?></li>
                    <li><?php echo $textos['doc49']; ?></li>
                    <li><?php echo $textos['doc50']; ?></li>
                    <li><?php echo $textos['doc51']; ?></li>
                    <li><?php echo $textos['doc52']; ?></li>
                    </ul>
                
                    <p><?php echo $textos['doc53']; ?>
                        <a href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" target="_blank"><?php echo $textos['doc54']; ?></a>
                        </p>

                    <hr class="divider divider-fade">
                    <h2 id="license"><?php echo $textos['doc55']; ?></h2>
                    <p><b><?php echo $textos['doc56']; ?></b></p>
                    <p><?php echo $textos['doc57']; ?></p>

                    <hr class="divider divider-fade">
                    
                    <h2 id="crear-cuenta"><?php echo $textos['doc58']; ?></h2>
                    <p><b><?php echo $textos['doc59']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc60']; ?> <a href="<?php echo $config['domain_signup']; ?>" target="_blank"><?php echo $textos['doc61']; ?></a> <?php echo $textos['doc62']; ?></li>
                    <p><img src="assets/img/01.PNG" alt="logo" style="width: 55%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc63']; ?></strong> : <?php echo $textos['doc64']; ?>
                    </div>

                    <hr class="divider divider-fade">
                    <h2 id="iniciar-sesion"><?php echo $textos['doc65']; ?></h2>
                    <p><b><?php echo $textos['doc66']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc67']; ?> <a href="<?php echo $config['domain_app']; ?>login" target="_blank"><?php echo $textos['doc68']; ?></a> <?php echo $textos['doc69']; ?></li>
                    <p><img src="assets/img/02.PNG" alt="logo" style="width: 55%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc71']; ?> <a href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" target="_blank"><?php echo $textos['doc72']; ?></a> <?php echo $textos['doc73']; ?>
                    </div>

                     <hr class="divider divider-fade">
                    <h2 id="configuracion-inicial"><?php echo $textos['doc74']; ?></h2>
                    <p><b><?php echo $textos['doc75']; ?> <?php echo $config['namesite']; ?> </b></p>
                    <li class="pb-1"><?php echo $textos['doc76']; ?> <a href="<?php echo $config['domain_app']; ?>settings" target="_blank"><?php echo $textos['doc77']; ?></a> <?php echo $textos['doc78']; ?> <?php echo $config['namesite']; ?>.</li>
                    <p><img src="assets/img/03.PNG" alt="logo" style="width: 70%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <p><b><?php echo $textos['doc79']; ?></b></p>
                    
                    <p><img src="assets/img/04.PNG" alt="logo" style="width: 70%" class="sombra"></p>
                    <p><b><?php echo $textos['doc80']; ?></b></p>
                    <p><img src="assets/img/06.PNG" alt="logo" style="width: 30%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <p><b><?php echo $textos['doc81']; ?></b></p>
                    
                    <p><img src="assets/img/05.PNG" alt="logo" style="width: 120%" class="sombra" ></p>
                    <hr class="divider divider-fade">
                    <p><b><?php echo $textos['doc82']; ?></b></p>
                    <li class="pb-1">1. <strong><?php echo $textos['doc83']; ?></strong> <?php echo $textos['doc84']; ?> </li>
                    <li class="pb-1">2. <strong><?php echo $textos['doc85']; ?></strong> <?php echo $textos['doc86']; ?></li>
                    <li class="pb-1">3. <strong><?php echo $textos['doc87']; ?></strong><?php echo $textos['idoc88']; ?>  <?php echo $config['namesite']; ?> <?php echo $textos['doc89']; ?></li>
                    <li class="pb-1">4. <strong><?php echo $textos['doc90']; ?></strong> <?php echo $textos['doc91']; ?></li>
                    <li class="pb-1">5. <strong><?php echo $textos['doc92']; ?></strong> <?php echo $textos['doc93']; ?></li>
                    <li class="pb-1">6. <strong><?php echo $textos['doc94']; ?></strong> <?php echo $textos['doc95']; ?>.</li>
                    <li class="pb-1">7. <strong><?php echo $textos['doc96']; ?></strong> <?php echo $textos['doc97']; ?></li>
                    
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc98']; ?>
                    </div>

                    <hr class="divider divider-fade">
                    <h2 id="crear-departamento"><?php echo $textos['doc99']; ?> </h2>
                    <p><b><?php echo $textos['doc100']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc101']; ?> <a href="<?php echo $config['domain_app']; ?>queues" target="_blank"><?php echo $textos['doc102']; ?></a> <?php echo $textos['doc103']; ?></li>
                    <p><b><?php echo $textos['doc104']; ?></b></p>
                    <p><img src="assets/img/07.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><b><?php echo $textos['doc105']; ?></b></p>
                    <li class="pb-1">1. <strong><?php echo $textos['doc106']; ?> </strong><?php echo $textos['doc107']; ?></li>
                    <li class="pb-1">2. <strong><?php echo $textos['doc108']; ?> </strong><?php echo $textos['doc109']; ?> </li>
                    <li class="pb-1">3. <strong><?php echo $textos['doc110']; ?> </strong><?php echo $textos['doc111']; ?></li>
                    <li class="pb-1">4. <strong><?php echo $textos['doc112']; ?> </strong><?php echo $textos['doc113']; ?> </li>
                    <li class="pb-1">5. <strong><?php echo $textos['doc114']; ?> </strong><?php echo $textos['doc115']; ?> </li>
                    
                    <p><img src="assets/img/08.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><b><?php echo $textos['doc116']; ?></b></p>
                    <p><img src="assets/img/8.2.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    
                    <p><img src="assets/img/8.3.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc117']; ?> <a href="#bot-default"><?php echo $textos['doc118']; ?></a>
                    </div>
                   
                    
                    <hr class="divider divider-fade">
                    <h2 id="registrar-whatsapp"><?php echo $textos['doc119']; ?></h2>
                    <p><b><?php echo $textos['doc120']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['iniciafree']; ?>Ve a <a href="<?php echo $config['domain_app']; ?>connections" target="_blank"><?php echo $textos['doc121']; ?></a> <?php echo $textos['doc122']; ?></li>
                    <p><b><?php echo $textos['doc123']; ?></b></p>
                    <p><img src="assets/img/09.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    
                    <p><img src="assets/img/10.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><b><?php echo $textos['doc124']; ?></b></p>
                    <ul>
                        <li><strong>1. <?php echo $textos['doc125']; ?> </strong><?php echo $textos['doc126']; ?> </li>
                        <li><strong>2. <?php echo $textos['doc127']; ?> </strong><?php echo $textos['doc128']; ?> </li>
                        <li><strong>3. <?php echo $textos['doc129']; ?> </strong><?php echo $textos['doc130']; ?></li>
                        <li><strong>4. <?php echo $textos['doc131']; ?> </strong><?php echo $textos['doc132']; ?>. </li>
                        <li><strong>5. <?php echo $textos['doc133']; ?> </strong><?php echo $textos['doc134']; ?> </li>
                        <li><strong>6. <?php echo $textos['doc135']; ?> </strong><?php echo $textos['doc136']; ?> </li>
                        <li><strong>7. <?php echo $textos['doc137']; ?> </strong><?php echo $textos['doc138']; ?><?php echo $textos['doc139']; ?></li>
                        <li><strong>8. <?php echo $textos['doc140']; ?> </strong><?php echo $textos['doc141']; ?> </li>
                        <li><strong>9. <?php echo $textos['doc142']; ?> </strong><?php echo $textos['doc143']; ?></li>
                        <li><strong>10. <?php echo $textos['doc144']; ?> </strong><?php echo $textos['doc145']; ?></li>
                        <li><strong>11. <?php echo $textos['doc146']; ?></strong><?php echo $textos['doc147']; ?></li>
                        <li><strong>12. <?php echo $textos['doc148']; ?></strong><?php echo $textos['doc149']; ?></li>
                        
                    </ul>
                    <p><b><?php echo $textos['doc150']; ?></b></p>
                    <p><img src="assets/img/11.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><b><?php echo $textos['doc151']; ?><code class="badge badge-info"><?php echo $textos['doc152']; ?></code>-><code class="badge badge-info"><?php echo $textos['doc153']; ?></code>-><code class="badge badge-info"><?php echo $textos['doc154']; ?></code>-><code class="badge badge-info"><?php echo $textos['doc155']; ?></code> </b></p>
                    <p><img src="assets/img/12.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/scan.gif" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc156']; ?>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <h2 id="agregar-operadores"><?php echo $textos['doc157']; ?></h2>
                    <p><b><?php echo $textos['doc158']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc159']; ?><code class="badge badge-info"><?php echo $textos['doc160']; ?></code>-><code class="badge badge-info"><?php echo $textos['doc161']; ?></code>-><code class="badge badge-info"><?php echo $textos['doc162']; ?></code> <?php echo $textos['doc163']; ?></li>
                    <p><img src="assets/img/13.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/14.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li><strong>1. <?php echo $textos['doc164']; ?> </strong><?php echo $textos['doc165']; ?> </li>
                    <li><strong>2. <?php echo $textos['doc166']; ?> </strong><?php echo $textos['doc167']; ?></li>
                    <li><strong>3. <?php echo $textos['doc168']; ?> </strong><?php echo $textos['doc169']; ?></li>
                    <li><strong>4. <?php echo $textos['doc170']; ?> </strong><?php echo $textos['doc171']; ?><code class="badge badge-info"><?php echo $textos['doc172']; ?></code>: <?php echo $textos['doc173']; ?> <code class="badge badge-info"><?php echo $textos['doc174']; ?></code>: <?php echo $textos['doc175']; ?></li>
                    <li><strong>5. <?php echo $textos['doc176']; ?> </strong><?php echo $textos['doc177']; ?></li>
                    <li><strong>6. <?php echo $textos['doc178']; ?> </strong><?php echo $textos['doc179']; ?></li>
                    <li><strong>7. <?php echo $textos['doc180']; ?> </strong><?php echo $textos['doc181']; ?> </li>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc182']; ?>
                    </div>

                    <hr class="divider divider-fade">
                    <h2 id="agregar-etiquetas"><?php echo $textos['doc183']; ?></h2>
                    <p><b><?php echo $textos['doc184']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc185']; ?><a href="<?php echo $config['domain_app']; ?>tags" target="_blank"><?php echo $textos['doc186']; ?></a> <?php echo $textos['doc187']; ?></li>
                    <p><img src="assets/img/15.PNG" alt="logo" style="width: 35%" class="sombra"></p>
                    <p><?php echo $textos['doc188']; ?></p>
                    <p><img src="assets/img/16.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                     <p><?php echo $textos['doc189']; ?></p>
                    <li><strong>1. <?php echo $textos['doc190']; ?> </strong><?php echo $textos['doc191']; ?></li>
                    <li><strong>2. <?php echo $textos['doc192']; ?> </strong><?php echo $textos['doc193']; ?></li>
                    <li><strong>3. <?php echo $textos['doc194']; ?> </strong><?php echo $textos['doc195']; ?></li>
                    
                    <p><img src="assets/img/17.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc196']; ?>
                    </div>
                    

                    <hr class="divider divider-fade">
                    <h2 id="agregar-etiquetas-embudo"><?php echo $textos['doc197']; ?></h2>
                    <p><b><?php echo $textos['doc198']; ?></b></p>
                    <ol>
                        <li class="pb-1"><?php echo $textos['doc199']; ?><a href="<?php echo $config['domain_app']; ?>tags"><?php echo $textos['doc200']; ?></a> <?php echo $textos['doc201']; ?></li>
                        
                        <p><img src="assets/img/15.PNG" alt="logo" style="width: 35%" class="sombra"></p>
                        <li class="pb-1"><?php echo $textos['doc202']; ?></li>
                       
                        <p><img src="assets/img/16.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                         <p><?php echo $textos['doc203']; ?></p>
                         <p><img src="assets/img/18.PNG" alt="logo" style="width: 70%" class="sombra" ></p>
                        <li><strong>1. <?php echo $textos['doc204']; ?> </strong><?php echo $textos['doc205']; ?></li>
                        <li><strong>2. <?php echo $textos['doc206']; ?></strong><?php echo $textos['doc207']; ?></li>
                        <li><strong>3. <?php echo $textos['doc208']; ?> </strong><?php echo $textos['doc209']; ?></li>
                        <li class="pb-1"><?php echo $textos['doc210']; ?></li>
                    </ol>
                    <p><?php echo $textos['doc211']; ?></p>
                    <p><img src="assets/img/16.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                     <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc212']; ?>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <h2 id="respuestas-rapidas"><?php echo $textos['doc213']; ?></h2>
                    <p><b><?php echo $textos['doc214']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc215']; ?> <a href="<?php echo $config['domain_app']; ?>quick-messages" target="_blank"><?php echo $textos['doc216']; ?></a> <?php echo $textos['doc224']; ?></li>
                    
                    <p><b><?php echo $textos['doc217']; ?></b></p>
                    <li class="pb-1"><strong><?php echo $textos['doc218']; ?>:</strong> <?php echo $textos['doc219']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc220']; ?></strong> <?php echo $textos['doc221']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc222']; ?></strong> <?php echo $textos['doc223']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc225']; ?></strong> <?php echo $textos['doc226']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc227']; ?></strong> <?php echo $textos['doc228']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc229']; ?></strong> <?php echo $textos['doc230']; ?></li>
                    <p><?php echo $textos['doc231']; ?></p>
                    <p><img src="assets/img/50.PNG" alt="logo" style="width: 50%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc232']; ?> <a href="#variables"><?php echo $textos['doc233']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="recargar-membresia"><?php echo $textos['doc234']; ?></h2>
                    <p><b><?php echo $textos['doc235']; ?> <?php echo $config['namesite']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc236']; ?> <a href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" target="_blank"><?php echo $textos['doc237']; ?></a> <?php echo $textos['doc238']; ?></li>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong>:  <?php echo $textos['doc239']; ?> <?php echo $config['namesite']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                      <h2 id="rest-api"><?php echo $textos['doc240']; ?></h2>
                    <p><b><?php echo $textos['doc241']; ?></b></p>
                    <li class="pb-1"><strong><?php echo $textos['doc242']; ?></strong> <?php echo $textos['doc243']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc244']; ?></strong> <?php echo $textos['doc245']; ?></li>
                    <li class="pb-1"><strong><?php echo $textos['doc246']; ?></strong> <?php echo $textos['doc247']; ?></li>
                    
                    <li class="pb-1"><?php echo $textos['doc248']; ?> <a href="<?php echo $config['domain_app']; ?>messages-api" target="_blank"><?php echo $textos['doc249']; ?></a> <?php echo $textos['doc250']; ?></li>
                    <p><img src="assets/img/52.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <h2 id="rest-api"><?php echo $textos['doc251']; ?></h2>
                    <p><b>PHP </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;?php
                    $number = '<?php echo $config['whatsapp_number']; ?>';
                    $body = '<?php echo $textos['doc252']; ?>';
                    
                    $url = '<?php echo $config['domain_api']; ?>api/messages/send'; // <?php echo $textos['doc253']; ?>
                    $token = 'Bearer 123456789'; // <?php echo $textos['doc254']; ?>
                    
                    // <?php echo $textos['doc255']; ?>
                    $data = [
                        'number' =&gt; $number,
                        'body' =&gt; $body
                    ];
                    
                    // <?php echo $textos['doc256']; ?>
                    $postData = json_encode($data);
                    
                    // <?php echo $textos['doc257']; ?>
                    $cURL = curl_init($url);
                    
                    // <?php echo $textos['doc258']; ?>
                    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($cURL, CURLOPT_HTTPHEADER, [
                        'Authorization: ' . $token,
                        'Content-Type: application/json'
                    ]);
                    curl_setopt($cURL, CURLOPT_POST, true);
                    curl_setopt($cURL, CURLOPT_POSTFIELDS, $postData);
                    
                    // <?php echo $textos['doc259']; ?>
                    $response = curl_exec($cURL);
                    
                    // <?php echo $textos['doc260']; ?>
                    if(curl_errno($cURL)){
                        echo 'Error: ' . curl_error($cURL);
                    }
                    
                    // <?php echo $textos['doc261']; ?>
                    curl_close($cURL);
                    
                    // <?php echo $textos['doc262']; ?>
                    echo $response;
                    ?&gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>json </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    {
                      "number": "<?php echo $config['whatsapp_number']; ?>",
                      "body": "<?php echo $textos['doc263']; ?>",
                      "token": "Bearer 123456789"
                    }
                    &gt;
                      </pre>
                    </div>
                    <hr class="divider divider-fade">
                    <p><b>React (Javascript): </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    import axios from 'axios';
                    
                    const sendMessage = async () => {
                      const number = '<?php echo $config['whatsapp_number']; ?>';
                      const body = '<?php echo $textos['doc264']; ?>';
                      const token = 'Bearer 123456789';
                    
                      try {
                        const response = await axios.post(
                          '<?php echo $config['domain_api']; ?>api/messages/send',
                          { number, body, token },
                          { headers: { 'Content-Type': 'application/json' } }
                        );
                        console.log(response.data);
                      } catch (error) {
                        console.error('Error:', error);
                      }
                    };
                    
                    sendMessage();
                    &gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>Python: </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    import requests
                    
                    url = '<?php echo $config['domain_api']; ?>api/messages/send'
                    token = 'Bearer 123456789'
                    number = '<?php echo $config['whatsapp_number']; ?>'
                    body = '<?php echo $textos['doc265']; ?>'
                    
                    data = {
                        'number': number,
                        'body': body
                    }
                    
                    headers = {
                        'Authorization': token,
                        'Content-Type': 'application/json'
                    }
                    
                    response = requests.post(url, json=data, headers=headers)
                    print(response.json())
                    &gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>Ruby: </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    require 'uri'
                    require 'net/http'
                    require 'openssl'
                    require 'json'
                    
                    url = URI("<?php echo $config['domain_api']; ?>api/messages/send")
                    
                    http = Net::HTTP.new(url.host, url.port)
                    http.use_ssl = true
                    http.verify_mode = OpenSSL::SSL::VERIFY_NONE
                    
                    token = 'Bearer 123456789'
                    number = '<?php echo $config['whatsapp_number']; ?>'
                    body = '<?php echo $textos['doc266']; ?>'
                    
                    data = {
                      'number' => number,
                      'body' => body
                    }
                    
                    request = Net::HTTP::Post.new(url)
                    request["Authorization"] = token
                    request["Content-Type"] = "application/json"
                    request.body = JSON.dump(data)
                    
                    response = http.request(request)
                    puts response.read_body
                    &gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>Dart: </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    import 'dart:convert';
                    import 'package:http/http.dart' as http;
                    
                    void main() async {
                      final String url = '<?php echo $config['domain_api']; ?>api/messages/send';
                      final String token = 'Bearer 123456789';
                      final String number = '<?php echo $config['whatsapp_number']; ?>';
                      final String body = '<?php echo $config['namesite']; ?>';
                    
                      final Map<String, String> data = {
                        'number': number,
                        'body': body,
                      };
                    
                      final headers = {
                        'Authorization': token,
                        'Content-Type': 'application/json',
                      };
                    
                      final response = await http.post(
                        Uri.parse(url),
                        headers: headers,
                        body: jsonEncode(data),
                      );
                    
                      print(response.body);
                    }
                    &gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>Java (con OkHttp): </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    import okhttp3.*;
                    
                    public class Example {
                        public static void main(String[] args) {
                            OkHttpClient client = new OkHttpClient();
                    
                            String number = "<?php echo $config['whatsapp_number']; ?>";
                            String body = "<?php echo $textos['doc266']; ?>";
                            String token = "Bearer 123456789";
                    
                            MediaType mediaType = MediaType.parse("application/json");
                            RequestBody requestBody = RequestBody.create(mediaType, "{\"number\":\"" + number + "\",\"body\":\"" + body + "\"}");
                    
                            Request request = new Request.Builder()
                                    .url("<?php echo $config['domain_api']; ?>api/messages/send")
                                    .post(requestBody)
                                    .addHeader("Authorization", token)
                                    .addHeader("Content-Type", "application/json")
                                    .build();
                    
                            try {
                                Response response = client.newCall(request).execute();
                                System.out.println(response.body().string());
                            } catch (Exception e) {
                                e.printStackTrace();
                            }
                        }
                    }
                    &gt;
                      </pre>
                    </div>
                    <hr class="divider divider-fade">
                    <p><b>C# (con HttpClient): </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    using System;
                    using System.Net.Http;
                    using System.Text;
                    using System.Threading.Tasks;
                    
                    class Program
                    {
                        static async Task Main(string[] args)
                        {
                            string number = "<?php echo $config['whatsapp_number']; ?>";
                            string body = "<?php echo $textos['doc266']; ?>";
                            string token = "Bearer 123456789";
                    
                            var data = new { number, body };
                            var jsonData = Newtonsoft.Json.JsonConvert.SerializeObject(data);
                            var content = new StringContent(jsonData, Encoding.UTF8, "application/json");
                    
                            using var client = new HttpClient();
                            client.DefaultRequestHeaders.Add("Authorization", token);
                    
                            var response = await client.PostAsync("<?php echo $config['domain_api']; ?>api/messages/send", content);
                            var responseContent = await response.Content.ReadAsStringAsync();
                    
                            Console.WriteLine(responseContent);
                        }
                    }
                    &gt;
                      </pre>
                    </div>
                    <hr class="divider divider-fade">
                    <p><b>Go: </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    package main
                    
                    import (
                        "bytes"
                        "net/http"
                    )
                    
                    func main() {
                        number := "<?php echo $config['whatsapp_number']; ?>"
                        body := "<?php echo $textos['doc266']; ?>su mensaje"
                        token := "Bearer 123456789"
                    
                        data := []byte(`{"number":"` + number + `","body":"` + body + `"}`)
                        req, err := http.NewRequest("POST", "<?php echo $config['domain_api']; ?>api/messages/send", bytes.NewBuffer(data))
                        req.Header.Set("Authorization", token)
                        req.Header.Set("Content-Type", "application/json")
                    
                        client := &http.Client{}
                        resp, err := client.Do(req)
                        if err != nil {
                            panic(err)
                        }
                        defer resp.Body.Close()
                    
                        // Leer la respuesta
                        // body, _ := ioutil.ReadAll(resp.Body)
                        // fmt.Println(string(body))
                    }
                    &gt;
                      </pre>
                    </div>
                    
                    <hr class="divider divider-fade">
                    <p><b>Swift (para iOS con URLSession): </b></p>
                    <div class="code-container">
                      <pre class="code">
                    &lt;
                    
                    import Foundation
                    
                    func sendWhatsAppMessage() {
                        let number = "<?php echo $config['whatsapp_number']; ?>"
                        let body = "<?php echo $textos['doc266']; ?>su mensaje"
                        let token = "Bearer 123456789"
                    
                        let url = URL(string: "<?php echo $config['domain_api']; ?>api/messages/send")!
                        var request = URLRequest(url: url)
                        request.httpMethod = "POST"
                        request.addValue("application/json", forHTTPHeaderField: "Content-Type")
                        request.addValue(token, forHTTPHeaderField: "Authorization")
                    
                        let parameters: [String: Any] = [
                            "number": number,
                            "body": body
                        ]
                        request.httpBody = try? JSONSerialization.data(withJSONObject: parameters)
                    
                        let task = URLSession.shared.dataTask(with: request) { data, response, error in
                            guard let data = data, error == nil else {
                                print(error?.localizedDescription ?? "No data")
                                return
                            }
                    
                            if let httpResponse = response as? HTTPURLResponse {
                                print("Status code: \(httpResponse.statusCode)")
                            }
                    
                            if let responseString = String(data: data, encoding: .utf8) {
                                print("Response data: \(responseString)")
                            }
                        }
                        task.resume()
                    }
                    
                    sendWhatsAppMessage()
                    &gt;
                      </pre>
                    </div>
                    <hr class="divider divider-fade">
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc267']; ?>
                    </div>
                    
                    
                     <hr class="divider divider-fade">
                      <h2 id="chat"><?php echo $textos['doc268']; ?></h2>
                    <p><b><?php echo $textos['doc269']; ?></b></p>
                    <li class="pb-1"><?php echo $textos['doc270']; ?> <a href="<?php echo $config['domain_app']; ?>tickets" target="_blank"><?php echo $textos['doc271']; ?></a> <?php echo $textos['doc272']; ?></li>
                    <p><img src="assets/img/53.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc273']; ?> </strong><?php echo $textos['doc274']; ?></li>
                    <p><img src="assets/img/53.1.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc275']; ?> </strong><?php echo $textos['doc276']; ?></li>
                    <p><img src="assets/img/53.2.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc277']; ?> </strong><?php echo $textos['doc278']; ?></li>
                    <p><img src="assets/img/53.3.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc279']; ?> </strong><?php echo $textos['doc280']; ?> </li>
                    <p><img src="assets/img/53.4.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc281']; ?> </strong><?php echo $textos['doc282']; ?></li>
                    <p><img src="assets/img/53.3.2.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc283']; ?> </strong><?php echo $textos['doc284']; ?><a href="#respuestas-rapidas"><?php echo $textos['doc285']; ?></a>.</li>
                    <p><img src="assets/img/53.5.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc286']; ?></strong><?php echo $textos['doc287']; ?></li>
                    <p><img src="assets/img/53.6.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc288']; ?></strong><?php echo $textos['doc289']; ?></li>
                    <p><img src="assets/img/53.7.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc290']; ?> </strong><?php echo $textos['doc291']; ?></li>
                    <p><img src="assets/img/53.8.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong>: <?php echo $textos['doc292']; ?>
                    </div>
                     <hr class="divider divider-fade">
                      <h2 id="bot-default"><?php echo $textos['doc293']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc294']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc295']; ?></li>
                    <p><img src="assets/img/54.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <li class="pb-1"><strong><?php echo $textos['doc296']; ?> </strong><?php echo $textos['doc297']; ?></li>
                    <p><img src="assets/img/54.1.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc298']; ?> </strong><?php echo $textos['doc300']; ?></li>
                    <p><img src="assets/img/54.2.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <li class="pb-1"><strong><?php echo $textos['doc301']; ?> </strong><?php echo $textos['doc302']; ?></li>
                    <p><img src="assets/img/54.3.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <hr class="divider divider-fade">
                    <p><b><?php echo $textos['doc314']; ?> </b></p>
                    <div class="directory">
                        <div class="code-container">
                      <pre class="code">
                    

                    .
                    ├── <?php echo $textos['doc303']; ?>
                    │
                    │ ├── <?php echo $textos['doc304']; ?>
                    │ │
                    │ │ ├── <?php echo $textos['doc305']; ?>
                    │ │ │ └── <?php echo $textos['doc306']; ?>
                    │ │ │
                    │ │ └── <?php echo $textos['doc307']; ?>
                    │ │    └── <?php echo $textos['doc308']; ?>
                    │ │
                    │ └── <?php echo $textos['doc309']; ?>
                    │     │
                    │     └─── <?php echo $textos['doc310']; ?>
                    │      └── <?php echo $textos['doc311']; ?>
                    │
                    │
                    └── <?php echo $textos['doc312']; ?>
                        └── <?php echo $textos['doc313']; ?> 
                    
                      </pre>
                    </div>
                                           .
                    <div class="directory">
                        
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc315']; ?>
                    </div>
                     <hr class="divider divider-fade">
                      <h2 id="agendamientos"><?php echo $textos['doc316']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc317']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc318']; ?></li>
                    <p><img src="assets/img/65.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                   <li class="pb-1"><?php echo $textos['doc319']; ?></li>
                    <p><img src="assets/img/55.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $textos['doc320']; ?></li>
                    <p><img src="assets/img/55.1.PNG" alt="logo" style="width: 50%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc321']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="chat-interno"><?php echo $textos['doc322']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc323']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc324']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc325']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc326']; ?></li>
                    <p><img src="assets/img/56.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc327']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="contactos"><?php echo $textos['doc328']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc329']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc330']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc331']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc332']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc333']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc334']; ?>  </li>
                    <p><img src="assets/img/57.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <p><img src="assets/img/57.1.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc335']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="tutoriales"><?php echo $textos['doc336']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc337']; ?></li>
                    <p><img src="assets/img/58.PNG" alt="logo" style="width: 50%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc338']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="dashboard"><?php echo $textos['doc339']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc340']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc341']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc342']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc343']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc344']; ?> </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc345']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="anuncios"><?php echo $textos['doc346']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc347']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc348']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc349']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc350']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc351']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc352']; ?> <?php echo $config['namesite']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc353']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc354']; ?> </li>
                    <p><img src="assets/img/63.PNG" alt="logo" style="width: 75%" class="sombra"></p>
                    
                     <hr class="divider divider-fade">
                     
                     <h2 id="tareas"><?php echo $textos['doc355']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc356']; ?></li>
                    <p><img src="assets/img/59.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    
                    
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $textos['doc357']; ?>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="lista-difusion"><?php echo $textos['doc358']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc359']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc360']; ?> </li>
                    <p><img src="assets/img/66.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $textos['doc361']; ?> </li>
                    <p><img src="assets/img/64.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $textos['doc362']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc363']; ?> </li> 
                    <li class="pb-1"><?php echo $textos['doc364']; ?> </li> 
                    <li class="pb-1"><?php echo $textos['doc365']; ?></li> 
                    <li class="pb-1"><?php echo $textos['doc366']; ?></li> 
                    <li class="pb-1"><?php echo $textos['doc367']; ?></li> 
                    <li class="pb-1"><?php echo $textos['doc368']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc369']; ?> </li> 
                    <li class="pb-1"><?php echo $textos['doc370']; ?></li>
                    <p><img src="assets/img/60.3.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $textos['doc371']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc372']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc373']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc374']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc375']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc376']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc377']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc378']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc379']; ?></li>
                    <p><img src="assets/img/60.4.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                   
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> <?php echo $textos['doc380']; ?> <a href="#variables"> <?php echo $textos['doc381']; ?></a>
                    </div>
                     <hr class="divider divider-fade">
                     
                     <h2 id="contactos-difusion"><?php echo $textos['doc382']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc383']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc384']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc385']; ?>  </li>
                    <li class="pb-1"><?php echo $textos['doc386']; ?> </li>
                    <p><img src="assets/img/60.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $textos['doc387']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc388']; ?>  </li>
                    <p><img src="assets/img/60.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    
                     <hr class="divider divider-fade">
                     
                     <h2 id="ajuste-difusion"><?php echo $textos['doc389']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc390']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc391']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc392']; ?></li>
                    <li class="pb-1"><?php echo $textos['doc393']; ?> </li>
                    <li class="pb-1"><?php echo $textos['doc394']; ?> </li>
                    <p><img src="assets/img/60.2.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $textos['doc395']; ?>
                    </div>
                     <hr class="divider divider-fade">


                     
                     <!--h2 id="email-marketing"><?php echo $config['namesite']; ?>Email Marketing</h2>
                    <p><b></b></p>
                    <li class="pb-1">El modulo de envio Email Marketing es una version simple de envio que sera mejorada y escalada en el futuro pero que actualmente cumple funciones increibles.</li>
                    <li class="pb-1">Para iniciar debes ir a la seccion Marketing en tu menu lateral izquierdo y desplegar el menu Email </li>
                    <li class="pb-1">1. Enviar te permite enviar a uno o mas contactos email si quieres agregar debes separarlos por coma </li>
                    <li class="pb-1">2. Sujeto es el asunto del correo y es obligatorio </li>
                    <li class="pb-1">3. Mensaje es el contenido actualmente solo se permite textos planos si quieres adjuntar archivos debes adjuntar un lin de descarga de google drive o del almacenamiento de tu preferencia </li>
                    <p><img src="assets/img/61.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"> Enviados es la lista de todos los correos enviados con exito. </li>
                    <p><img src="assets/img/61.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1">Agendar son el envio de correos de forma programada </li>
                    <li class="pb-1">1. Enviar te permite enviar a uno o mas contactos email si quieres agregar debes separarlos por coma </li>
                    <li class="pb-1">2. Sujeto es el asunto del correo y es obligatorio </li>
                    <li class="pb-1">3. Mensaje es el contenido actualmente solo se permite textos planos si quieres adjuntar archivos debes adjuntar un lin de descarga de google drive o del almacenamiento de tu preferencia </li>
                    <li class="pb-1">4. Hora y Fecha programada del envio </li>
                    <p><img src="assets/img/61.2.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  NO olvides configurar los parametros de SMTP para que funcione correctamente debes tener una cuenta de correo gmail gratuita o de correo privado mediante SMTP mira como configurar una conexion de correo electronico mediante SMTP <a href="https://www.youtube.com/watch?v=OJxShAGAvLM&ab_channel=LiveCommerce"  target="_blank">Configurara SMPT Gmail</a>
                        </br> Despues de obtener los datos de tu servidor de correos electronicos tu usuario smtp  (correo electronico ejemplo usuario@gmail.com) y password SMTP (password de tu correo electronico) debes ir a  configuraciones y agregar los datos <a href="<?php echo $config['domain_app']; ?>settings"  target="_blank">Configurara SMPT</a>
                        </br> Si quieres apoyo como utilizar esta funcion contacta al administrador
                    </div>
                    
                    <hr class="divider divider-fade"-->
                     
                     <h2 id="open"><?php echo $config['namesite']; ?>Open Ai</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>El modulo Dashboard es una seccion exclusiva para el administrador donde podra encontrar informacion como</li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>1. Informacion y el vencimiento de la membresia </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>2. Una grafica de las conversaciones del dia segmentadas por horas </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>3. Filtros de metricas como mensajes pendientes, mensajes atendiendose, mensajes finalizados, nuevos contactos, tiempo de promedio de atencion, tiempo promedio de espera. </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>
                    
                    <hr class="divider divider-fade">
                     
                     <h2 id="dialogflow"><?php echo $config['namesite']; ?>DialogFlow</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>El modulo Dashboard es una seccion exclusiva para el administrador donde podra encontrar informacion como</li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>1. Informacion y el vencimiento de la membresia </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>2. Una grafica de las conversaciones del dia segmentadas por horas </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>3. Filtros de metricas como mensajes pendientes, mensajes atendiendose, mensajes finalizados, nuevos contactos, tiempo de promedio de atencion, tiempo promedio de espera. </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>
                    
                    <hr class="divider divider-fade">
                     
                     <h2 id="n8n">N8N</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>El modulo Dashboard es una seccion exclusiva para el administrador donde podra encontrar informacion como</li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>1. Informacion y el vencimiento de la membresia </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>2. Una grafica de las conversaciones del dia segmentadas por horas </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>3. Filtros de metricas como mensajes pendientes, mensajes atendiendose, mensajes finalizados, nuevos contactos, tiempo de promedio de atencion, tiempo promedio de espera. </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>
                    
                    <hr class="divider divider-fade">
                     
                     <h2 id="webhooks"><?php echo $config['namesite']; ?>WebHooks</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>El modulo Dashboard es una seccion exclusiva para el administrador donde podra encontrar informacion como</li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>1. Informacion y el vencimiento de la membresia </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>2. Una grafica de las conversaciones del dia segmentadas por horas </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>3. Filtros de metricas como mensajes pendientes, mensajes atendiendose, mensajes finalizados, nuevos contactos, tiempo de promedio de atencion, tiempo promedio de espera. </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>
                    
                    <hr class="divider divider-fade">
                     
                     <h2 id="typebot"><?php echo $config['namesite']; ?>TypeBot</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>El modulo Dashboard es una seccion exclusiva para el administrador donde podra encontrar informacion como</li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>1. Informacion y el vencimiento de la membresia </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>2. Una grafica de las conversaciones del dia segmentadas por horas </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>3. Filtros de metricas como mensajes pendientes, mensajes atendiendose, mensajes finalizados, nuevos contactos, tiempo de promedio de atencion, tiempo promedio de espera. </li>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/62.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/62.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>


                    <hr class="divider divider-fade">
                     
                     <h2 id="tiposdeflujo"><?php echo $textos['doc402']; ?></h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $textos['doc403']; ?></li>
                    <li class="pb-1"><?php echo $textos['edoc404']; ?> </li>
                    <p><img src="assets/img/flujo1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo2.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo3.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo4.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo5.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo6.PNG" alt="logo" style="width: 100%" class="sombra"></p>

                    <h2 id="tiposdeflujo"><?php echo $textos['doc406']; ?></h2>

                    <li class="pb-1"><?php echo $textos['doc407']; ?> </li>
                    <p><img src="assets/img/flujo7.PNG" alt="logo" style="width: 100%" class="sombra"></p>

                    <li class="pb-1"><?php echo $textos['doc408']; ?> </li>
                    <p><img src="assets/img/flujo8.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo9.PNG" alt="logo" style="width: 100%" class="sombra"></p>

                    <li class="pb-1"><?php echo $textos['doc407']; ?> </li>
                    <p><img src="assets/img/flujo6.PNG" alt="logo" style="width: 100%" class="sombra"></p>

                    <li class="pb-1"><?php echo $textos['doc407']; ?> </li>
                    <p><img src="assets/img/flujo6.PNG" alt="logo" style="width: 100%" class="sombra"></p>

                    <li class="pb-1"><?php echo $textos['doc407']; ?> </li>
                    <p><img src="assets/img/flujo6.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>4. Una lista de los agentes donde se muestra las metricas de su atencion o calificacion de los clientes tiempo promedio de atencion su estatus </li>
                    <p><img src="assets/img/flujo6.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><img src="assets/img/flujo6.1.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> :  <?php echo $config['namesite']; ?>para que las conversaciones reciban calificaciones debes activar esta opcion desde el modulo de configuraciones
                    </div>
                    
                    
                    
                     <hr class="divider divider-fade">
                     
                     <h2 id="condiciones"><?php echo $config['namesite']; ?>Condiciones De Uso</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>Condiciones De Uso <a href=""><?php echo $config['namesite']; ?>Tu perfil</a>  .</li>
                    
                     <hr class="divider divider-fade">
                     
                     <h2 id="politicas"><?php echo $config['namesite']; ?>Politicas de Privacidad</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>Politicas de Privacidad<a href=""><?php echo $config['namesite']; ?>Tu perfil</a>  .</li>
                
                     <hr class="divider divider-fade">
                     
                     <h2 id="cookies"><?php echo $config['namesite']; ?>Politicas de Cookies</h2>
                    <p><b></b></p>
                    <li class="pb-1"><?php echo $config['namesite']; ?>Politicas de Cookies <a href=""><?php echo $config['namesite']; ?>Tu perfil</a>  .</li>
                    
                     <hr class="divider divider-fade">
                     
                     
                     <h2 id="variables"><?php echo $config['namesite']; ?>Variables Disponibles</h2>
                     <p><img src="assets/img/51.PNG" alt="logo" style="width: 100%" class="sombra"></p>
                    <p><b><?php echo $config['namesite']; ?>Las variables te permiten insertar pequeños fracmentos de codigo con un clic dentro de textos para el envio de mensajes</b></p>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Primer Nombre</code> <?php echo $config['namesite']; ?>Inserta el primer nombre guardado del contacto o el primer nombre que el contacto tenga en su perfil.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Nombre</code> <?php echo $config['namesite']; ?>Inserta el nombre completo guardado del contacto o el primer nombre que el contacto tenga en su perfil.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Agente</code> I<?php echo $config['namesite']; ?>nserta el nombre del agente u operador que esta enviando el mensaje.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Saludo</code> <?php echo $config['namesite']; ?>Inserta un saludos automaticamente dependiendo del horario local puede ser Buen dia, buenas tarde, buenas noches.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Protocolo</code> <?php echo $config['namesite']; ?>Inserta Esta funcion es util para automatizar ya que envia una sertie de numeros que hacen alucion a fecha, hora, chat id dando como resultado un numero de 12 digitos o mas que sera diferente en cada mensaje.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Fecha</code> <?php echo $config['namesite']; ?>Inserta la fecha actual en el mensaej.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Hora</code> <?php echo $config['namesite']; ?>Inserta la hora actual.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Nº de Conversacion</code> Inserta el Id del chat room de cada conversacion.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Departamentos</code> <?php echo $config['namesite']; ?>Inserta el nombre del departamento al que el chat esta asignado.</li>
                    <li class="pb-1"><code class="badge badge-info"><?php echo $config['namesite']; ?>Conexión</code> <?php echo $config['namesite']; ?>Inserta el nombre de la conexion que el administrador asigno a la cuenta de WhatsApp.</li>
                    <div class="alert alert-danger">
                        <strong><?php echo $textos['doc70']; ?></strong> : <?php echo $config['namesite']; ?>Sin no tienes guardado al contacto y el contacto no configuro su nombre en su aplicacion de whatsapp el sistema tomara el contenido del nick del usaurio esto podria ser emojis, o cualquier informacion que el cliente tenga en el nick de su cuenta de whastapp
                    </div>
                     <hr class="divider divider-fade">
                    
                </div>
            </div>
        </div>
    </div>
     <a href="https://api.whatsapp.com/send/?phone=<?php echo $config['whatsapp_number']; ?>&text&type=phone_number&app_absent=0" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
    <style>
        .whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:100;
}

.whatsapp-icon {
  margin-top:13px;
}
    </style>

    <script src="assets/js/site.core.js"></script>
    <script src="assets/js/site.js"></script>
</body>
</html>