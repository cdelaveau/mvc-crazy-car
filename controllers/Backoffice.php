<?php

class Backoffice extends Controller {
	/**
	 * Cette méthode affiche la liste des images 
	 * 
	 * @return void
	 */

	public function index(){
		//On instancie le modèle "Image"
		$this->loadModel('Image');

		//On stocke la liste des images dans $images
		$backoffice = $this->Image->getAll();

		//On envoie les données à la vue index
		$this->render('index', compact('backoffice'));

		//On affiche les données
		//var_dump($images);
	}

	public function modifier(string $id){
		
		$this->loadModel('Image');
		$this->Image->modifier($id);
		$backoffice = $this->Image->getAll();
		$this->render('index', compact('backoffice'));
	}
	public function effacer(string $id){
		
		$this->loadModel('Image');
		$this->Image->modifier($id);
		$backoffice = $this->Image->getAll();
		$this->render('index', compact('backoffice'));
	}
	public function creer(string $id){
		
		$this->loadModel('Image');
		$this->Image->modifier($id);
		$backoffice = $this->Image->getAll();
		$this->render('index', compact('backoffice'));
	}
} 
?>