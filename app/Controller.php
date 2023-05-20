<?php

abstract class Controller {

	public function loadModel(string $model){
	    //On va chercher le fichier correspondant au modèle souhaité
	    require_once(ROOT.'models/'.$model.'.php');
	    //On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
	    $this->$model = new $model();
    }
    /**
     * Afficher une vue
     * 
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){
        //Récupère les données et les extrait sous forme de variables
        extract($data);
        //On démarre le buffer de sortie
        ob_start();
        //Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');
        //on stocke le contenu dans $content
        $content = ob_get_clean();
        //on fabrique le "template"
        require_once(ROOT. 'views/layout/default.php');
    }
}

?>