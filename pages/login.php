<form action="" method="post">
  <input type="text" name="username" required>
  <input type="password" name="password" required>
  <input type="submit" value="Connexion" name="submit">
</form>

<?php

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once "../database/db.php";

  $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
  $params = [$username, sha1($password)];
  $statement = $db->prepare($sql);
  $statement->execute($params);
  $result = $statement->fetch();
  var_dump($result);
}

?>