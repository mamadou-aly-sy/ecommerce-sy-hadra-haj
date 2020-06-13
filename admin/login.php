<?php
session_start();

require_once '../database/db.php';

$message = '';

if (!empty($_POST)) {
    if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])) {

        $pseudo = $_POST['pseudo'];
        $pwd   = sha1($_POST['pwd']);

        $requette = "SELECT * FROM users WHERE username = ? AND pwd = ?";
        $resultat = $db->prepare($requette);
        $resultat->execute([$pseudo, $pwd]);
        if ($user = $resultat->fetch()) {
            if ($user['etat'] == 1 && $user['role'] == 'ADMIN') {
                $_SESSION['PROFILE'] = $user;
                header('location:dashboard.php');
            } else {
                $_SESSION['erreur'] = "Attention : Votre Compte est suspendu .Veillez contacter l'administrateur";
                header('location:login.php');
            }
        } else {
            $_SESSION['erreur'] = 'Pseudo ou mot de passe incorrect !';
            header('location:login.php');
        }
    }
}

if (isset($_SESSION['erreur'])) {
    $message = $_SESSION['erreur'];
} else {
    $message = "";
}

?>

<?php require 'includes/header.php' ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($message)) : ?>
                                        <div class="alert alert-danger">
                                            <?= $message ?>
                                        </div>
                                    <?php endif ?>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="Pseudo">Pseudo</label>
                                            <input class="form-control py-4" name="pseudo" type="text" placeholder="Saisir votre pseudo" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" name="pwd" type="password" placeholder="Saisir votre mot de passe" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.php">Mot de passe oublier ?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.php">Creer un Compte ? Sign up!</a></div>
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
                        <div class="text-muted">Copyright &copy; Mon Site-web 2020</div>
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