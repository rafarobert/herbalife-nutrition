<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 24/11/2018
 * Time: 09:06 PM
 */
?>

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Bienvenido<br><img src="/assets/defensoria/logos/logo.jpg" alt=""></h2>

            <p>
                Aqui podras cambiar los datos de tu perfil.
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" action="base/users/edit">
                    <div class="form-group">
                        <input type="username" class="form-control" placeholder="Nombre de usuario" required="">
                    </div>
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="Nombre" required="">
                    </div>
                    <div class="form-group">
                        <input type="lastname" class="form-control" placeholder="Apellido" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Actualizar datos</button>
                    <a href="#">
                        <small>Cambiar contraseña</small>
                    </a>
                </form>
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright Example Company
        </div>
        <div class="col-md-6 text-right">
            <small>© 2014-2015</small>
        </div>
    </div>
</div>