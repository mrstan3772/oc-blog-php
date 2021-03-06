<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ title|raw }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/{{ attribute(config, 'get', ['assets_path']) }}/images/icons/svg/svg1.svg" rel="icon">
    <link href="/{{ attribute(config, 'get', ['assets_path']) }}/any/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="/{{ attribute(config, 'get', ['assets_path']) }}/css/lib/all.01ERHS32GTDHB1RBSJ9BP95MC9.min.css" />

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="/{{ attribute(config, 'get', ['assets_path']) }}/css/main.01EJNXGEKMD3NWBHKYF0TS7KJQ.min.css" />
    <link rel="stylesheet" href="/{{ attribute(config, 'get', ['assets_path']) }}/css/my.min.css" />

    <!-- =======================================================
  * Template Name: DevFolio - v4.6.0
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/">{{ title_page }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo"><img src="/{{ attribute(config, 'get', ['assets_path']) }}/images/any/Logo-site-blanc.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="/#about">À propos</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="/#work">Projets</a></li>
                    <li><a class="nav-link scrollto " href="/#blog">Blog</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                    {% if user_session is not defined %}
                    <li class="dropdown"><a href="#"><span>Mon Compte</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/connection">Me connecter</a></li>
                            <li><a href="/registration">S'inscrire</a></li>
                        </ul>
                    </li>
                    {% else %}
                    <li class="dropdown"><a href="#"><span>{{ user_session.memberPseudonym | raw }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><img src="/dist/images/member/{{ user_session.memberProfilePicturePath | raw }}" alt="user profile" class="user-image"></li>
                            <li><a href="/user/{{ user_session.id | raw }}">Espace personnel</a></li>
                            {% if user_session.memberAdmin %}
                            <li><a href="/admin">Espace administration</a></li>
                            {% endif %}
                            <li><a href="/disconnection">Se déconnecter</a></li>
                        </ul>
                    </li>
                    {% endif %}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <div id="hero" class="hero route bg-image" style="background-image: url(/{{ attribute(config, 'get', ['assets_path']) }}/images/any/hero-bg.jpg)">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="hero-title mb-4">Je suis Stanley LOUIS JEAN</h1>
                    <p class="hero-subtitle"><span class="typed" data-typed-items="Designeur, Developeur, Freelanceur"></span></p>
                    <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="/#about" role="button">En Apprendre +</a></p>
                </div>
            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">
        <noscript>
            Désolé, le navigateur que vous utilisez actuellement ne supporte malheureusement pas JavaScript.
            Pour résoudre ce problème activer la prise en charge de JavaScript dans vos paramètres ou si nécessaire optez pour un autre navigateur.
        </noscript>

        <?php print_r($content); ?>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <div class="d-flex flex-wrap justify-content-center footer-nav-link">
                            <p><a href="/" title="Accueil">ACCUEIL</a> | </p>
                            <p><a href="/#about" title="À Propos">À PROPOS</a> | </p>
                            <p><a href="/#services" title="Services">SERVICES</a> | </p>
                            <p><a href="/#work" title="Projets">PROJETS</a> | </p>
                            <p><a href="/#blog" title=">Blog">BLOG</a> | </p>
                            <p><a href="/#contact" title="Contact">CONTACT</a> </p>
                        </div>
                        <div class="footer-nav-link">
                            {% if user_session is defined %}
                            <p><a href="/user/{{ user_session.id }}" title="Mon compte">MON COMPTE</a></p>
                            {% endif %}
                            {% if user_session.memberAdmin %}
                            <p><a href="/admin" title="Administration">ADMINISTRATION</a></p>
                            {% endif %}
                        </div>
                        <p class="copyright">&copy; Copyright © {{ copyright_date is defined ?  copyright_date : copyright_date|date('Y') }} <strong>STANLEY LOUIS JEAN</strong> Tous droits réservés.</p>
                        <div class="credits">
                            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            -->
                            Conçu par <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/{{ attribute(config, 'get', ['assets_path']) }}/js/lib/all.01ERHS32GTDHB1RBSJ9BP95MC9.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/{{ attribute(config, 'get', ['assets_path']) }}/js/app.01ERHPZDG1M4VB2J6GR62KN832.min.js"></script>
</body>

</html>