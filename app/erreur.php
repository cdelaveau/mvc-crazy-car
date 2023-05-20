<?php

// Nous allons faire notre propre gestion
error_reporting(0);
// Fonction spéciale de gestion des erreurs
function userErrorHandler($errno, $errmsg, $filename, $linenum, 
$vars){ 
    // Date et heure de l'erreur 
    $dt = date("Y-m-d H:i:s (T)");
    // Définit un tableau associatif avec les chaînes d'erreur 
    // En fait, les seuls niveaux qui nous interessent
    // sont E_WARNING, E_NOTICE, E_USER_ERROR, 
    // E_USER_WARNING et E_USER_NOTICE 
    $errortype = array ( 
    	E_ERROR => "Erreur", 
    	E_WARNING => "Alerte", 
    	E_PARSE => "Erreur d'analyse", 
    	E_NOTICE => "Note", 
    	E_CORE_ERROR => "Core Error", 
    	E_CORE_WARNING => "Core Warning", 
    	E_COMPILE_ERROR => "Compile Error", 
    	E_COMPILE_WARNING => "Compile Warning", 
    	E_USER_ERROR => "Erreur spécifique", 
    	E_USER_WARNING => "Alerte spécifique", 
    	E_USER_NOTICE => "Note spécifique", 
    	E_STRICT => "Runtime Notice"
    );
    // Les niveaux qui seront enregistrés 
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE); 
    $err = "<errorentry>\n"; 
    $err .= "\t<datetime>" . $dt . "</datetime>\n"; 
    $err .= "\t<errornum>" . $errno . "</errornum>\n"; 
    $err .= "\t<errortype>" . $errortype[$errno] . "</errortype>\n"; 
    $err .= "\t<errormsg>" . $errmsg . "</errormsg>\n"; 
    $err .= "\t<scriptname>" . $filename . "</scriptname>\n"; 
    $err .= "\t<scriptlinenum>" . $linenum . "</scriptlinenum>\n"; 
    if (in_array($errno, $user_errors)) { 
    	$err .= 
    	"\t<vartrace>".wddx_serialize_value($vars,"Variables")."</vartrace>\n"; 
    }

    $err .= "</errorentry>\n\n";
    // sauvegarde de l'erreur, et mail si c'est critique
    error_log($err, 3, "error.xml"); 
    if ($errno == E_USER_ERROR) { 
    // A vous d’adapter !
    //mail("phpdev@example.com","Critical User Error",$err); 
    	echo "<p>Erreur utilisateur critique !</p>";
    }
}

$old_error_handler = set_error_handler("userErrorHandler");
// constante non définie, qui génère une alerte
$t = I_AM_NOT_DEFINED;
// Division par 0
$u = 35 / 0;


function monErreur($exception) {
	echo "<b>Erreur locale survenue :</b> " . $exception->getMessage();
}
set_exception_handler('monErreur');

?>