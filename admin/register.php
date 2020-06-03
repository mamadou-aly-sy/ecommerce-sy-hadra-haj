<?php

require_once '../database/db.php';

if(!empty($_POST)){
    $erreurs = [];

    if(empty($_POST['nom']) || empty($_POST['prenom'])){
        $erreurs['saisie'] = "Veillez saisir votre nom et prénom svp";
    }
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username'])){
        $erreurs['username_invalid'] = "Votre pseudo est invalide (svp du alphanumérique)";
    } else{
        $requette = $db->prepare("SELECT id FROM users WHERE username = ?");
        $requette->execute($_POST['username']);
        $user = $requette->fetch();
        if($user){
            $erreurs['username_invalid'] = "Ce pseudo est déja pris !";
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

     if(empty($erreurs)){

        $sql_insert = $db->prepare("INSERT INTO users SET username = ?,email = ?,pwd = ?,nom = ?, prenom = ?");
        $password   = sha1($_POST['pass']);
        $sql_insert->execute([$_POST['username'],$_POST['email'],$password,$_POST['nom'],$_POST['prenom']]);
        header('Location:login.php');
        exit();
    }
}

?>
<?php require 'includes/header.php'?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Welcome to the Registration form</h3>
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
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nom</label>
                                                    <input class="form-control py-4" name ="nom" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Prenom</label>
                                                    <input class="form-control py-4" name ="prenom" id="inputLastName" type="text" placeholder="Enter last name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Login</label>
                                                    <input class="form-control py-4" name ="username" type="text" placeholder="Enter your login" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Mot de passe</label>
                                                    <input class="form-control py-4" name="pass" type="password" placeholder="Enter password" /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirme mot de passe</label>
                                                    <input class="form-control py-4" name="pass_confirm" type="password" placeholder="Confirm password" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                          <button type="submit" class="btn btn-primary btn-block">S'INSCRIRE</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
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