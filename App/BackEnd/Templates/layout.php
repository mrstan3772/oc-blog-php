<!DOCTYPE html>
<html lang="fr">

<head>
	<title><?= $title ?></title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Tableau de bord spécifiquement conçue pour administrer l'ensemble du contenu de BLOG STANLEY LOUIS JEAN.">
	<meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
	<meta name="author" content="DashboardKit ">


	<!-- Favicon icon -->
	<link rel="icon" href="/<?= $config->get('assets_path') ?>/images/icons/svg/svg1.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="/<?= $config->get('assets_path') ?>/fonts/admin/feather.css">
	<link rel="stylesheet" href="/<?= $config->get('assets_path') ?>/fonts/admin/fontawesome.css">
	<link rel="stylesheet" href="/<?= $config->get('assets_path') ?>/fonts/admin/material.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="/<?= $config->get('assets_path') ?>/css/main.02EJNXGEKMD3NWBHKYF0TS7KJQ.min.css" id="main-style-link">
	<link rel="stylesheet" href="/<?= $config->get('assets_path') ?>/css/my.min.css" id="my-style-link">
</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="/<?= $config->get('assets_path') ?>/images/admin/Logo-site-blanc-100.png" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="/admin" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="/<?= $config->get('assets_path') ?>/images/admin/Logo-site-blanc-100.png" alt="logo" class="logo logo-lg">
					<img src="/<?= $config->get('assets_path') ?>/images/admin/Logo-site-blanc-100.png" alt="logo" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Navigation</label>
					</li>
					<li class="pc-item">
						<a href="/admin" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Tableau de bord</span></a>
					</li>
					<li class="pc-item">
						<a href="/admin/news-insert" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Ajouter un article de blog</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Élements</label>
						<span>Composants Interface Utilisateur</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Basic</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="bc_alert.html">Alerte</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_button.html">Bouton</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_badges.html">Badges</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_breadcrumb-pagination.html">Fil d'Ariane & Pagination</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_card.html">Cartes</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_collapse.html">Réduire</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_carousel.html">Carrousel</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_progress.html">Progression</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_modal.html">Modal</a></li>

							<li class="pc-item"><a class="pc-link" href="bc_typography.html">Typographie</a></li>
						</ul>
					</li>
					<li class="pc-item">
						<a href="icon-feather.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">history_edu</i></span><span class="pc-mtext">Icônes</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Formulaires</label>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Éléments des formulaires</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="form_elements.html">Formulaire de base</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_input_group.html">Groupes d'entrée</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_checkbox.html">Case à cocher</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_radio.html">Radio</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Tableau</label>
					</li>
					<li class="pc-item">
						<a href="tbl_bootstrap.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">table_rows</i></span><span class="pc-mtext">Bootstrap table</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Graphique et carte</label>
						<span>Les tonalités de la charte de la lecture</span>
					</li>
					<li class="pc-item">
						<a href="chart-apex.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">bubble_chart</i></span><span class="pc-mtext">Graphique</span></a>
					</li>
					<li class="pc-item">
						<a href="map-google.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">my_location</i></span><span class="pc-mtext">Cartes</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Pages</label>
						<span>Pages de redémarrage</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">https</i></span><span class="pc-mtext">Authentification</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="auth-signup.html" target="_blank">S'inscrire</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signin.html" target="_blank">Se connecter</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Autre</label>
						<span>Autres choses supplémentaires</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">list_alt</i></span><span class="pc-mtext">Niveaux du menu</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 2.1</a></li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Niveau du menu 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 3.2</a></li>
									<li class="pc-item pc-hasmenu">
										<a href="#!" class="pc-link">Niveau du menu 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
										<ul class="pc-submenu">
											<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 4.1</a></li>
											<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 4.2</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Niveau du menu 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 3.2</a></li>
									<li class="pc-item pc-hasmenu">
										<a href="#!" class="pc-link">Niveau du menu 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
										<ul class="pc-submenu">
											<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 4.1</a></li>
											<li class="pc-item"><a class="pc-link" href="#!">Niveau du menu 4.2</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="pc-item"><a href="sample-page.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">storefront</i></span><span class="pc-mtext">Exemple de page</span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link active dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							Niveau
						</a>
						<div class="dropdown-menu pc-h-dropdown">
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>Mon compte</span>
							</a>
							<div class="pc-level-menu">
								<a href="#!" class="dropdown-item">
									<i class="material-icons-two-tone">list_alt</i>
									<span class="float-right"><i data-feather="chevron-right" class="mr-0"></i></span>
									<span>Niveaul2.1</span>
								</a>
								<div class="dropdown-menu pc-h-dropdown">
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Mon compte</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Paramètres</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Support</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Écran de verrouillage</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Déconnexion</span>
									</a>
								</div>
							</div>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">settings</i>
								<span>Paramètres</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">support</i>
								<span>Support</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">https</i>
								<span>Écran de verrouillage</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Déconnexion</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="material-icons-two-tone">search</i>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Cherchez ici. . .">
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="/<?= $config->get('assets_path') ?>/images/member/<?= $user_session['memberProfilePicturePath'] ?>" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name"><?= $user_session['memberPseudonym'] ?></span>
								<span class="user-desc">Administrateur</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<!-- <div class=" dropdown-header">
								<h5 class="text-overflow m-0"><span class="badge bg-light-primary"><a href="https://gumroad.com/dashboardkit" target="_blank">Upgrade to Pro</a></span></h5>
							</div> -->

							<a href="auth-signin.html" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Déconnexion</span>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<main class="pc-container">
		<?= $content ?>
	</main>
	<!-- [ Main Content ] end -->

	<!-- Warning Section start -->
	<!-- Older IE warning message -->
	<!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
	<!-- Warning Section Ends -->
	<!-- Required Js -->
	<script src="/<?= $config->get('assets_path') ?>/js/lib/vendor-all.min.js"></script>
	<script src="/<?= $config->get('assets_path') ?>/js/plugins/bootstrap.min.js"></script>
	<script src="/<?= $config->get('assets_path') ?>/js/plugins/feather.min.js"></script>
	<script src="/<?= $config->get('assets_path') ?>/js/pcoded.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
	<!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
	<!-- <script src="assets/js/uikit.min.js"></script> -->

	<!-- Apex Chart -->
	<script src="/<?= $config->get('assets_path') ?>/js/plugins/apexcharts.min.js"></script>

	<!-- custom-chart js -->
	<script src="/<?= $config->get('assets_path') ?>/js/pages/dashboard-sale.js"></script>
</body>

</html>