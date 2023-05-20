<?php

class Images extends Controller {
	/**
	 * Cette méthode affiche la liste des images 
	 * 
	 * @return void
	 */

	public function index(){
		//On instancie le modèle "Image"
		$this->loadModel('Image');

		//On stocke la liste des images dans $images
		$images = $this->Image->getAll();

		//On envoie les données à la vue index
		$this->render('index', compact('images'));

		//On affiche les données
		//var_dump($images);
	}
	public function affiche(string $id){
		//on instancie le modèle "Image"
		$this->loadModel('Image');

		//on stocke l'image dans $image
		$image = $this->Image->findById($id);

		//on envoie les données à la vue affiche
		$this->render('affiche', compact('image'));
	}
} 

?>