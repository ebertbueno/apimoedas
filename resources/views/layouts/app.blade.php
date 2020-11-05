<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>{!! env('APP_NAME', '') !!} - @lang('general.title')</title>
	<link href="/inspinia_admin-v2.9.3/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="/portal/css/sb-admin-2.css" rel="stylesheet">
	<link href="/inspinia_admin-v2.9.3/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script src="/portal/vendor/jquery/jquery.min.js"></script>

	<style>
		@media only screen and (max-width: 959px) {
			table {
				font-size: 12px;
			}
		}

		@media only screen and (min-width: 768px) and (max-width: 959px) {
			table {
				font-size: 12px;
			}
		}

		@media only screen and (max-width: 767px) {
			table {
				font-size: 14px;
			}
		}

		@media only screen and (min-width: 480px) and (max-width: 767px) {
			table {
				font-size: 12px;
			}
		}

		@media only screen and (max-width: 479px) {
			table {
				font-size: 10px;
			}
		}
	</style>
	<link rel='manifest' href='/pwa/manifest.json'>
</head>
<body id="page-top">
	<div id="wrapper">
		@includeIf('portal.layouts.nav')
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
								imagem
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Meus dados</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Log de atividades</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/sair"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Sair</a>
							</div>
						</li>
					</ul>
				</nav>
				<div class="container-fluid">
					{!! breadcrumb() !!}
					@yield('content')
				</div>
			</div>
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						{!! copyright('interna'); !!}
					</div>
				</div>
			</footer>
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="msgModalLabel">Alerta!</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body"><div id="msgModalContent"></div></div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>

	<script src="/portal/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/portal/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="/portal/js/sb-admin-2.min.js"></script>
	<script>
		$(document).ready(function(){ $('[data-toggle="tooltip"]').tooltip(); });
	</script>

	<script>
		// This is the "Offline page" service worker

		// Add this below content to your HTML page inside a <script type="module"> tag, or add the js file to your page at the very top to register service worker
		// If you get an error about not being able to import, double check that you have type="module" on your <script /> tag

		/*
		This code uses the pwa-update web component https://github.com/pwa-builder/pwa-update to register your service worker,
		tell the user when there is an update available and let the user know when your PWA is ready to use offline.
		*/

		import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

		const el = document.createElement('pwa-update');
		document.body.appendChild(el);
	</script>
</body>
</html>