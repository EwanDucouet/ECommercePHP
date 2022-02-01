<?php

namespace Models;

class Signin extends Model
{
	protected $table = "users";

	public function insertUser(string $pseudo, string $email, string $password) {
		$query = $this->pdo->prepare("INSERT INTO {$this->table} (pseudo, email, password) VALUES (:pseudo, :email, :password)");
		$query->execute(['pseudo' => $pseudo, 'email' => $email, 'password' => $password]);
	}
}