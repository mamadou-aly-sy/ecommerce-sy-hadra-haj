<?php

require_once '../database/db.php';
require_once 'includes/functions.php';

$requette ="SELECT * FROM category";
$categories = $db->query($requette)->fetchAll(PDO::FETCH_OBJ);
// dump($product);

if(isset($_POST['valider'])){
    
    $productName = $_POST['product-name']; 
    $price = $_POST['price']; 
    $quantity = $_POST['quantity']; 
    $category = $_POST['category'];
    $state = $_POST['state'];
    if(empty($_FILES['image']['name'])) {
        $image = "default.jpg";
    } else {
        $imageExtention =  getExtention(basename($_FILES['image']['name']));
        $newImageName = sha1($_FILES['image']['name']) . ".{$imageExtention}";
        move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/images/" . $newImageName);
        $image = $newImageName;
    }
    
    
    $requette = "INSERT INTO products(pro_name, pro_cat, pro_price, pro_quantity , pro_image, pro_published) VALUES(?, ?, ?, ?, ?, ?)";
    $params   = [$productName, $category, $price, $quantity, $image, $state];

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
                    <h5>Insertion de nouveau prudiut </h5>
                </div>
                
                <div class="card-body bg-light">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        <div class="form-group mr-2">
                            <label for="product-name">Nom du produit:</label>
                            <input type="text" name="product-name" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="price">Prix :</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group mr-2">
                            <label for="quantity">Quantité :</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="mr-2">Categorie:</label> 
                            <select name="category" class="form-control mr-2" id="category">
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category->cat_id?>"><?= $category->cat_name ?></option>
                                 <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="state" class="mr-2">Etat:</label> 
                            <select name="state" class="form-control mr-2" id="state">
                                    <option value="0" >Inactif</option>
                                    <option value="1">Actif</option>
                            </select>
                        </div>
                        <label class="mr-2">Image:</label> 
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="image">
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