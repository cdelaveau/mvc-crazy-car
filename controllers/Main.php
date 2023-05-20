<?php

class Main extends Controller{
	/**
	 * Cette méthode affiche la page principale
	 * 
	 * @return void
	 */
	public function index(){
		//on garde la structure avec une variable $main pour anticiper un éventuel besoin
		$main = array();

		//on envoie les données à la vue index
		$this->render('index', compact('main'));
	}
}

?>