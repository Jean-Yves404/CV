<!DOCTYPE html>
<html lang="en">
<!-- ↓ Je décclare mes requêtes pour ,ensuite, pouvoir les afficher. ↓ -->
<?php /* ↓ Mes Requêtes ↓ */
    require('connexion/connexion.php');
    $bdd = $pdo -> query ("SELECT * FROM utilisateur");
    $utilisateur = $bdd -> fetch();  //←Tout ce qui concerne la table "utilisateur".

    $bdd = $pdo -> query ("SELECT * FROM titre");
    $titre = $bdd -> fetch(); //← All ce qui concerne la table "titre". 

 

    $bdd = $pdo -> query ("SELECT * FROM loisirs");
    $loisirs = $bdd -> fetch();


    $bdd = $pdo -> query ("SELECT * FROM experiences ORDER BY id_experiences DESC");
    $experiences = $bdd -> fetchAll(); /*fetchAll() permet de récuperer tout la table*/
    

    $bdd = $pdo -> query ("SELECT * FROM competences");
    $competences = $bdd -> fetchAll();
    

?>  <!-- ↑ Mes Requêtes ↑ -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <!-- Theme CSS -->
    <link href="front/css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="front/css/style_front.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?= $utilisateur['prenom']. ' '. $utilisateur['nom'];  ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">A propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Formation</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Professionel</a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                       <a href="#"> <i class="fa fa-user" aria-hidden="true"></i></a> 
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/header-bg.jpg">
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"><?php echo $utilisateur['prenom']. ' '. $utilisateur['nom'];  ?></div>
                    <div class="intro-heading"><?php echo $titre['titre_cv'];  ?></div>
                    <a href="#services" class="page-scroll btn btn-xl">   +   </a>
                </div>
            </div>  <br><br><br><br><br><br><br><br><br><br><br><br>
        </header>
    </div>

    <!-- Services Section --> <!-- Section A PROPOS -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">A propos </h2>
                    <h3 class="section-subheading text-muted">Passionné du Web et des nouvelles technologies depuis des années, je me présente aujourd’hui à vous en tant que développeur web junior.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-desktop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Développement web</h4>
                    <p class="text-muted">Réalisation technique et le développement informatique d'un site web.<br>Je programme les fonctionnalités qui correspondent aux besoins du client pour son site web.</p>
                </div>
                <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Responsive Design</h4>
                    <p class="text-muted">Elaboration de sites vous offrant une expérience de lecture et de navigation optimales quelle que soit sa gamme d'appareil <br>(téléphones mobiles, tablettes, moniteurs d'ordinateur de bureau).</p>
                </div>
                <!-- <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div> -->
            </div>
        </div>
    </section>

    <!-- ↓ FORMATION Grid Section ↓ -->
    
    <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/header-bg.jpg"> </div> <!-- ←DIV pour les logos (images) --> 
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formation <i class="fa fa-graduation-cap" aria-hidden="true"></i></h2> 
                    <br>
<!--                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>  ↑ Sous titre -->
                </div>
            </div>
                <!-- 
                ==== ↓ ETAPE 1 ====
                On fait appel à notre vairable de la BDD qui a été créée au début pour la Connexion,
                Pour faire une requête sur l'une de nos table qui est en l'occurence ici, formation, pour pouvoir récupérer Les information dont j'ai besoin.
                
                === ETAPE 2 ====

                Pour ce faire, nous avons utilisé la méthode query. Pourquoi ? 
                Tous simplement parce qu'il n'y a aucun paramètre à sécuriser
                    exemple :
                    Imaginons que nous avons un paramatre comme ceci: $query = $bdd -> prepare(SELECT * FROM formation WHERE => titre_f = lepoles <= (ceci est un paramètre) )
                    Ici par exemple, ce qui définit le paramètre c'est le WHERE titre_f .
                    Dans ce cas, pour pourvoir protéger cette donnée nous utilisons une requête de méthode prépare
                    Dans le cas contraire s'il n'y a pas de paramètre nous utilison la méthode query $bdd = $pdo -> query("SELECT * FROM formation <- fin de la requête    => (Aucun paramètre)  <="); .

                Ce que nous avons utilisé en bas car (comme on peut le constater) il n'y'a aucun paramètre a protéger.
                Donc la méthode la plus justifiable est la query dans notre cas. 
                    
                -Merci Myhed.
                -->
                <?php $bdd = $pdo -> query ("SELECT * FROM formation ORDER BY id_formation ASC "); ?><!-- ←La requête -->
                    
                    <div class="row">
                    
                    <?php
                    while($formation = $bdd  -> fetch( PDO :: FETCH_ASSOC)): /* ← La variable */

                        /* ↑ Ici nous demander d'affecter une variable que nous créons nous-même afin d'y stocker tous nos résultat.

                        Remarque :  La variable créée aurait pu être n'importe quoi, la variable formation a été créée pour une question de logique du code
                        On aurait pu mettre une variable jeanYvaes ou autre.
                        Mais il faut toujours rester logique avec son code afin de pouvoir y débugger les chose plus facilement.

                        Le deuxième paramètre qui est  $bdd->fetch(PDO::FETCH_ASSOC)  sert à faire lire la requête SQL que nous avons faite au dessus et de l'éxécuter en même temps pour pouvoir récupérer nos données. 

                        Le PDO::FETCH_ASSOC sert à dire à PHP que c'est un tableau associatif que nous récupérons.
                        Exemple:
                                nom => "jeanYves"
                        Tant dis que le tableau non associatif met à la place d'un chaine de caractère un entier. 
                        Exemple:
                                0 => "JeanYves"
                        
                        Or, avons parlé tout à l'heure de logique de code. Il est donc plus préférable de la mettre en tableau associatif.
                        */
                    ?>

                <div class="col-md-4 col-sm-6 portfolio-item">
                <!-- 
                Ici nous avons demander à php

                Que Si notre formation qui est églae notre tableau de donnée 
                est égale à ligne dans notre base données qui contient l'id 14
                
                Alors on lui met le lien avec lepoles 

                 -->
                <?php if($formation['id_formation'] == 14):?>

                    <a href="http://lepoles.org/" target="_blank" class="portfolio-link" data-toggle="modal">
                <?php else: ?>
                <!-- Sinon on met un lien qui ne pointe sur rien -->
                    <a href="#" class="portfolio-link" data-toggle="modal">
                <?php endif; ?>

                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <!-- <i class="fa fa-plus fa-3x"></i> -->
                            </div>
                        </div>
                        <img src="front/img/portfolio/<?= $formation['image_f']; ?>" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4> <?php echo $formation['titre_f']; ?> </h4>
                        <div class="text-muted">
                        <h5> <?= $formation['sous_titre_f']; ?></h5> 
                        <p> <?= $formation['description_f']; ?> </p>
                        <p> <?= $formation['date_f']; ?> </p>

                        </div>
                    </div>
                </div>

                <?php endwhile;?>
 </div>

<!--                 <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="front/img/portfolio/golden.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Golden</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="front/img/portfolio/escape.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Escape</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="front/img/portfolio/dreams.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Dreams</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- About Section -->     <!-- ↓ Partie  PARCOURS PROFESSIONEL ↓ -->
     <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/header-bg.jpg">
</div>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Parcours professionel</h2>
                    <h3 class="section-subheading text-muted">Mes éxpériences professinelles passées</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php
                    $i=0;
                    while($i<count($experiences)){
                            ?><li <?php if (($i % 2) == 0)
                                { echo 'class="timeline-inverted"';}?>>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="front/img/about/<?= $experiences[$i]['image_exp'] ?>" alt="<?= $experiences[$i]['image_exp'] ?>" style="width: 100% ; height: 100%;">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?= $experiences[$i]['dates']; ?></h4>
                                            <h4 class="subheading"><?= $experiences[$i]['titre_exp'].' <br> '.$experiences[$i]['sous_titre_exp'];?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class=""><?= $experiences[$i]['description'];?></p>
                                    </div>
                                </div>
                            </li><?php
                            $i++;
                    }                        
                     ?>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Prenez
                                    <br>mon
                                    <br>âme !</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
     <!-- <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/header-bg.jpg"></div>
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="front/img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Lead Designer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="front/img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="front/img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Diana Pertersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Clients Aside ↓ -->
    <!-- <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="front/img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="front/img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="front/img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="front/img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside> -->

    <!-- ↓ Contact Section ↓ -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Me contacter <i class="fa fa-envelope" aria-hidden="true"></i>
</h2>
                    <h3 class="section-subheading text-muted">Laissez-moi un message :</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Votre adresse Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Numéro de téléphone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Votre message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; JYNA 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://fr.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li>
                        <a href="#"> <i class="fa fa-user" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/roundicons-free.png" alt="">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <p>
                                    <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                <ul class="list-inline">
                                    <li>Date: July 2014</li>
                                    <li>Client: Round Icons</li>
                                    <li>Category: Graphic Design</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Project Heading</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/startup-framework-preview.png" alt="">
                                <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/treehouse-preview.png" alt="">
                                <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/golden-preview.png" alt="">
                                <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/escape-preview.png" alt="">
                                <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="front/img/portfolio/dreams-preview.png" alt="">
                                <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="front/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="front/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="front/js/jqBootstrapValidation.js"></script>
    <script src="front/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="front/js/agency.min.js"></script>

    <!-- →Ici, j'introduis le Parallax (JS) ↓ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="front/js/parallax.js-1.4.2/parallax.js"></script>
    <script src="front/js/main.js"></script>

</body>

</html>
