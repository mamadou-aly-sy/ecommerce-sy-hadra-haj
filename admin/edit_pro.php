<?php

require_once '../database/db.php';
require_once 'includes/functions.php';

$id = $_GET['id'];

$requette1 ="SELECT * FROM products INNER JOIN category WHERE cat_id = pro_cat AND pro_id = $id";
$requette2 ="SELECT * FROM category";
$product = $db->query($requette1)->fetch(PDO::FETCH_OBJ);
$categories = $db->query($requette2)->fetchAll(PDO::FETCH_OBJ);
// dump($product);


if(isset($_POST['valider'])){
    
    $productName = $_POST['product-name']; 
    $price = $_POST['price']; 
    $quantity = $_POST['quantity']; 
    $category = $_POST['category'];
    $state = $_POST['state'];
    if(empty($_FILES['image']['name'])) {
        $image = $product->pro_image;
    } else {
        $imageExtention =  getExtention(basename($_FILES['image']['name']));
        $newImageName = sha1($_FILES['image']['name']) . ".{$imageExtention}";
        move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/images/" . $newImageName);
        $image = $newImageName;
    }
    
    
    $requette = "UPDATE products SET pro_name = ?, pro_cat = ?, pro_price = ?, pro_quantity= ?, pro_image = ?, pro_published = ? WHERE pro_id = ?";
    $params   = [$productName, $category, $price, $quantity, $image, $state, $id];

    if($db->prepare($requette)->execute($params)){
        header('location:products.php');
        exit();
    } else {
        dump("Error");
    }
    
}
?>

<?php require 'includes/header.php';?>

    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-white bg-info">
                    <h5>Mis à jour des informations du prudiut <?= $product->pro_name ?></h5>
                </div>
                
                <div class="card-body bg-light">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        <div class="form-group mr-2">
                            <label for="product-name">Nom du produit:</label>
                            <input type="text" name="product-name" value="<?= $product->pro_name ?>" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="price">Prix :</label>
                            <input type="number" name="price" value="<?= $product->pro_price ?>" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="quantity">Quantité :</label>
                            <input type="number" name="quantity" value="<?= $product->pro_quantity ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="mr-2">Categorie:</label> 
                            <select name="category" class="form-control mr-2" id="category">
                            <option value="<?= $product->pro_cat ?>" selected ><?= $product->cat_name ?></option>
                                <?php foreach($categories as $category): ?>

                                    <?php if($category->cat_id == $product->pro_cat): ?>
                                        <?php continue ?>
                                    <?php else : ?>
                                        <option value="<?= $category->cat_id?>"><?= $category->cat_name ?></option>
                                    <?php endif ?>

                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="state" class="mr-2">Etat:</label> 
                            <select name="state" class="form-control mr-2" id="state">

                                <?php if($product->pro_published == 0): ?>
                                    <option value="0" selected >Inactif</option>
                                    <option value="1">Actif</option>
                                <?php else : ?>
                                    <option value="1" selected >Actif</option>
                                    <option value="0">Inactif</option>
                                <?php endif ?>

                            </select>
                        </div>
                        <label class="mr-2">Image:</label> 
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="image" value="<?= $product->pro_image ?>">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="valider" class="btn btn-success mt-2"><i class="fas fa-save"></i> Valider</button>
                            <a href="users.php" class="btn btn-info mt-2"> Retour </a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <?php require 'includes/footer.php';?>