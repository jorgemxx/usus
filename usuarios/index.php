<?php
session_start();
require_once 'LIGA3/LIGA.php'; //import

BD('localhost', 'root', '', 'usuarios' ); //linea de configuracion para conectarse a la base de datos

$where= '';

if (empty($_session['id'])&& !empty($_session['contra'])){
    $_where = "where id='$session[id]' and contra = '$_session[contra]'";
}

$usuarios = LIGA('usuarios'); //nombre de tabla de la base de datos

if($usuarios->numReg()== 1){
    header('sistema.php');
}

HTML:: cabeceras(array('title'=>'login para usuarios', 'description'=>'ingreso seguro a la pagina web')


                 );
//HTTP: (header) (cuerpo)
//GET: datos se envian por la URL POST: en el cuerpo de la peticion
                 
$campos = array('username'=>'<input id="username" name="id" />',
                'contraseña'=>'<input type="password" id="contraseña" name="contra" />');

$props= array('form'=>'action="login.php" method="POST"');

if (isset($_GET['error'])){
    echo '<p> error en los datos </p>';
}

HTML::forma($usuarios, 'login', $campos, $props);

$js = array('js'=>array('js/jquery-3.3.1.min.js', 'js/codigo.js'));
HTML::pie($js);

?>