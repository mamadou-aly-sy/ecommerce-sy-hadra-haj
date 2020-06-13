<?php

if(!empty($_POST)){

    require_once '../database/db.php';

    $erreurs = [];

    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username'])){
        $erreurs['username'] = 'Votre pseudo n\'est pas valide (alphanumérique) !';
    }else{
        $sql_select = $db->prepare("SELECT id FROM users WHERE username = ?");
        $sql_select->execute([$_POST['username']]);
        $user = $sql_select->fetch();
        if($user){
            $erreurs['username'] = 'Ce pseudo est déja pris !';
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
       $erreurs['email'] = 'Votre email n\'est pas valide !';
    }else{
        $sql_select = $db->prepare("SELECT id FROM users WHERE email = ?");
        $sql_select->execute([$_POST['email']]);
        $user = $sql_select->fetch();
        if($user){
            $erreurs['email'] = 'Cet email est déja pris pour un autre compte !';
        }
    }

    if(empty($_POST['pass']) || $_POST['pass'] != $_POST['pass_confirm']){
        $erreurs['pass'] = 'Les deux mots de passe ne correspondent pas !';
    }
    if(empty($_POST['role'])){
        $erreurs['role'] = 'Selectionner le role svp !';
    }

    if(empty($erreurs)){

        $sql_insert = $db->prepare("INSERT INTO users SET username = ?,email = ?,pwd = ?,role = ?");
        $password   = sha1($_POST['pass']);
        $sql_insert->execute([$_POST['username'],$_POST['email'],$password,$_POST['role']]);
        header('Location:users.php');
        exit();
    }
}

?>
<?php require 'includes/header.php';?>

    <div class="container">
            <div class="card mt-3">
                <div class="card-header text-white bg-info">
                    <h5>Ajout d'un nouvel utilisateur </h5>
                </div>
                <div class="card-body bg-light">
                    <?php if(!empty($erreurs)) :?>
                        <div class="alert alert-danger">
                          <p>Vous n'avez pas rempli correctement le formmulaire</p>
                          <ul>
                              <?php foreach($erreurs as $erreur) :?>
                                <li><?= $erreur;?></li>
                              <?php endforeach; ?>
                          </ul>
                        </div>
                    <?php endif; ?>
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="form-group mr-2">
                         <label for="username">Username:</label>
                         <input type="text" name="username" placeholder="Saisir le pseudo de l'utilisateur" class="form-control">
                    </div>
                    <div class="form-group mr-2">
                         <label for="email">Email :</label>
                         <input type="email" name="email" placeholder="exemple2232@gmail.com" class="form-control">
                    </div>
                    <div class="form-group mr-2">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="pass" id="mot de passe"  class="form-control" placeholder="mot de passe">
                    </div>
                    <div class="form-group mr-2">
                            <label for="mot de passe">Confirmez votre mot de passe</label>
                            <input type="password" name="pass_confirm" id="mot de passe"  class="form-control" placeholder="mot de passe">
                    </div>
                    <label for="role" class="mr-2">Role:</label> 
                    <select name="role" class="form-control mr-2" id="role">
                        <option value=""></option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="VENDEUR">VENDEUR</option>
                    </select>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mt-2"><i class="fas fa-save"></i> Valider</button>
                        <a href="users.php" class="btn btn-info mt-2"> Retour </a>
                    </div>
                </form>
                </div>
            </div>
    </div>
    <?php require 'includes/footer.php';?>