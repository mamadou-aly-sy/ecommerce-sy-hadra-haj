<?php require_once "includes/header.php"; ?>
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="card mt-5" style=" width: 25rem;">
      <div class="card-header bg-success">
        <h2 class="card-title text-center text-white">CONNEXION</h2>
      </div>
      <div class="card-body">
        <form action="form" method="post">
          <div class="group-form">
            <label for="user">Utilisateur</label>
            <input type="user" name="user" id="" class="form-control" placeholder="Ex:Elhadj_22">
          </div>
          <div class="group-form">
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="" class="form-control" placeholder="Mot de passe">
          </div>
          <div class="group-form mt-2">
            <input type="submit" value="Connecter" class="btn-lg btn btn-outline-success form-control">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <p class="text-center">Vous Avez Pas un Compte ! <a href="registred.php">Creer un Compte </a></p>
      </div>
    </div>
  </div>
</div>
<?php require_once "includes/footer.php"; ?>