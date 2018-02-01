<?php
session_start();
print_r($_SESSION);
unset($_SESSION['tabela_l']);
unset($_SESSION['czas_p_d']);
unset($_SESSION['czas']);
unset($_SESSION['nr']);

session_destroy();

header('Location: index.php');
exit();
  ?>

  <a href="index.php">menu</a>