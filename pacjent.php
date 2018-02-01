<?php 
session_start();


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-wuś-dodawanie pacjenta</title>
</head>
<body>
	<a href="index.php">menu</a>
	<form method="post" >
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
</body>
</html>



