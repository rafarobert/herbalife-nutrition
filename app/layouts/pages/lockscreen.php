<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 22/11/2018
 * Time: 04:33 PM
 */
?>

<div class="lock-word animated fadeInDown">
    <span class="first-word">LOCKED</span><span>SCREEN</span>
</div>
<div class="middle-box text-center lockscreen animated fadeInDown">
    <div>
        <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="/assets/inspinia/img/user/user_default_130x85.png" >
        </div>
        <h3>Acceso Denegado</h3>
        <p>Estás en pantalla de bloqueo. La aplicación principal se cerró y debe ingresar su correo y contraseña para volver a la aplicación.</p>
        <?= form_open(WEBSERVER.'estic/sessions/login',['class' => 'm-t']) ?>

            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Correo" required="">
            </div>
            <?= form_hidden('uri_string',$uri_string)?>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="******" required="">
            </div>
        <?= form_submit('login','Desbloquear','id="btn-login" class="btn btn-primary block full-width m-b"')?>
        <?= form_close() ?>
    </div>
</div>
