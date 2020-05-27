<?php require_once "includes/header.php"; ?>
<div class="container ">
    <div class="row d-flex justify-content-center ">
        <div class="card mt-5" style=" width: 25rem;">
            <div class="card-header bg-primary">
                <h2 class="card-title text-center text-white">INSCRIPTION</h2>
            </div>
            <div class="card-body">
                <form action="form" method="post">
                    <div class="group-form">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="" class="form-control" placeholder="votre Nom">
                    </div>
                    <div class="group-form">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="" class="form-control" placeholder="votre Prenom">
                    </div>
                    <div class="group-form">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Ex: user@exemple.com">
                    </div>
                    <div class="group-form">
                        <label for="tel">Telephone</label>
                        <input type="tel" name="tel" id="" class="form-control" placeholder="Ex:37737353">
                    </div>
                    <div class="group-form">
                        <label for="user">Utilisateur</label>
                        <input type="user" name="user" id="" class="form-control" placeholder="Ex :ELhadj_22">
                    </div>
                    <div class="group-form">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" id="" class="form-control" placeholder="mot de passe">
                    </div>
                    <div class="group-form text-center pt-2">
                        <input type="submit" value="Valider" class="btn-lg btn btn-outline-primary form-control">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="text-center">Vous Avez Deja un Compte ! <a href="login.php">Connecter ici </a></p>
            </div>
        </div>
    </div>
</div>










<?php require_once "includes/footer.php"; ?>