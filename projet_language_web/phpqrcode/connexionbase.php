<?php

try  //se connecter a la base de donnée
{
$base = new PDO('mysql:host=localhost;dbname=projet_web','root','');
$base->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
$base->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   
}
    catch(Exception $e){
        echo'une erreur est survenue';
        die();

}


  ?>