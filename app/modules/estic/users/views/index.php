<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 1:44 am
 * @var Model_users $model_users
 * @var Model_users users
 * @var Model_users $User
 * @var Model_Users $oUsers
 * @var ES_Model_Users $oUser
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de User</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de User</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">User</label>
                    <input type="text" id="product_name" name="product_name" value=""
                           placeholder="Product Name" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                    <?= anchor(WEBSERVER . "estic/users/edit", "<i class='fa fa-plus'></i> Agregar User", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                <th>Lastname</th>
                <th>Sexo</th>
                <th>Cellphone Number 1</th>
                <th>Username</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oUsers)) { ?>
                                <?php foreach ($oUsers as $oUser) {?>
                                    <tr>
                                        <td><?= $oUser->getName(); ?></td>               
                    <td><?= $oUser->getLastname(); ?></td>               
                    <td><?= $oUser->getSexo(); ?></td>               
                    <td><?= $oUser->getCellphoneNumber1(); ?></td>               
                    <td><?= $oUser->getUsername(); ?></td>               
                    <td><?= $oUser->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/users/edit/".$oUser->getIdUser(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/users/delete/" . $oUser->getIdUser(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar users registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                <th>Lastname</th>
                <th>Sexo</th>
                <th>Cellphone Number 1</th>
                <th>Username</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Estic Framework &copy; 2018-2019
    </div>
</div>