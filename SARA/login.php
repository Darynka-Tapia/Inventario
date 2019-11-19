<?php 
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
**  Descripcion codigo: Login              **
**                                         **
*********************************************
********************************************/
 session_start();
?>

<!doctype html>
<html lang="en-US">
<head>

  <meta charset="utf-8">

  <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

  <?php

 
  if(!isset($_SESSION['acceso'])){
    
       }else {
        echo '
        <script> window.onload = function(){
          window.location = "index.php";
        }</script>';
        // header('Location:index.php');
      }
  ?>
    <div id="login">
        
        <form action="SQL/login.php" method="post">
                <p><center><img src="img/LOGO2.png" alt=""></center></p>
                <p><span> <i class="fas fa-user"></i> </span><input type="text" placeholder="Username" name="usuario" required></p> 
                <p><span> <i class="fas fa-lock"></i> </span><input type="password"  placeholder="Password" name="password" required></p> 
                <p><input type="submit" value="Iniciar sesión"></p>
        </form>
    </div>


<?php
    error_reporting(E_ALL ^ E_NOTICE);

    $fallo=$_GET['f'];
    if($fallo==1){
      echo "<p class='fallo'><center><strong>¡Datos erroneos!</strong></center></p>";
    }else if($fallo==2){
       echo "<p class='fallo'><center><strong>¡Ingresaste caracteres no permitidos!</strong></center></p>";
    }
?>






  <style type="text/css">
  strong{
    color: red;
      text-shadow: 5px 5px 5px #aaa;
  }

  body {
    background:#f2f2f2;
    background-image: url("img/fondo.png");
    color: #606468;
    font-family: 'Open Sans', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5em;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right;
    border: none;
  }

  a {
    color: #eee;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  input {
    border: none;
    font-family: 'Open Sans', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5em;
    padding: 0;
    -webkit-appearance: none;
  }

  p {
    line-height: 1.5em;
  }

  .clearfix { *zoom: 1; } /* For IE 6/7 */
  .clearfix:before, .clearfix:after {
    display: table;
    content: "";
  }
  .clearfix:after { clear: both; }

  /* ---------- LOGIN ---------- */

  #login {
    margin: 50px auto;
    width: 280px;
  }

  #login form span {
    background-color: #b2bfcc;
    border: 3px solid #b2bfcc;
    border-radius: 3px 0px 0px 3px;
    -moz-border-radius: 3px 0px 0px 3px;
    -webkit-border-radius: 3px 0px 0px 3px;
    color: #606468;
    display: block;
    float: left;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 50px;
  }

  #login form input {
    height: 50px;
  }

  #login form input[type="text"], input[type="password"] {
    background-color: transparent;
    border: 3px solid #b2bfcc;
    border-left: 0px;
    border-radius: 0px 3px 3px 0px;
    -moz-border-radius: 0px 3px 3px 0px;
    -webkit-border-radius: 0px 3px 3px 0px;
    color: #606468;
    margin-bottom: 1em;
    padding: 0 16px;
    width: 67%;
  }

  #login form input[type="submit"] {
    background: transparent;
    cursor: pointer;
    width: 280px;
    font-family: 'Brandon Grotesque';
    font-weight: medium;
    font-style: normal;
    font-size: 18px;
    line-height: 35px;
    letter-spacing: 0px;
    color: #5d809f;
    display: inline-block;
    padding-left:10px;
    padding-top: 10px;
    padding-bottom: 40px;
    padding-right: 10px;
    border: 3px solid #5d809f;
    border-radius: 10px;
    transition: all .3s ease;
    outline:none;
    text-decoration: none;
  }

  #login form input[type="submit"]:hover {
    background: #5d809f;
    color: #f2f2f2;
  }

  #login > p {
    text-align: center;
  }

  #login > p span {
    padding-left: 5px;
  }

  @media screen and (max-width: 575px){
    
  }
  </style>
</body>
</html>


