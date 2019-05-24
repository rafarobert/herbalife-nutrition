<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrezgaspar
 * Date: 2019-05-18
 * Time: 11:23
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-lg-10">
    <h2><?= empty($oUser->getIdUser()) ? "Agregar " . setLabel('User') : "Actualizando datos, " . setLabel('User #') . $oUser->getIdUser() ?></h2>
    <ol class="breadcrumb">
      <li>
        <?= anchor('estic', 'Inicio') ?>
      </li>
      <li>
        <?= anchor('estic/users', setLabel('users')) ?>
      </li>
      <li class="active">
        <strong>Edicion de datos</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">

        <div class="ibox-title">
          <h5>All form elements
            <small>With custom checbox and radion elements.</small>
          </h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="#">Config option 1</a>
              </li>
              <li><a href="#">Config option 2</a>
              </li>
            </ul>
            <a class="close-link">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>

        <div class="ibox-content">
          <?php
          //startInsertEachOne
          ?>

          <?= form_open_multipart("estic/users/edit/" . $oUser->getIdUser(), ["id" => "usersEdit", "class" => "form-horizontal"]) ?>

          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'name',
                'id' => 'inputName',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("name", $oUser->getName()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("name"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputLastname" class="col-sm-2 control-label">Lastname</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'lastname',
                'id' => 'inputLastname',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("lastname", $oUser->getLastname()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("lastname"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'username',
                'id' => 'inputUsername',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("username", $oUser->getUsername()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("username"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'email',
                'id' => 'inputEmail',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("email", $oUser->getEmail()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("email"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputAddress" class="col-sm-2 control-label">Domicilio</label>
            <div class="col-sm-10">
              <script>
                oTinyMce.set('[name="address"]', `<?=$oUser->getAddress() ?>`);
              </script>
              <?php
              $data = array (
                'name' => 'address',
                'id' => 'inputAddress',
                'class' => 'form-control textTinymce ',
                'placeholder' => '',
              );
              echo form_textarea($data, set_value("address", $oUser->getAddress()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("address"); ?><div class="hr-line-dashed"></div>
          <?php if (!validateVar($oUser->getIdUser(), 'numeric')) { ?>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Password </label>
              <div class="col-sm-10">
                <?php
                $data = array (
                  'name' => 'password',
                  'id' => 'inputPassword',
                  'class' => 'form-control ',
                  'placeholder' => '',
                );
                echo form_password($data, set_value("password", $oUser->getPassword()));
                ?>
              </div>
            </div>
            <div class="form-group">
              <label for="fieldConfirmPassword" class="col-sm-2 control-label">Confirmar Password</label>
              <div class="col-sm-10">
                <?php
                $data = array(
                  "placeholder" => "Confirmar contraseña",
                  "name" => "password_confirm",
                  "id" => "fieldConfirmPassword",
                  "class" => "form-control "
                );
                echo form_password($data, "", "") ?>
              </div>
            </div>
            <?php echo form_error("password"); ?>
          <?php } ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputBirthdate" class="col-sm-2 control-label">Birthdate</label>
            <div class="col-sm-10 input-append date form_date" data-date="<?=$oUser->getBirthdate()?>">
              <?php
              $data = array (
                'name' => 'birthdate',
                'id' => 'inputBirthdate',
                'class' => 'form-control ',
                'placeholder' => '',
                'size' => 16,
                'readonly' => true,
              );
              echo form_input($data, set_value("birthdate", $oUser->getBirthdate()), "")
              ?>
              <span class="add-on"><i class="icon-remove"></i></span>
              <span class="add-on"><i class="icon-th"></i></span>
            </div>
          </div>
          <?php echo form_error("birthdate"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputAge" class="col-sm-2 control-label">Age</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'age',
                'id' => 'inputAge',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_number($data, set_value("age", $oUser->getAge()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("age"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputCarnet" class="col-sm-2 control-label">Carnet de Identidad</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'carnet',
                'id' => 'inputCarnet',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("carnet", $oUser->getCarnet()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("carnet"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputSexo" class="col-sm-2 control-label">Sexo</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'sexo',
                'id' => 'inputSexo',
                'class' => 'form-control i-checks form-control ',
                'placeholder' => '',
                'options' =>
                  array (
                    'masculino' => 'Masculino',
                    'femenino' => 'Femenino',
                  ),
              );
              //relatetionsOption
              echo form_radios($data, $data["options"], $oUser->getSexo());
              //printSecondItem
              ?>
            </div>
          </div>
          <?php echo form_error("sexo"); ?>



          <div class="hr-line-dashed"></div>


          <div class="form-group">
            <label for="inputPhone1" class="col-sm-2 control-label">Telefono 1</label>
            <div class="col-sm-9">
              <?php
              $data = array (
                'name' => 'phone1',
                'id' => 'inputPhone1',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("phone1", $oUser->getPhone1()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("phone1"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputPhone2" class="col-sm-2 control-label">Telefono 2</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'phone2',
                'id' => 'inputPhone2',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("phone2", $oUser->getPhone2()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("phone2"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputCellphone1" class="col-sm-2 control-label">Celular 1</label>
            <div class="input-group col-sm-10">
              <?php
              $data = array (
                'name' => 'countryCode',
                'id' => 'inputCountryCode',
                'class' => 'form-control ',
                'placeholder' => 'Codigo',
                'style' => 'width:30%'
              );
              echo form_default($data, set_value("countryCode", $oUser->getCountryCode()), "");

              $data = array (
                'name' => 'cellphone1',
                'id' => 'inputCellphone1',
                'class' => 'form-control ',
                'placeholder' => 'Numero de Celular',
                'style' => 'width:70%'
              );
              echo form_default($data, set_value("cellphone1", $oUser->getCellphone1()), "")
              ?>
              <span class="input-group-btn">
           <button type="button" class="btn btn-primary">Confirmar</button>
      </span>
            </div>
          </div>
          <?php echo form_error("cellphone1"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputCellphone2" class="col-sm-2 control-label">Celular 2</label>
            <div class="input-group col-sm-10">
              <?php

              $data = array (
                'name' => 'cellphone2',
                'id' => 'inputCellphone2',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("cellphone2", $oUser->getCellphone2()), "")
              ?>
              <span class="input-group-btn">
           <button type="button" class="btn btn-primary">Confirmar</button>
      </span>
            </div>
          </div>
          <?php echo form_error("cellphone2"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <script>oDropZone.dataName = 'user'</script>
            <label for="inputIdsFiles" class="col-sm-2 control-label">Foto de perfil</label>
            <div class="col-sm-10 dropzone" action="#">
              <div class="dropzone-previews"></div>
            </div>
            <?php $files = $oUser->getFiles(); ?>
            <script>
              oDropZone.inputName = 'idsFiles';
              oDropZone.inputId = 'inputIdsFiles';
              oDropZone.inputIdMainFile = 'inputIdCoverPicture';
              oDropZone.inputNameMainFile = 'idCoverPicture';
              oDropZone.idFotoPrincipal = '<?=$oUser->getIdCoverPicture()?>';
            </script>
            <?php if(isArray($files)){ ?>
              <script>
                <?php foreach ($files as $ind => $file){ ?>
                oDropZone.uploads['<?=$ind?>'] = {};
                oDropZone.uploads['<?=$ind?>'].data = JSON.parse(`<?=json_encode($file->getArrayDataWithThumbs())?>`);
                oDropZone.uploads['<?=$ind?>'].dir = '<?=$file->getUrl()?>';
                oDropZone.uploads['<?=$ind?>'].error = 'ok';
                oDropZone.uploads['<?=$ind?>'].fromAjax = true;
                oDropZone.uploads['<?=$ind?>'].pk= '<?=$file->getIdFile()?>';
                oDropZone.uploads['<?=$ind?>'].tableRef= '<?=$oUser->getTableName()?>';
                oDropZone.uploads['<?=$ind?>'].pkTableRef= '<?=setObject($oUser->getPrimaryKey())?>';
                oDropZone.uploads['<?=$ind?>'].idUserRef= '<?=$oUser->getIdUser()?>';
                oDropZone.uploads['<?=$ind?>'].fieldTableRef= 'IdsFiles';
                <?php } ?>
              </script>
            <?php } ?>
            <?php
            $data = array (
              'name' => 'idsFiles',
              'id' => 'inputIdsFiles',
              'class' => 'form-control ',
              'placeholder' => '',
            );
            echo form_hidden($data, set_value("idsFiles", $oUser->getIdsFiles()), "")
            ?>
          </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputIdCoverPicture" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'idCoverPicture',
                'id' => 'inputIdCoverPicture',
                'class' => 'display-none',
                'placeholder' => '',
                'table' => 'es_files',
              );
              //relatetionsOption
              echo form_hidden($data, $oFiles, $oUser->getIdCoverPicture());
              //printSecondItem
              ?>
            </div>
          </div>
          <?php echo form_error("idCoverPicture"); ?>



          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputIdCity" class="col-sm-2 control-label">IdCity</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'idCity',
                'id' => 'inputIdCity',
                'class' => 'chosen-select ',
                'placeholder' => '',
                'table' => 'es_cities',
              );
              //relatetionsOption
              echo form_select($data, $oCities, $oUser->getIdCity());
              //printSecondItem
              ?>
            </div>
          </div>
          <?php echo form_error("idCity"); ?>



          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputIdProvincia" class="col-sm-2 control-label">IdProvincia</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'idProvincia',
                'id' => 'inputIdProvincia',
                'class' => 'chosen-select ',
                'placeholder' => '',
                'table' => 'es_provincias',
              );
              //relatetionsOption
              echo form_select($data, $oProvincias, $oUser->getIdProvincia());
              //printSecondItem
              ?>
            </div>
          </div>
          <?php echo form_error("idProvincia"); ?>



          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputIdRole" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'idRole',
                'id' => 'inputIdRole',
                'class' => 'form-control i-checks ',
                'placeholder' => '',
                'table' => 'es_roles',
              );
              //relatetionsOption
              echo form_radios($data, $oRoles, $oUser->getIdRole());
              //printSecondItem
              ?>
            </div>
          </div>
          <?php echo form_error("idRole"); ?>



          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputSigninMethod" class="col-sm-2 control-label">SigninMethod</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'signinMethod',
                'id' => 'inputSigninMethod',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("signinMethod", $oUser->getSigninMethod()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("signinMethod"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputUid" class="col-sm-2 control-label">Uid</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'uid',
                'id' => 'inputUid',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("uid", $oUser->getUid()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("uid"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputCountryCode" class="col-sm-2 control-label">CountryCode</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'countryCode',
                'id' => 'inputCountryCode',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("countryCode", $oUser->getCountryCode()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("countryCode"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputAuthyId" class="col-sm-2 control-label">AuthyId</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'authyId',
                'id' => 'inputAuthyId',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_default($data, set_value("authyId", $oUser->getAuthyId()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("authyId"); ?><div class="hr-line-dashed"></div>
          <div class="form-group">
            <label for="inputVerified" class="col-sm-2 control-label">Verified</label>
            <div class="col-sm-10">
              <?php
              $data = array (
                'name' => 'verified',
                'id' => 'inputVerified',
                'class' => 'form-control ',
                'placeholder' => '',
              );
              echo form_number($data, set_value("verified", $oUser->getVerified()), "")
              ?>
            </div>
          </div>
          <?php echo form_error("verified"); ?>

          <div class="hr-line-dashed"></div>

          <div class="form-group">

            <div class="col-sm-4 col-sm-offset-2">
              <?php
              echo anchor('estic/users', 'Cancelar', 'class="btn btn-white"');
              $data = array(
                "name" => "save",
                "value" => "Guardar",
                "id" => "btnSave",
                "class" => "btn btn-primary",
                "onclick" => "oPageBack.onSubmit()"
              );
              echo form_submit($data) ?>
            </div>
          </div>
          <?php echo form_close();
          if (validateArray($errors, 'error')) {
            ?>
            <div class="row">
              <div class="col-md-12">
                <?= $errors['error'] ?>
              </div>
            </div>
          <?php } ?>
          <?php
          //endInsertEachOne
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
