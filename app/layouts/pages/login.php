<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/14/2017
 * Time: 3:13 AM
 */

?>
<section class="full-height gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img style="height: 50%; width: 50%;" src="/assets/defensoria/logos/logo1.png" alt=""></h1>

            </div>
            <h3><?=$siteTitle?></h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <?= form_open(WEBSERVER.'estic/sessions/login',['class' => 'm-t']) ?>
            <div class="form-group">
                <?= form_email('email','','id="login-email" class="form-control" placeholder="username or email address" required=""')?>
            </div>
                <?= form_hidden('uri_string',$uri_string)?>
            <div class="form-group">
                <?= form_password('password','','id="login-password" class="form-control" placeholder="password" required=""')?>
            </div>

            <?= form_submit('login','Ingresar','id="btn-login" class="btn btn-primary block full-width m-b"')?>

            <?=anchor('base/sessions/forgot_password','<small>Forgot password?</small>')?>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <?=anchor('base/sessions/signup','Create an account','class="btn btn-sm btn-white btn-block"')?>

            <?= form_close() ?>

            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
</section>
