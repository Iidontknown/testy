<?php 
session_start();
require_once "dane_servera.php";
$_SESSION['idfor']=rand();
if (isset($_POST['zapiszp'])&& !empty($_POST['idp'])) {
	echo "1";
	if (isset($_SESSION['idp1'])) {
		echo "2";
		if ($_SESSION['idp1']==$_POST['idp']) {
			$ok=false;
			echo "3";
		}
	}else{
		$_SESSION['idp1']=$_POST['idp'];
		$ok=true;
		echo "4";
	}
if ($ok) {
	echo "5";
}




}

if (isset($_POST['u_rekord'])) {
	session_destroy();
}

if (isset($_POST['nm'])) {






}







 ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-wuś-dodawanie pacjenta</title>
</head>
<body>
	<a href="index.php">menu</a>
	<form method="post" >
Id:<br><input type="text" name="idp" <?php if (isset($_SESSION['idp'])) {
	echo 'value="'.$_SESSION['idp'].'"';
	unset($_SESSION['idp']); }
	if (isset($_SESSION['id_p_b'])) {
	  	echo 'readonly="readonly"';
	unset($_SESSION['id_p_b']);
	  }  

	?> > <?php if (isset($_SESSION['bidp'])) {
	echo $_SESSION['bidp'];
	unset($_SESSION['bidp']);
} ?><br>
Imie:<br><input type="text" name="imiep"<?php if (isset($_SESSION['imiep'])) {
	echo 'value="'.$_SESSION['imiep'].'"';
	unset($_SESSION['imiep']); }?>>
<?php if (isset($_SESSION['bimiep'])) {
	echo $_SESSION['bimiep'];
	unset($_SESSION['bimiep']);
} ?><br>
Nazwisko:<br><input type="text" name="nazwiskop"<?php if (isset($_SESSION['nazwiskop'])) {
	echo 'value="'.$_SESSION['nazwiskop'].'"';
	unset($_SESSION['nazwiskop']); }?>>
<?php if (isset($_SESSION['bnazwiskop'])) {
	echo $_SESSION['bnazwiskop'];
	unset($_SESSION['bnazwiskop']);
} ?><br>

Adres miasto:<br><input type="text" name="adres_mp"<?php if (isset($_SESSION['adres_mp'])) {
	echo 'value="'.$_SESSION['adres_mp'].'"';
	unset($_SESSION['adres_mp']); }?>><?php if (isset($_SESSION['badres_mp'])) {
	echo $_SESSION['badres_mp'];
	unset($_SESSION['badres_mp']);
} ?><br>
Adres ulica:<br><input type="text" name="adres_ulp"<?php if (isset($_SESSION['adres_ulp'])) {
	echo 'value="'.$_SESSION['adres_ulp'].'"';
	unset($_SESSION['adres_ulp']); }?>><?php if (isset($_SESSION['badres_ulp'])) {
	echo $_SESSION['badres_ulp'];
	unset($_SESSION['badres_ulp']);
} ?><br>
Adres nr:<br><input type="text" name="adres_nrp"<?php if (isset($_SESSION['adres_nrp'])) {
	echo 'value="'.$_SESSION['adres_nrp'].'"';
	unset($_SESSION['adres_nrp']); }?>><?php if (isset($_SESSION['badres_nrp'])) {
	echo $_SESSION['badres_nrp'];
	unset($_SESSION['badres_nrp']);
} ?><br>
Adres nr:<br><input type="text" name="telefonp"<?php if (isset($_SESSION['telefonp'])) {
	echo 'value="'.$_SESSION['telefonp'].'"';
	unset($_SESSION['telefonp']); }?>><?php if (isset($_SESSION['btelefonp'])) {
	echo $_SESSION['btelefonp'];
	unset($_SESSION['btelefonp']);
} ?><br>

<input type="hidden" name="hi" value=<php <?php if (isset($_SESSION['idfor'])) {
	echo "'".$_SESSION['idfor']."'";
} ?>
	
    />
<input type="submit" name="zapiszp" value="zapisz">
<input type="submit" name="u_rekord" value="usuń rekord">	<br>
<input type="submit" name="mnp" value="<">
	<input type="submit" name="wip" value=">">
	<input type="submit" name="nowyp" value="nowy rekord">


	
		
	
	</form>
</body>
</html>


<?php
echo "Post<br>";
print_r($_POST);
echo "<br>SESSION<br>";
print_r($_SESSION);
  ?>

