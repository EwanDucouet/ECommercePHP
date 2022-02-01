<?php
function clean_data($data) {
	$data = trim($data);
	$data = stripslashes($data);
	return htmlspecialchars($data);
}
function validate_data() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            return false;
        } else {
            $_POST["username"] = clean_data($_POST["username"]);
        }
		return true;
    }
    return false;
}
?>
<title>Connectez vous</title>
<form action="<?php if (validate_data()) {echo "index.php?controller=login&task=connect";} ?>" method="post">
    <input type="text" name="username" placeholder="Adresse mail ou nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" name="submit">Envoyer</button>
</form>
<a href="/index.php?controller=signin&task=show">Créer un compte</a>