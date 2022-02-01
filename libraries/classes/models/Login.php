<?php

namespace Models;

class Login extends Model
{
	protected $table = "users";

	public function findUser(string $name){
		$query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE pseudo = :name OR email = :name");
		$query->execute(['name' => $name]);
		$items = $query->fetch();

		return $items;
	}
}