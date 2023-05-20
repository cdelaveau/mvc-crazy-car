<?php
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
//on appelle le modèle et le contrôleur principal
require_once(ROOT.'app/Model.php');
require_once(ROOT. 'app/Controller.php');
//on sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);
//si au moins 1 paramètre existe  
if($params[0] != ""){
    //on sauvegarde le premier paramètre dans $controller en mettant sa première lettre en majuscule
    $controller = ucfirst($params[0]);
    //on sauvegarde le deuxième paramètre dans $action si il existe sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    //on appelle le contrôleur
    require_once(ROOT.'controllers/'.$controller.'.php');
    //on instancie le contrôleur
    $controller = new $controller();
    if(method_exists($controller, $action)){
        //on supprime les deux premiers paramètres
        unset($params[0]); unset($params[1]);
        //on appelle la méthode $action du contrôleur $controller
        call_user_func_array([$controller,$action], $params);
    }else{
        //on envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }

}else{
    //ici aucun paramètre n'est défini
    //on appelle le contrôleur par défaut
    require_once(ROOT. 'controllers/Main.php');
    //on instancie le contrôleur 
    $controller = new Main();
    //on appelle la méthode index
    $controller->index();
}
?>