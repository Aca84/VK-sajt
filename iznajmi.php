<?php require 'include/Conn.php';?>
<?php
	session_start();
	$username=$_SESSION['logged'];

	$sql1 = "SELECT * FROM zanr";
	$zanrovi = mysqli_query($conn, $sql1);


	if(isset($_POST['iznajmi'])){
		
		if(empty($_POST['dana'])){
			echo "Unesite broj zeljenih dana";
			
		}else{
			
			$dana       = $_POST['dana'];
            $filmId     = $_SESSION['idFilm'];
            $korisnikId = $_SESSION['korisnik'];
            $kasetaId   = $_SESSION['SifK'];
                       
            $sqlMaxId ="select max(SifP) from pozajmica";
            $maxIdRez = mysqli_query($conn, $sqlMaxId);
      
            $id = (int) mysqli_fetch_row($maxIdRez)[0];       
            $id++;        
            
            $sqlIznajmi = "INSERT INTO pozajmica(SifP, SifK, SifF, SifC, Dana) VALUE ($id, $kasetaId, $filmId, $korisnikId, $dana)";
          
            $res = mysqli_query($conn, $sqlIznajmi);
        
        if($res){
          $poruka = "Uspesno ste iznajmili kasetu";
//            header("Location: index.php");
//                    exit();                  
        }
        else{
            $poruka = "Kaseta nije iznajmljena";
        }						
		}				
	}

?>	
<?php include 'include/header.php'?>
		<div class="col-9">
		    
			
		<form name="iznajmi" method="POST">
			<div class="input-group w-50 p-3" id="izDana">
					<input type="number" class="form-control" placeholder="Iznajmi dana" name="dana">
				<div class="input-group-append">
					<button class="btn btn-outline-success" type="submit" name="iznajmi">
						Iznajmi
					</button> 
				</div>
			</div>
		
		</form>
		<div><?php 
            	echo $poruka ?? "";
			?>
			<br></div>
			

		</div>
		
		<div class="col-3">
			<?php
            		while($row = mysqli_fetch_array($zanrovi)){
                	$id=$row[0]; //$id=$row['SifF'];
                	echo $row['Naziv']."<br>";
            		}
        		?>
		</div>

<?php include 'include/totop.php'?>
<?php include 'include/footer.php'?>