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
    <link rel="stylesheet" href="css/ns.css"  />
    <style>
    #footer{
	background: #333333;
	color: #ffffff;
	text-align: center;
	padding: 30px;
	margin-top: 150px;

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
                        <!-- Menu -->
                        <div class="side-menu"style="background-color: rgba(255, 255, 255, .3)">
                           <nav class="navbar navbar-default" role="navigation"">
                              <!-- Main Menu -->
                              <div class="side-menu-container" >
                                 <ul class="nav navbar-nav">
                                       <!-- ajouter 1 -->
                                       <li class="active"><a href="page_admin.php"><span><i class="glyphicon glyphicon-cog"></i></span> Gestion des responsables</a></li>
                                       <li><a href="gest_local.php"><span><i class="glyphicon glyphicon-cog"></i></span> Gestion des localisations</a></li>
    
                                 </ul>
                              </div><!-- /.navbar-collapse -->
                           </nav>

                        </div>
                     </div>  		
            </div>
          <center>
    <div class="col-md-10 content" >
        <div class="panel panel-default" style="background-color: rgba(255, 255, 255, .3); width:40% ; margin-right:8%" >
          
            <p style="font-size:20px; font-family:'Gothic A1';"> Gestion des responsables</p>
            </div>
            <div class="panel-body" style="height : 250px;">
                <div class="row">  
                <br><br>          
                    <div class=" col-md-offset-1 col-md-4">
                        <a id="ch1" href="ajout_resp.php"><button type="submit" class="btn btn-lg btn-primary btn-blocks col-md-12">
                        <span><i class="glyphicon glyphicon-plus"></i></span>Ajouter un responsable</button> </a>
                    </div>
                    
                    <div class=" col-md-offset-1 col-md-4">
                        <a id="ch1" href="modif_resp.php"><button type="submit" class="btn btn-lg btn-primary btn-blocks col-md-12">
                        <span><i class="glyphicon glyphicon-edit"></i></span>Modifier un responsable</button></a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <a id="ch1" href="supp_resp.php"><button type="submit" class="btn btn-lg btn-primary btn-blocks col-md-12">
                        <span><i class="glyphicon glyphicon-trash"></i></span>Supprimer un responsable</button></a>
                    </div>

                    <div class="col-md-offset-1 col-md-4">
                        <a id="ch1" href="liste_resp.php"><button type="submit" class="btn btn-lg btn-primary btn-blocks col-md-12">
                        <span><i class="glyphicon glyphicon-list-alt"></i></span>Liste des responsables</button></a>
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