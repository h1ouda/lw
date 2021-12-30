<?php
include('../connexionbase.php');
session_start();

?>
 <?php 
       $pdostat=$base->prepare("SELECT id, description ,url,localisation,responsable FROM ressource where id=1");
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

 <center>
    <div class="container-fluid main-container" style="background : linear-gradient(45deg, #FC466B, #3F5EFB)">
          
				<br>
				 <div class="col-md-10 content"style="border-redius:10%" >
                    <div class="panel panel-default" style=" width:40% ; margin-left:20%" style="border-redius:10px"> <!--couleur de la liste des problémes-->
                       
                            <h3 style="font-size:20px; font-family:'Gothic A1';"> <?php foreach($msgs as $msg):?>
											<h3><?= $msg['description']?> </h3>
											<?php endforeach ;
											?></h3>
                    </div>
                       
   

                                    <div class="panel panel-success" style="margin-bottom : 100px; margin-left:20%" style="border-redius:10%" >
                                  
                                
                                    <table id="task-table">
                                       
                                        <tbody>
                                            <?php foreach($msgs as $msg):?>
											<?php $msg['responsable']?>
                                                
                                                   <?php $msg['id'] ?>
												   
                                                   <td><p><h3>URL: </h3><?= $msg['url'] ?></p></td>
												   <tr>
												   <td><p><h3>Localisation: </h3><?= $msg['localisation'] ?></p></td> 	
												 
												  <td> <form  action="r1.php" method="GET" >
									<div class="form-group">
                                    <div class=" col-md-12">
                                     <input type="submit" value="signaler" style="background-color:red;border-color:red"id="singlebutton" name="signaler" class="btn btn-primary btn-lg">
                                    </div>
                                    </div>
									</form></td>
									</tr>
									<tr>
	                                            <td><img src="image/r1.jpg"  /></td>
                                                   
                                                </tr>


                                         	<?php endforeach ;
											?> 
	                

					 
                                        </tbody>
                                    </table>
									
								
				<?php
if(isset($_GET['signaler'])){

$x=$msg['description'];
    $pres = $base->prepare("INSERT INTO `anomalie` (id_ressource,description,id_user) VALUES( '".$msg['id']."' , '".$msg['description']."','".$msg['responsable']."' )");
            //execution de la requete
            $pres->execute();
            $result=$pres;
            if($result){
                echo '<script language="Javascript">
            alert ("la ressource a été signaler !" )
                 </script>';
				 echo '<script>location = "r1.php"</script>';}
                 else{
                    echo '<script language="Javascript">
            alert ("ressource non signaler!" )
                 </script>';
                 }			
 
}
									?>		
									
									  </div>
      

  	





</body>
</html>