<?php
//Esta primera parte es par acerrar sesión

session_start(); //Para destruir sesion primero hay que inciarla

session_destroy();  //con esto lo destruimos

//Una vez cerrada la sesion lo mandamos nuevamente al formulario
header("Location: formrecipe.php");


//Esta segunda parte es para BORRAR COOKIES
// se le pone una fecha anterior a la actual 
setcookie("receta", "",time()-3600);  //este menos es para simplemete decirle que caducaba en 1970

