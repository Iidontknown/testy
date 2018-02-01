<?php 
session_start();
require_once "dane_servera.php";

//sprawdzanie czy user uzupelnil pola przed  dodaniem
if (isset($_POST['zapiszr'])) {
	$dospr = array("imie","nazwisko","specjalizacja","adres_m" );
		$ok=true;
		foreach ($dospr as $key => $value) {
			if (empty($_POST[$value])) {
				$_SESSION[("b".$value)]="brak: ".$value;
				//echo " brak: ".$value;
				$ok=false;
			}
		}

	if ($ok) {
		unset($_POST['zapiszr']);
		//zapisywanie w bazie danych
			
			echo 'odebranio zapiszr i proba bazy danych ';

			$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
				
				if ($polaczenie->connect_errno!=0)
				{
					$_SESSION['blad_bd']= "Error: ".$polaczenie->connect_errno;
					
				}
				else
				{

					$id = $_POST['id']	;
					unset($_POST['id']);
					$imie = $_POST['imie'];
					unset($_POST['imie']);
					$nazwisko = $_POST['nazwisko'];
					unset($_POST['nazwisko']);
					$spec = $_POST['specjalizacja'];
					unset($_POST['specjalizacja']);
					$ok=false;
					$adres_m = $_POST['adres_m'];
					$sql="INSERT INTO `lekarz` (`imie`, `nazwisko`, `specjalizacja`, `adres_m`, `id`) VALUES ('".$imie."', '".$nazwisko."', '".$spec."', '".$adres_m."', '".$id."')";
					if ($rezultat = $polaczenie->query($sql)) {
					$_SESSION['bd_ok']='dodano: '.$id.' '.$imie.' '.$nazwisko." ".$spec.' '. $adres_m;

					unset($_SESSION['tabela_l']);
					
					}
					

 

					$polaczenie->close();
					
					}

		}else
{
	

echo "1";
}
}
//pobieranie tabeli
if (!isset($_SESSION["tabela_l"])) {
	
	

$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
				
		if ($polaczenie->connect_errno!=0)
		{
		$_SESSION['blad_bd']= "Error: ".$polaczenie->connect_errno;
		}else{
			$sql="SELECT * FROM `lekarz`";
			
			if ($rezultat = $polaczenie->query($sql)) {
				$i=0;
				while($row = $rezultat->fetch_assoc()){
				$t_lekarze[]=$row;
				

				}
				$_SESSION['tabela_l']=$t_lekarze;
				$_SESSION['czas_p_d']=time();

			}

		$polaczenie->close();
		
		}
		

					






	


}
//usuwanie rekordu
if (isset($_POST['u_rekord'])) {
	unset($_POST['u_rekord']);
	if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$zmienid=gettype($id);
			if ($zmienid=='integer') {
				

			$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
				
				if ($polaczenie->connect_errno!=0)
				{
					$_SESSION['blad_bd']= "Error: ".$polaczenie->connect_errno;
					
				}
				else
				{
					
					$sql="DELETE FROM `lekarz` WHERE `id`='".$id."'";
					if ($rezultat = $polaczenie->query($sql)) {
					

				
					
					}else{
						$_SESSION['bid']='coś nie tak :( spróbuj ponownie lub sprawdz id lub połączenie z bazą danych';
					}
					

 

					$polaczenie->close();
					
				}	
				
			}else{
				$_SESSION['bid']='coś nie tak :( spróbuj ponownie lub sprawdz id2';
			}



	}else{
		$_SESSION['bid']='podaj id rekordu do usiniecia';
	}

}



header('Location: lekarz_dod.php');

 ?>