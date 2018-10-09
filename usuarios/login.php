<?php
require_once 'LIGA3/LIGA.php';

BD('localhost', 'root', '', 'usuarios');

$usuarios = LIGA("select * from usuarios where id='$_POST[id]' and contra= '$_POST[contra]'");

if($usuarios->numReg() ==1){
    //echo 'SI es!!!';
    //$_session[id]
    $_session['id'] = $usuarios->d('id');
    $_session['contra'] = $usuarios->d('contra');
    //header('location: sistema.php');
    echo 'usuario valido';
    
} else{
    //header('location: index.php?error=1');
    echo 'error en los datos';
}

?>