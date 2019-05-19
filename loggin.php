<?php
	require 'include/Conn.php';

	session_start();

    if(isset($_POST['loggin'])){
            
        $username = trim(strtolower($_POST['username']));
        $password = $_POST['sifra'];
            
        $sql = "SELECT * FROM clan WHERE KorisnickoIme='$username' and Lozinka=$password";
            
        $clan    = mysqli_query($conn, $sql);
        $clanovi = mysqli_fetch_assoc($clan);
                 
        if($clanovi !=NULL){
					
         $_SESSION['logged']   = $username;
//       $_SESSION['ime']      = $username;
         $_SESSION['korisnik'] = $clanovi['SifC'];
                    
             header("Location: Video_Klub.php");
             exit();                  
         }else{
             $poruka = "Pogresna sifra!";                   
          }
         }        
    
?>

<!DOCTYPE html>

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

	<link rel="stylesheet" href="css/loggin.css">
</head>

<body>
	<div class="bottom-right">Video Klub</div>

	<button class="open-button" onclick="openForm()">Loggin</button>

	<?php 
        echo $poruka ?? "";
     ?>

	<div class="form-popup" id="myForm">
		<form action="loggin.php" name="logg_in" class="form-container" method="POST">
			<h1>Login</h1>

			<label for="email"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="sifra" required>

			<button type="submit" name="loggin" class="btn">Login</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
	</div>

	<script>
		function openForm() {
			document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
			document.getElementById("myForm").style.display = "none";
		}

	</script>

</body>

</html>
