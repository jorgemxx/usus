<?php
 session_start();

 if (!empty($_SESSION['id']) && !empty($_SESSION['pass'])) {
  
 require_once 'LIGA3/LIGA.php'; 
 BD('localhost', 'root', '', 'base');
  
  HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=>'Lo que sea...'));
  
  
  
  $body = array('contenedor'=>array('uno'=>'<p>Usuario válido</p>',
                                    'dos'=>'<a href="cerrar.php">Cerrar sesión</a>'));
									
  
  HTML::cuerpo($body);
  $usuarios = LIGA('usuarios');
  $columnas = 'id,nombre,fecha';

$cols = array(
 
 'Nombre de usuario' => '@[nombre]',
// Un título nuevo y cada celda tendrá el campo fecha recortado a 10 dígitos
 'Hora de registro' => '@{substr("@[fecha]", 11, 19)}@'
);
HTML::tabla($usuarios,'usuarios',$cols);

  
  HTML::pie();
 } else {
    //echo 'Área prohibida';
    header('Location: .?error=1');
 }