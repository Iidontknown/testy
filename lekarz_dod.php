<?php 
session_start();
if (isset($_SESSION['blad_bd'])) {
	echo 'Przepraszamy za usterki :( problemy z serwerem skontaktuj sie z administratorem strony<?--'.$_SESSION['blad_bd'].'-->';
	session_destroy();
	exit();
}
//sprawdzanie cz w sesi jest tabela
if (!isset($_SESSION["tabela_l"])&& $_SESSION['czas_p_d']<$_SESSION['czas_p_d']+100) {
	header('Location: lekarz_dod_skrypt.php');
	exit();
}

//unset($_SESSION['mn_wi']);


//domyslny rekord
if (isset($_SESSION['tabela_l']['0'])&& !isset($_SESSION['nr'])) {

	if (!isset($_SESSION['nr'])) {
	
$_SESSION['nr']=0;
}else{
$_SESSION['nr']=$_SESSION['stand_nr'];	
}
$nr=$_SESSION['nr'];
$_SESSION['id']=$_SESSION['tabela_l'][$nr]['id'];
$_SESSION['imie']=$_SESSION['tabela_l'][$nr]['imie'];
$_SESSION['nazwisko']=$_SESSION['tabela_l'][$nr]['nazwisko'];
$_SESSION['specjalizacja']=$_SESSION['tabela_l'][$nr]['specjalizacja'];
$_SESSION['adres_m']=$_SESSION['tabela_l'][$nr]['adres_m'];	
}

//mniejszy rekord
if (isset($_SESSION['tabela_l']['0'])&& isset($_POST['mn'])) {
	unset($_POST['mn']);
	if (isset($_SESSION['nr'])){
		$nr=$_SESSION['nr'];
		if (isset($_SESSION['tabela_l'][$nr-1])) {
			$_SESSION['nr']=$_SESSION['nr']-1;
		}else{
			$_SESSION['blad_bd']='<nie istnieje mniejszy rekord w bazie danych odśwież połączenie z bazą danych jeśli jesteś pewien że rekord powinien istnieć';
		}

		
	}else{
		$_SESSION['nr']=0;
	}

$nr=$_SESSION['nr'];
$_SESSION['id']=$_SESSION['tabela_l'][$nr]['id'];
$_SESSION['imie']=$_SESSION['tabela_l'][$nr]['imie'];
$_SESSION['nazwisko']=$_SESSION['tabela_l'][$nr]['nazwisko'];
$_SESSION['specjalizacja']=$_SESSION['tabela_l'][$nr]['specjalizacja'];
$_SESSION['adres_m']=$_SESSION['tabela_l'][$nr]['adres_m'];	
}

//wiekszy rekord
if (isset($_SESSION['tabela_l']['0'])&& isset($_POST['wi'])) {
	unset($_POST['wi']);
	if (isset($_SESSION['nr'])){
		$nr=$_SESSION['nr'];
		if (isset($_SESSION['tabela_l'][$nr+1])) {
			$_SESSION['nr']=$_SESSION['nr']+1;
		}else{
			$_SESSION['blad_bd']='>nie istnieje wiekszy rekord w bazie danych odśwież połączenie z bazą danych jeśli jesteś pewien że rekord powinien istnieć';
		}

		
	}else{
		$_SESSION['nr']=0;
	}

$nr=$_SESSION['nr'];
$_SESSION['id']=$_SESSION['tabela_l'][$nr]['id'];
$_SESSION['imie']=$_SESSION['tabela_l'][$nr]['imie'];
$_SESSION['nazwisko']=$_SESSION['tabela_l'][$nr]['nazwisko'];
$_SESSION['specjalizacja']=$_SESSION['tabela_l'][$nr]['specjalizacja'];
$_SESSION['adres_m']=$_SESSION['tabela_l'][$nr]['adres_m'];	
}

//nowy
if (isset($_POST['nowy'])) {
	unset($_POST['nowy']);
	$_SESSION['id']='';
$_SESSION['imie']='';
$_SESSION['nazwisko']='';
$_SESSION['specjalizacja']='';
$_SESSION['adres_m']='';	
require_once "dane_servera.php";
$polaczenie = @new mysqli($adreshostabd, $nazwauserbd, $haslobd, $nazwabd);
				
				if ($polaczenie->connect_errno!=0)
				{
					$_SESSION['blad_bd']= "Error: ".$polaczenie->connect_errno;
					
				}
				else
				{
					$sql="SELECT max(id) FROM lekarz";
					if ($rezultat = $polaczenie->query($sql)) {
					while($row = $rezultat->fetch_assoc()){
				$_SESSION['id']=$row['max(id)']+1;
				

				}
					
					}
					

 

					$polaczenie->close();
					
				}	
				



}
//odwiwezenie
if (isset($_POST['ods'])) {
	unset($_POST['ods']);
	session_destroy();
header('Location lekarz_dod_skrypt.php');

}


 ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>E-wuś dodawanie lekatrza</title>

	
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<a href="index.php">menu</a>
	<form method="post" action="lekarz_dod_skrypt.php">
Id:<br><input type="text" name="id" <?php if (isset($_SESSION['id'])) {
	echo 'value="'.$_SESSION['id'].'"';
	unset($_SESSION['id']); }?>><?php if (isset($_SESSION['bid'])) {
	echo $_SESSION['bid'];
	unset($_SESSION['bid']);
} ?><br>
Imie:<br><input type="text" name="imie"<?php if (isset($_SESSION['imie'])) {
	echo 'value="'.$_SESSION['imie'].'"';
	unset($_SESSION['imie']); }?>>
<?php if (isset($_SESSION['bimie'])) {
	echo $_SESSION['bimie'];
	unset($_SESSION['bimie']);
} ?><br>
Nazwisko:<br><input type="text" name="nazwisko"<?php if (isset($_SESSION['nazwisko'])) {
	echo 'value="'.$_SESSION['nazwisko'].'"';
	unset($_SESSION['nazwisko']); }?>>
<?php if (isset($_SESSION['bnazwisko'])) {
	echo $_SESSION['bnazwisko'];
	unset($_SESSION['bnazwisko']);
} ?><br>
Specjalizacja:<br><input type="text" name="specjalizacja" <?php if (isset($_SESSION['specjalizacja'])) {
	echo 'value="'.$_SESSION['specjalizacja'].'"';
	unset($_SESSION['specjalizacja']); }?>>
<?php if (isset($_SESSION['bspecjalizacja'])) {
	echo $_SESSION['bspecjalizacja'];
	unset($_SESSION['bspecjalizacja']);
} ?><br>
Adres:<br><input type="text" name="adres_m"<?php if (isset($_SESSION['adres_m'])) {
	echo 'value="'.$_SESSION['adres_m'].'"';
	unset($_SESSION['adres_m']); }?>><?php if (isset($_SESSION['badres_m'])) {
	echo $_SESSION['badres_m'];
	unset($_SESSION['badres_m']);
} ?><br>


<input type="submit" name="zapiszr" value="zapisz">
<input type="submit" name="u_rekord" value="usuń rekord">	


	</form>
	<form method="post">
	<input type="submit" name="mn" value="<">
	<input type="submit" name="wi" value=">">
	<input type="submit" name="nowy" value="nowy rekord">
		
	
	</form>


	<?php if (isset($_SESSION['bd_ok'])) {
		echo $_SESSION['bd_ok'];
		unset($_SESSION['bd_ok']);
	} 

if (isset($_SESSION['blad_bd'])) {
		echo $_SESSION['blad_bd']."<br>";
		unset($_SESSION['blad_bd']);
	} 
	//echo $_SESSION['czas_p_d'].'<br>';
	//print_r($_SESSION);
	//echo "<br>Post<br>";
	//print_r($_POST);
	echo "<br><br>";

echo '<table border="1"><tr><td>id</td><td>imie</td><td>nazwisko</td><td>specjalizacja</td><td>Adres_m</td></tr>';
$licznik=0;
    while(isset($_SESSION['tabela_l'][$licznik])) {
        echo "<tr><td> " . $_SESSION['tabela_l'][$licznik]["id"]. "</td><td>" . $_SESSION['tabela_l'][$licznik]["imie"]. "</td><td>" . $_SESSION['tabela_l'][$licznik]["nazwisko"]. "</td><td>" . $_SESSION['tabela_l'][$licznik]["specjalizacja"]. "</td><td>" . $_SESSION['tabela_l'][$licznik]["adres_m"]."</td></tr>";
     $licznik++;
    }
    echo "</table>";
   


	?>