<?php

session_start();

require_once '../database/db.php';
require_once "includes/functions.php"; 

$requette = "SELECT * FROM products INNER JOIN category WHERE cat_id = pro_cat";
$products = $db->query($requette)->fetchAll(PDO::FETCH_OBJ);
// dump($products);
// $requette_count = "SELECT COUNT(*) countU FROM products ";
// $resultat_count = $db->query($requette_count );
// $tabCount = $resultat_count->fetch();
// $nbu = $tabCount['countU'];

?>
<?php require 'includes/header.php'?>

<body class="sb-nav-fixed">
	<?php include_once "includes/navbar.php" ?>
	<div id="layoutSidenav">
		<?php include_once "includes/sidebar.php"?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Mon tableau de bord</h1>
					<?php include_once "includes/card_list.php" ?>
                    <div class="card mb-4">
						<div class="card-header bg-info"><i class="fas fa-product mr-1"></i>Liste des Produits 
							<a href="add_pro.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
						</div>
						<div class="card-body bg-light">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Image</th>
											<th>Nom</th>
											<th>Categorie</th>
											<th>Prix</th>
                                            <th>quantite</th>
                                            <th>etat</th>
											<th>Actions</th>
                                        </tr>
									</thead>
									<tbody>
                                    <?php foreach($products as $product) :?>
										<tr>
											<td><img src="uploads/images/<?= $product->pro_image ?>" alt="" height="50" width="50"></td>
											<td><?= $product->pro_name ?></td>
											<td><?= $product->cat_name ?></td>
                                            <td><?= $product->pro_price ?></td>
                                            <td><?= $product->pro_quantity ?></td>
											
											<?php if($product->pro_published == 0) :?>
												<td>Inactif</td>
											<?php else: ?>
												<td>Actif</td>
											<?php endif?>
												
                                            <td>
                                                <a href="edit_pro.php?id=<?= $product->pro_id ?>" class="btn btn-info mr-2">Editer <i class="fas fa-edit"></i></a>
                                                <a href="delete_pro.php?pro_=<?= $product->pro_id ?>" class="btn btn-danger mr-2">Supprimer <i class="fas fa-trash"></i></a>
											</td>
                                        </tr>
                                    <?php endforeach ;?>
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
<?php require 'includes/footer.php'?>