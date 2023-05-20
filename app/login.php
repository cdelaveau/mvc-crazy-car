
<?php

session_start();
    if(isset($_POST['envoie'])) {

        $connexion= new mysqli('localhost','root','','mvc');
        if($connexion->connect_errno) {
            echo "Erreur de connexion n°{$connexion->connect_errno}: {$connexion->connect_error}";
            exit(1);
        }

        $connexion->set_charset("utf8");
        $login=$_POST['Login'];
        $sql="SELECT MDP FROM bousers WHERE Login=?";

        $stmt=$connexion->prepare($sql);
        erreur($connexion);
        $stmt->bind_param("s", $login);
        erreur($connexion);

        if($stmt->execute()) {
            $stmt->bind_result($hash);
            if($stmt->fetch()) {
                if(password_verify($_POST['MDP'], $hash)) {
                    $_SESSION['co']=$login;
                } else {
                    echo "Votre mot de passe ou login est incorrect";
                }
            }
        }
        erreur($connexion);
        $stmt->close();
        $connexion->close();
    }

if(isset($_POST['deco'])) {
    unset($_SESSION['co']);
    session_destroy();
}

if(!isset($_SESSION['co'])) {

?>
<html>
<body>
<form method="post" action=''>
    <fieldset>
        <legend>Se connecter</legend>
        <label for="Login"> Nom d'utilisateur :</label>
        <input type="text" placeholder="Nom d'utilisateur" name="Login" id="Login" autofocus required/>
        
        <label for="MDP"> Mot de passe :</label>
        <input type="password" placeholder="Mot de passe" name="MDP" id="MDP" required/>
        
        <button type="submit" name="envoie">Se connecter</button>
    </fieldset>
</form>
</body>
</html>

<?php

exit(); 
} else { 

?>
<form method="post" action=''>
    <button type="submit" name="deco">Se déconnecter</button>
</form>

<?php } 
    if (isset($_POST['deco'])){
        unset($_SESSION['co']);
    }

    function erreur($co) {
        if($co->errno) {
            echo "<p>Erreur n°{$co->errno}: {$co->error}</p>";
            exit(1);
        }
    }
    
?> 