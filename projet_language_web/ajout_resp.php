<?php
include('connexionbase.php');
if(isset($_POST['ajouter'])){
	 
    $login=$_POST['login'];
    $mot_de_passe=$_POST['mot_de_passe'];
	$role=$_POST['role'];
    
    $pres = $base->prepare("INSERT INTO utilisateur( login, mot_de_passe,role) VALUES( '$login' , '$mot_de_passe','$role' )");
            //execution de la requete
            $pres->execute();
            $result=$pres;
            if(!$result){
                echo '<script language="Javascript">
            alert ("Responsable non ajouter !" )
                 </script>';}
                 else{
                    echo '<script language="Javascript">
            alert ("Responsable ajouté avec succès!" )
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
               <h4 > Mon espace   <small>  Administrateur</small></h4>
               
            </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			
                     <ul class="nav navbar-nav navbar-right">
                        <li><a href="deconnexion.php"><span><i class="glyphicon glyphicon-log-out"></i></span> Déconnexion</a></li>
                         
                        </li>
                     </ul>
               </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
    </nav>  	
   
    
    <div class="container-fluid main-container" style="background : linear-gradient(45deg, #FC466B, #3F5EFB)">
        <div class="col-md-2 sidebar">
                <div class="row">
                        <!-- uncomment code for absolute positioning tweek see top comment in css -->
                        <div class="absolute-wrapper"> </div>
                           
                                   	 <a href="page_admin.php"><button type="submit" class="btn btn-primary btn-lg" style="margin-left:10%" name="retour" value="retour">Retour a l'acceuil</button></a>
 
                        </div>  		
                </div>
          <center>
       <div class="col-md-10 content" >
        <div class="panel panel-default" style="background-color: rgba(255, 255, 255, .3); width:40% ; margin-right:8%">
		
                <p style="font-size:20px; font-family:'Gothic A1';"> Ajout d'un responsable</p>
                </div>
                <div class="panel-body" style=" margin-right:8%"  >
                    <div class="row">  
                    <div class="col-md-6 col-md-offset-3">
                            <form class="well form-horizontal" action="" method="post" >
                                
								
								
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class=" control-label" for="eail">login</label>
                                        <input id="login" name="login" type="text" placeholder="saisir un login" class="form-control" required>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class=" control-label" for="mot_de_passe">mot de passe</label>
                                        <input id="mot_de_passe" name="mot_de_passe" type="password" placeholder="mot de passe" class="form-control" required>  
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="col-md-12">
                                        <label class=" control-label" for="eail">Role</label>
                                        <input id="role" name="role" type="text" placeholder="saisir un role" class="form-control" required>  
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class=" col-md-12">
                                        <input type="submit" value="Ajouter le responsable" id="singlebutton" name="ajouter" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                        </form> 
                        </div>
                    </div>
                </div>
            </div>
        
            </div>
    
     
       
       
       
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