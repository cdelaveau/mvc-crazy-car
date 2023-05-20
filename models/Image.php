<?php

class Image extends Model{
	public function __construct(){
		//Nous définissons la table par défaut
		$this->table = "image";

		//Nous ouvrons la connexion à la base de données
		$this->getConnection();
	}
	public function findById(int $id){
		$sql = "SELECT * FROM ".$this->table."";
		$query = $this->_connexion->query($sql);
		return $query->fetch_assoc();
	}
	public function modifier($id){ 
		$sql = "UPDATE ".$this->table." SET `chemin` ='{$_POST['chemin']}' WHERE `id` = $id";
		$query = $this->_connexion->query($sql);
		return $query;
	}
	public function effacer($id){
		$sql = "DELETE ".$this->table." WHERE `id` = $id";
		$query = $this->_connexion->query($sql);
		return $query;
	}
	public function creer($chemin){
		$sql = "INSERT ".$this->table." VALUES(NULL, '$chemin', '$alt')";
		$query = $this->_connexion->query($sql);
		return $query;
	}
}

?>