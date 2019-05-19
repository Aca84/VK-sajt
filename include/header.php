	<!DOCTYPE html>
<!--	<?php //session_start()?>-->
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Video Klub</title>
			<!--		bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
			<!--		javascript - jquery-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="css/vk.css"> 
	</head>

	<body>
	
		<div class="container"> 
		
			<div class="blibord">
			<img src="slike/ppp.jpg" class="img-fluid" alt="Responsive image">
				<div class="bottom-right"><a class="tekst" href ='Video_Klub.php'>Video Klub</a>
				</div>
				<div class="top-right">
				<?php if(isset($_SESSION['logged'])){
            				echo "Dobrodosli, $username";
				}?>
          		<br>
           		<a class="logout" href ='loggin.php'>Logout</a>
            	</div>
 			</div>
 			
 			
			<nav class="navbar navbar-dark bg-dark">
<!--	<button class="btn btn-outline-light" type="button"><b>Video Klub</b></button>-->
				<a href="novifilm.php" target="_blank">
					<button type="button" class="btn btn-success">Dodaj novi film</button>
				</a>
<!--			search bar-->
				<form class="form-inline" name="pronadji">
   				
    				<input class="form-control mr-sm-2" name="naziv"
    				type="search" placeholder="Pronadji film" aria-label="Search">
    				
    				<button class="btn btn-outline-success my-2 my-sm-0" name="nadji"  type="submit">
    					Pronadji
    				</button>
    				
  				</form>				
					
			</nav>
			
		<div class="row">