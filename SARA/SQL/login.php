<?php
    ob_start();
    session_start(); 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 22/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Logica para        **
**  el login                               **
**                                         **
*********************************************
********************************************/?>


<?php

  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_."; 

	require('conexion.php');
  $user=$_POST['usuario'];
  $pass=$_POST['password'];
  $val='';
  
  $cont=0;
  $sql=$base->prepare('Select * from accesos where usuario="'.$user.'"');
  $sql->execute();
  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    if(password_verify($pass, $row['contraseña'])){
      $cont++;
      echo $cont;
    }
  }
  if($cont>0){

    $_SESSION["acceso"]=$user;
    // header("Location: ../index.php");
    echo '
    <script> window.onload = function(){
      window.location = "../index.php";
    }</script>';
  }else {
    // header("Location: ../login.php?f=1");
    echo '
    <script> window.onload = function(){
      window.location = "../login.php?f=1";
    }</script>';
  }

  
ob_end_flush();

?>
