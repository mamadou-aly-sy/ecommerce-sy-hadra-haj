<form action="index.php" method="post">
  <input type="text" name="username" required>
  <input type="password" name="password" required>
  <input type="submit" value="Connexion" name="submit">
</form>

<?php

if (isset($_POST["submit"])) {
  echo $username = $_POST["username"];
  echo $password = $_POST["password"];
}

?>