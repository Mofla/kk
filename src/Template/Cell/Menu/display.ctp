<?php use Cake\Utility\Xml; ?>
<!-- LOGO ET PANEL USERS -->
<style>
    .icon-logged {
        width: 10px;
    }
    .page-header {
        height: auto;!important;
    }
</style>


<div class="page-wrapper-row">
  <div class="page-wrapper-top">
    <div class="page-header">

        <!-- END LOGO et PANEL USER -->
        <!-- BEGIN HEADER MENU -->
        <div class="page-header-menu">
          <div class="container">
              <ul class="nav navbar-nav pull-right">
                  <li class="droddown dropdown-separator">
                      <span class="separator"></span>
                  </li>
                  <li class="dropdown dropdown-user dropdown-dark">
                      <?php $Ses = $this->request->session()->read('Auth');
                      if (isset($Ses)): ?>
                          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <?php foreach ($user as $u): ?>
                                  <?= $this->Html->image('../uploads/user/' . $u->picture_url, ['class' => 'img-circle, icon-logged']) ?>
                                  <span class="username username-hide-mobile"><?= $u->username ?></span>
                              <?php endforeach; ?>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-default">
                              <li>
                                  <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $i, 'prefix' => 'admin']) ?>">
                                      <i class="icon-user"></i>Mon Profil </a>
                              </li>
                              <li class="divider"></li>
                              <li>
                                  <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout', 'prefix' => 'utilisateur']); ?>">
                                      <i class="icon-key"></i> Déconnecter </a>
                              </li>
                          </ul>
                      <?php endif; ?>
                  </li>
              </ul>
            <div class="hor-menu ">
              <ul class="nav navbar-nav">
                  <li class="menu-dropdown classic-menu-dropdown ">
                      <?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => 'display', 'prefix' => false]); ?>
                  </li>
                <!-- si l'utilisateur est connecté on affiche ce menu -->
                <?php foreach ($xmlObject as $xml) : ?>
                  <?php foreach ($role as $r) : ?>
                    <?php if ($r->role_id !=1): ?>
                      <?php if (Xml::xml_attribute($xml,'prefix') == 'Admin'): continue;
                      else: ?>
                        <li class="menu-dropdown classic-menu-dropdown ">
                          <a href="<?= $this->Url->build(['controller' =>  Xml::xml_attribute($xml, 'controller'), 'action' => Xml::xml_attribute($xml, 'action'), 'prefix' =>  strtolower(Xml::xml_attribute($xml, 'prefix'))]) ?>">
                            <?php echo Xml::xml_attribute($xml, 'titre') ?>
                          </a>
                            <!-- s'il y a des sous-menu -->
                            <?php if (Xml::xml_attribute($xml->menuItem, 'titre') != null) : ?>
                              <ul class="dropdown-menu pull-left">
                                <?php foreach ($xml->menuItem as $xmls): ?>
                                  <li class="">
                                    <a href="<?= $this->Url->build(['controller' =>  Xml::xml_attribute($xmls, 'controller'), 'action' => Xml::xml_attribute($xmls, 'action'), 'prefix' => strtolower(Xml::xml_attribute($xmls, 'prefix'))]) ?>">
                                      <?= Xml::xml_attribute($xmls, 'titre') ?>
                                    </a>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                            <?php endif; ?>
                        </li>
                      <?php endif; ?>
                    <?php else: ?>
                      <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="<?= $this->Url->build(['controller' =>  Xml::xml_attribute($xml, 'controller'), 'action' => Xml::xml_attribute($xml, 'action'), 'prefix' =>  strtolower(Xml::xml_attribute($xml, 'prefix'))]) ?>">
                          <?php echo Xml::xml_attribute($xml, 'titre') ?>
                        </a>
                        <!-- s'il y a des sous-menu -->
                        <?php if (Xml::xml_attribute($xml->menuItem, 'titre') != null) : ?>
                          <ul class="dropdown-menu pull-left">
                            <?php foreach ($xml->menuItem as $xmls): ?>
                              <li class="">
                                <a href="<?= $this->Url->build(['controller' =>  Xml::xml_attribute($xmls, 'controller'), 'action' => Xml::xml_attribute($xmls, 'action'), 'prefix' => strtolower(Xml::xml_attribute($xmls, 'prefix'))]) ?>">
                                  <?= Xml::xml_attribute($xmls, 'titre') ?>
                                </a>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </ul>

            </div>
          </div>
        </div>
        <!-- END HEADER MENU -->
    </div>
  </div>
</div>