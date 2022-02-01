<?php

namespace Controllers;

class Signin extends Controller
{
	protected $modelName = "Signin";

	public function show() {
		$pageTitle = "Sign in";
		\Renderer::render("signin", compact('pageTitle'));
	}

	public function connect() {
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$this->model->insertUser($_POST['username'], $_POST['email'], $password);
		header("http://localhost:8000/index.php?controller=signin&task=connect");
	}
}