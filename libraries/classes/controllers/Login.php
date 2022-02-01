<?php

namespace Controllers;

class Login extends Controller
{
	protected $modelName = "Login";

	public function show() {
		$pageTitle = "Log in";
		\Renderer::render("login", compact('pageTitle'));
	}

	function clean_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		return htmlspecialchars($data);
	}

	public function connect() {
		$username = $this->clean_data($_POST['username']);
		$user = $this->model->findUser($username);
		file_put_contents('php://stderr', print_r(count($user), true));
		if (password_verify($_POST["password"], $user['password'])) {
			file_put_contents('php://stderr', print_r("connecté\n", true));
			header("Location: https://www.google.com");
		} else {
			header("http://localhost:8000/index.php?controller=login&task=show");
		}
	}
}