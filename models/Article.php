<?php

class Article extends Model{
	public function __construct(){
		//Nous définissons la table par défaut de ce modèle
		$this->table = "articles";

		//Nous ouvrons la connexion à la base de donnée
		$this->getConnection();
	}
	public function findBySlug(string $slug){
		$sql = "SELECT * FROM ".$this->table." WHERE `slug`=".$slug."";
		$query = $this->_connexion->query($sql);
		return $query->fetch_assoc();
	}
}

?>