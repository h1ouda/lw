<?php
session_start();
if(isset($_POST['login']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_login = 'root';
    $db_password = '';
    $db_name     = 'projet_web';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_login, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $login = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              login = '".$login."' and mot_de_passe = '".$password."' ";    // choisir les coordonnée a saisir pour sidentifier 
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
			if ($_POST['login'] == 'admin@gmail.com'){     //si c'est admin@gmail.com alors redériger vers la page admin
				$_SESSION['login'] = $login;
			header('Location: page_admin.php');
			}else{
			                                              //si non c'est un responsable
           $_SESSION['login'] = $login;          
			header('Location: page_resp.php');}
        }
        else
        {
			echo '<script language="Javascript">
				alert ("login ou mot de passe incorrecte !" )
				
					 </script>';
					 echo '<script>location = "formulaire/form.html"</script>';
           // utilisateur ou mot de passe incorrect
        }
    }
    else
    {echo '<script language="Javascript">
				alert ("login ou mot de passe vide !" )
					 </script>';
					 echo '<script>location = "formulaire/form.html"</script>';
       // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: verifier.php');
}
mysqli_close($db); // fermer la connexion
?>