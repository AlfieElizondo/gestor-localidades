<?php

use yii\helpers\Url;
use app\models\ConstantesWeb;

?>
<div class="site-menubar ryg-menubar site-menubar-light">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category">General</li>

          <?php
          if(Yii::$app->user->identity->txt_auth_item == ConstantesWeb::SUPER_ADMIN || Yii::$app->user->identity->txt_auth_item == ConstantesWeb::ABOGADO ||
            Yii::$app->user->identity->txt_auth_item == ConstantesWeb::CLIENTE || Yii::$app->user->identity->txt_auth_item == ConstantesWeb::ASISTENTE){?>

          <li class="dropdown site-menu-item has-sub">
            <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
              <i class="icon wb-users" aria-hidden="true"></i>
              <span class="site-menu-title">Usuarios</span>
              <span class="site-menu-arrow"></span>
            </a>
            <div class="dropdown-menu">
              <div class="site-menu-scroll-wrap is-list">
                <div>
                  <div>
                    <ul class="site-menu-sub site-menu-normal-list">
                      <li class="site-menu-item">
                        <a class="animsition-link" href="<?=Url::base()?>/usuarios">
                          <span class="site-menu-title">Listado de usuarios</span>
                        </a>
                      </li>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="<?=Url::base()?>/usuarios/create">
                          <span class="site-menu-title">Agregar usuario</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <?php
          }
          ?>

          <?php
          if(Yii::$app->user->identity->txt_auth_item == ConstantesWeb::SUPER_ADMIN || Yii::$app->user->identity->txt_auth_item == ConstantesWeb::ABOGADO
          || Yii::$app->user->identity->txt_auth_item == ConstantesWeb::ASISTENTE){?>

          <li class="dropdown site-menu-item has-sub">
            <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
              <i class="icon wb-map" aria-hidden="true"></i>
              <span class="site-menu-title">Localidades</span>
              <span class="site-menu-arrow"></span>
            </a>
            <div class="dropdown-menu">
              <div class="site-menu-scroll-wrap is-list">
                <div>
                  <div>
                    <ul class="site-menu-sub site-menu-normal-list">
                      <li class="site-menu-item">
                        <a class="animsition-link" href="<?=Url::base()?>/localidades">
                          <span class="site-menu-title">Listado de localidades</span>
                        </a>
                      </li>
                      <?php if(Yii::$app->user->identity->txt_auth_item != ConstantesWeb::SUPER_ADMIN){ ?>
                        <li class="site-menu-item">
                          <a class="animsition-link" href="<?=Url::base()?>/localidades/create">
                            <span class="site-menu-title">Agregar localidad</span>
                          </a>
                        </li>
                      <?php } ?>
                      <li class="site-menu-item">
                        <a class="animsition-link" href="<?=Url::base()?>/archivadas">
                          <span class="site-menu-title">Localidades archivadas</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <?php
          }
          ?>

          
        </ul>
      </div>
    </div>
  </div>
</div>