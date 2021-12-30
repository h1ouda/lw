<?php
include('connexionbase.php');
session_start();
if(isset($_POST['generer'])){
	 
    $desc=$_REQUEST['description'];
    $url=$_REQUEST['url'];
    $local=$_REQUEST['localisation'];
    $pres = $base->prepare("INSERT INTO ressource(description,URL,localisation,responsable) VALUES('$desc','$url','$local','".$_SESSION['login']."')");
            //execution de la requete
            $pres->execute();
            $result=$pres;
            if(!$result){
                echo '<script language="Javascript">
            alert ("Ressource non ajouter !" )
                 </script>';}
                 else{
                    echo '<script language="Javascript">
            alert ("Ressource ajouté avec succès!" )
                 </script>';
                 }			
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
    <link rel="stylesheet" href="dist 3.7/css/bootstrap.min.css"  />
    <script src="dist 3.7/js/bootstrap.min.js"></script>
    <script src="dist 3.7/jquery-3.3.1.js"></script>
  <link rel="stylesheet" href="formul.css"  />
    <style>
    #footer{
	background: #333333;
	color: #ffffff;
	text-align: center;
	padding: 30px;
	margin-top: 100px;

}
    
    </style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>
<body style="background : linear-gradient(45deg, #FC466B, #3F5EFB)">


<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
             
			<a class="navbar-brand"  style="margin-top: -12px;">
               <h4 > Mon espace   <small>  Responsable </small>
               <?php
echo $_SESSION['login'];
?>
</h4>
            </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			
                     <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../deconnexion.php"><span><i class="glyphicon glyphicon-log-out"></i></span> Déconnexion</a></li>
                         
                        </li>
                     </ul>
               </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
    </nav>
	
	
	
	 <a href="../page_resp.php"><button type="submit" class="btn btn-primary btn-lg" style="margin-left:10%" name="retour" value="retour">Retour</button></a>

	<center>
<div style="width:50%">	



<?php    
    
    echo "<h1>Génerer un code QR d'une ressource</h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
     //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'$desc.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['url'])) { 
    
        //it's very important!
        if (trim($_REQUEST['url']) == '')
            die('url cannot be empty! <a href="?">back</a>');
            
        // user url
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['url'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['url'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } 
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
	
     $pdostat=$base->prepare('SELECT lieu FROM localisation ');
       //execution requete
       $executeisok=$pdostat->execute();
       //recuperer les donner
       $msgs=$pdostat->fetchAll();
	
	
    //config form
   echo' <form action="index.php" method="post">
        <b>URL:</b>&nbsp;<input name="url" placeholder="url" required value="'.(isset($_REQUEST['url'])?htmlspecialchars($_REQUEST['url']):'').'" />&nbsp;
		<br>
		<b>description:</b>&nbsp;<input name="description" placeholder="description" required value="'.(isset($_REQUEST['description'])?htmlspecialchars($_REQUEST['description']):'').'" />&nbsp;
		<br>
		<b>localisation:</b>&nbsp;<select name="localisation">'
 ?><?php        foreach($msgs as $msg): ?>
                <option value="<?= $msg['lieu'] ?>" > <?= $msg['lieu'] ?> </option>';                                
                      <?php endforeach ; ?>               
		 </select>      
	   <br>
		<b>ECC:</b>&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
        </select>&nbsp;
		<br>
        <b>Taille:</b>&nbsp;<select name="size">';
        <?php
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
        
    echo '</select>&nbsp;
	<br>
        <input type="submit"class="btn btn-primary btn-lg" name="generer" value="Créer"></form><hr/>';
        
     ?>  

    </div>
       <footer id="footer" >
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5 text-center text-xs-center text-sm-center text-md-center ">
                    <h5>Université de Rouen Normandie</h5>
                    <h5>Dep-info &copy; 2022</h5>
                </div>
                </div>
            </div>	
        </footer>

  	





</body>
</html>