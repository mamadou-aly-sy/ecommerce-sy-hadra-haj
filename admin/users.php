<?php

session_start();

require_once '../database/db.php';

$requette = "SELECT id,username,email,role,etat FROM users ";
$users = $db->query($requette);

$requette_count = "SELECT COUNT(*) countU FROM users ";
$resultat_count = $db->query($requette_count);
$tabCount = $resultat_count->fetch();
$nbu = $tabCount['countU'];

?>
<?php require 'includes/header.php' ?>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="dashboard	.php">Mon Application</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
					<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
		<a href="#">
			Bienvenue <?php echo ((isset($_SESSION['PROFILE'])) ? ($_SESSION['PROFILE']['username']) : "") ?>
		</a>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#">Parametres</a><a class="dropdown-item" href="#">Activité Log</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">Deconnexion</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="nav-link" href="dashboard.php">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Tableau de Bord
						</a>
						<div class="sb-sidenav-menu-heading">Interface</div>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Layouts
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.php">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a></nav>
						</div>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Pages
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">Authentication
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
								<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.php">Login</a><a class="nav-link" href="register.php">Register</a><a class="nav-link" href="password.php">Forgot Password</a></nav>
								</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">Error
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.php">401 Page</a><a class="nav-link" href="404.php">404 Page</a><a class="nav-link" href="500.php">500 Page</a></nav>
								</div>
							</nav>
						</div>
						<div class="sb-sidenav-menu-heading">Addons</div>
						<a class="nav-link" href="charts.php">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Charts
						</a>
						<a class="nav-link" href="tables.php">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Tables
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
					Start Bootstrap
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Mon tableau de bord</h1>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card bg-primary text-white mb-4">
								<div class="card-body">Utilisateurs ( <?= $nbu ?> )</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="users.php"> Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-warning text-white mb-4">
								<div class="card-body">Commandes 4000</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#"> Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-success text-white mb-4">
								<div class="card-body">Commandes Livrés 0</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#"> Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-danger text-white mb-4">
								<div class="card-body">Commande Non Livrés 4000</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#"> Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mb-4">
						<div class="card-header bg-info"><i class="fas fa-user mr-1"></i>Liste des utilisateurs
							<a href="add_u.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
						</div>
						<div class="card-body bg-light">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Username</th>
											<th>Email</th>
											<th>Role</th>
											<th>Etat du compte </th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($user = $users->fetch()) : ?>
											<tr>
												<td><?= $user['username'] ?></td>
												<td><?= $user['email'] ?></td>
												<td><?= $user['role'] ?></td>
												<td>
													<a href="activer_compte.php?id=<?= $user['id'] ?>&etat=<?= $user['etat'] ?>">
														<?php
														if ($user['etat'] == 1)
															echo '<button class="btn btn-success btn-block">Actif</button>';
														else
															echo '<button class="btn btn-danger btn-block">Suspendu</button>';
														?>
													</a>
												</td>
												<td>
													<a href="edit_u.php?id=<?= $user['id'] ?>" class="btn btn-info mr-2">Editer <i class="fas fa-edit"></i></a>
													<a href="delete_u.php?id=<?= $user['id'] ?>" class="btn btn-danger mr-2">Supprimer <i class="fas fa-trash"></i></a>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Mon Site - web 2020</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<?php require 'includes/footer.php' ?>