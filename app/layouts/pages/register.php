<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 13/09/2018
 * Time: 03:59 PM
 */
?>

<section class="full-height gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img style="height: 50%; width: 50%;" src="/assets/defensoria/logos/logo1.png" alt=""></h1>

            </div>
            <h3>Registro Administrador Portal Defensoria del Pueblo</h3>
            <p>Crea una cuenta para realizar tus tareas</p>

            <?= form_open(WEBSERVER.'base/sessions/signup') ?>
            <div class="form-group">
                <?= form_input('name',$oUser->name,'id="loginName" class="form-control" placeholder="User name" required=""')?>
            </div>

            <div class="form-group">
                <?= form_email('email',$oUser->email,'id="loginEmail" class="form-control" placeholder="Email or username" required=""')?>
            </div>

            <div class="form-group">
                <?= form_password("password", set_value("password", $oUser->password),'id="fieldPassword" class="form-control" placeholder="Password" required="" '); ?>
            </div>
            <div class="form-group">
                <?= form_password('password_confirm', "", 'id="fieldConfirmPassword" class="form-control" placeholder="Confirm Password" required=""') ?>
            </div>
            <?php echo form_error("password"); ?>

            <?= form_submit('register','Register','id="btnRegister" class="btn btn-primary block full-width m-b"')?>

            <p class="text-muted text-center"><small>¿Ya tienes una cuenta?</small></p>
            <?=anchor('estic/sessions/login','login','class="btn btn-sm btn-white btn-block"')?>
            <?= form_hidden('uri_string',$uri_string)?>
            <?= form_hidden('signin_method',SERVERNAME)?>

            <?= form_close() ?>

            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
</section>
