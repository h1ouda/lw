<?php
include('connexionbase.php');
session_start()

?>
 <?php 
       $pdostat=$base->prepare("SELECT id, description , id_ressource,id_user FROM anomalie where id_user = '".$_SESSION['login']."'");
       //execution requete
       $executeisok=$pdostat->execute();
       //recuperer les donner
       $msgs=$pdostat->fetchAll();

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
    <link rel="stylesheet" href="css/en.css"  />
	 <link rel="stylesheet" href="css/form_filtrer.css"  />
	 <link rel="stylesheet" href="js/script.js"  />
    <style>
    #footer{
	background: #333333;
	color: #ffffff;
	text-align: center;
	padding: 30px;
	margin-top: 80px;

}
    
    </style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>
<center>
<body style="background : linear-gradient(45deg, #FC466B, #3F5EFB)">


<nav class="navbar navbar-default navbar-static-top" >
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
            
			<a class="navbar-brand"  style="margin-top: -12px;">
  <h4 > Mon espace   <small>  Responsable</small>
  <?php
echo $_SESSION['login'];
?>
			   </h4>
               
            </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			
                     <ul class="nav navbar-nav navbar-right">
                        <li><a href="deconnexion.php"><span><i class="glyphicon glyphicon-log-out"></i><font color="black"></span> Déconnexion</a></li>
                        </li>
                     </ul>
               </div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
</nav>  	
   
    <center>
    <div class="container-fluid main-container" style="background : linear-gradient(45deg, #FC466B, #3F5EFB)">
            <div class="col-md-2 sidebar">
                <div class="row">
                     <!-- uncomment code for absolute positioning tweek see top comment in css -->
                     <div class="absolute-wrapper"> </div>
                        <!-- Menu -->
                        <div class="side-menu" style="background-color: rgba(255, 255, 255, .3)">
                           <nav class="navbar navbar-default" role="navigation" >
                              <!-- Main Menu -->
                              <div class="side-menu-container">
							  
                                 <ul class="nav navbar-nav">
                                       <!-- ajouter 1 -->
                                       <li><a href="phpqrcode/index.php"><span><i class="glyphicon glyphicon-cog"></i></span> Ajouter une ressource</a></li>
									   <li><a href="list_ress.php"><span><i class="glyphicon glyphicon-cog"></i></span> Liste des ressources</a></li>
									   
                                      

                                 </ul>
                              </div><!-- /.navbar-collapse -->
                           </nav>

                        </div>
                     </div>  		
                </div>
				
				
               
          
                <div class="col-md-10 content">
                    <div class="panel panel-default" style="background-color: rgba(255, 255, 255, .3) ; width:40% ; margin-right:8%"> <!--couleur de la liste des problémes-->
                       
                            <h3 style="font-size:20px; font-family:'Gothic A1';">Liste des anomalis </h3>
                        </div>
                       
   
						<div class="table-row">
                        <div class="form-group table-col" style="flex-grow:2">
                        
                        </div>
                       
              
          </div>
                                <center>
                          
                                <div class="panel panel-success" style="margin-bottom : 100px;" >
                                    <div class="panel-heading" >
                                        
                                        <div class="pull-right" >
                                            
                                        </div>
                                    </div>
                                
                                    <table class="table table-hover" id="task-table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>description</th>
                                                <th>id_user</th>
                                                <th>Action1</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($msgs as $msg  ):?>
                                                <tr>
                                                    <td><?= $msg['id'] ?></td>
                                                    <td><?= $msg['description'] ?></td>
                                                    <td><?= $msg['id_user'] ?></td>
													
												 <td><form  action="page_resp.php" method="GET" >
									<div class="form-group">
                                    
                                     <input type="submit" value="Supprimer" id="singlebutton" name="supprimer" class="btn btn-danger">
                                    </div>
                                    </div>
									</form></td>
										                              
                                                    <td></td>
                                                </tr>
		

                                            <?php endforeach ;?> 
										
		<?php

if(isset($_GET['supprimer'])){
   

   // préparation de la requete
   $press = $base->prepare("DELETE FROM `anomalie` WHERE id='".$msg['id']."'  ");
   //execution de la requete
   $executepress = $press->execute();
   if ($press){
    echo '<script language="Javascript">
    alert ("La ressource a été supprimée avec succès !" )
         </script>';
		  echo '<script>location = "page_resp.php"</script>';}
         else{
            echo '<script language="Javascript">
        alert ("Numéro du résonsable n\'existe pas!" )
         </script>';
         
    }
  }			
       	 
?> 								
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <br><br>  
                
            </div>
            </div> 
          <br><br><br><br><br><br><br>
       <footer id="footer" >
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5 text-center text-xs-center text-sm-center text-md-center ">
                    <h5>Université de Rouen Normandie</h5>
                    <h5>Dep-info &copy; 2022</h5>
                </div>
                </div>
            </div>	
        </footer>
  
</div>

        
  
</body>
</html>


