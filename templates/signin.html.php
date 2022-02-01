<?php
function clean_data($data) {
	$data = trim($data);
	$data = stripslashes($data);
	return htmlspecialchars($data);
}
function validate_data() {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["passwordConfirm"]) && $_POST["password"] == $_POST["passwordConfirm"]) {
			$_POST["username"] = clean_data($_POST["username"]);
			$_POST["email"] = clean_data($_POST["email"]);
			$_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$_POST["passwordConfirm"] = password_hash($_POST["passwordConfirm"], PASSWORD_DEFAULT);
			return true;
		}
	}
	return false;
}
?>
<title>Connectez vous</title>
<form action="<?php if (validate_data()) {echo "index.php?controller=signin&task=connect";} ?>" method="post">
	<input type="text" name="username" placeholder="nom d'utilisateur" required>
    <input type="text" name="email" placeholder="Adresse mail" required>
	<input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="passwordConfirm" placeholder="Confirmer le mot de passe" required>
	<button type="submit" name="submit">Envoyer</button>
</form>
<a href="/index.php?controller=login&task=show">Se connecter à un compte existant</a>