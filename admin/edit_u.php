<?php

require_once '../database/db.php';

$id = $_GET['id'];

$requette ="SELECT * FROM users WHERE id = $id";
$resultat = $db->query($requette);
$user = $resultat->fetch();
$role = strtoupper($user['role']);

if(!empty($_POST)){
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['role'])){
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = strtoupper($_POST['role']);
        
        $requette = "UPDATE users SET username = ?,email = ?,role = ? WHERE id = ?";
        $params   = [$username,$email,$role,$id];
        $resultat = $db->prepare($requette);
        if($resultat->execute($params)){
            header('location:users.php');
            exit();
        }
    }
}
?>

<?php require 'includes/header.php';?>

    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-white bg-info">
                    <h5>Mis à jour des informations de l'utilisateur </h5>
                </div>
                <div class="card-body bg-light">
                    <form method="POST" class="form" enctype="multipart/form-data">
                        <div class="form-group mr-2">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                        </div>
                        <div class="form-group mr-2">
                            <label for="email">Email :</label>
                            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
                        </div>
                        <label for="role" class="mr-2">Role:</label> 
                        <select name="role" class="form-control mr-2" id="role">
                            <option value="admin" <?php if($role === "ADMIN") echo "selected" ?>>ADMIN</option>
                            <option value="vendeur"<?php if($role === "VENDEUR") echo "selected" ?>>VENDEUR</option>
                        </select>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-2"><i class="fas fa-save"></i> Valider</button>
                            <a href="users.php" class="btn btn-info mt-2"> Retour </a>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="#">Changer le mot de passe </a>
                </div>
            </div>
    </div>
    <?php require 'includes/footer.php';?>