<?php use Cake\Utility\Xml; ?>
<!-- LOGO ET PANEL USERS -->
<div class="page-wrapper-row">
  <div class="page-wrapper-top">
    <div class="page-header">
      <div class="page-header-top">
        <div class="container">
          <!-- BEGIN LOGO -->
          <div class="page-logo">
            <a href="/">
              <?= $this->Html->image('../img/Simplon.png',['class'=>'logo-default','width'=>150, 'height'=>50]) ?>
            </a>
          </div>
          <!-- END LOGO -->
          <a href="javascript:;" class="menu-toggler"></a>
          <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
              <li class="droddown dropdown-separator">
                <span class="separator"></span>
              </li>
              <li class="dropdown dropdown-user dropdown-dark">
                <?php $Ses=$this->request->session()->read('Auth');
                if(isset($Ses)): ?>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <?php foreach ($user as $u): ?>
                  <?= $this->Html->image('../uploads/user/'.$u->picture_url,['class'=>'img-circle']) ?>
                  <span class="username username-hide-mobile"><?= $u->username ?></span>
                  <?php endforeach; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                  <?php foreach ($role as $r) : ?>
                    <?php if ($r->role_id == 1): ?>
                  <li>
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $i , 'prefix'=>'admin']) ?>" >
                      <i class="icon-user"></i> Profil </a>
                  </li>
                    <?php else: ?>
                      <li>
                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $i ]) ?>" >
                          <i class="icon-user"></i> Profil </a>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <li>
                    <a href="app_calendar.html">
                      <i class="icon-calendar"></i> My Calendar </a>
                  </li>
                  <li>
                    <a href="app_inbox.html">
                      <i class="icon-envelope-open"></i> My Inbox
                        <span class="badge badge-danger"> 0</span>
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout', 'prefix'=>false]); ?>">
                        <i class="icon-key"></i> Déconnecter </a>
                    </li>
                  </ul>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END LOGO et PANEL USER -->
      <!-- BEGIN HEADER MENU -->
      <div class="page-header-menu">
        <div class="container">
          <form class="search-form" action="page_general_search.html" method="GET">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="query">
              <span class="input-group-btn">
                <a href="javascript:;" class="btn submit">
                  <i class="icon-magnifier"></i>
                </a>
              </span>
            </div>
          </form>
          <div class="hor-menu ">
            <ul class="nav navbar-nav">
              <!-- si l'utilisateur est connecté on affiche ce menu -->
              <?php foreach ($xmlObject as $xml) :?>
                <li class="menu-dropdown classic-menu-dropdown ">
                  <a href="<?=$this->Url->build(['controller' => Xml::xml_attribute($xml,'controller') , 'action' =>Xml::xml_attribute($xml,'action'), 'prefix'=> Xml::xml_attribute($xml,'prefix')]) ?>">
                    <?php echo Xml::xml_attribute($xml,'titre') ?>
                  </a>
                  <!-- s'il y a des sous-menu -->
                  <?php if (Xml::xml_attribute($xml->menuItem,'titre') != null) : ?>
                    <ul class="dropdown-menu pull-left">
                      <?php foreach ($xml->menuItem as $xmls): ?>
                        <li class="dropdown-submenu ">
                          <a href="<?= $this->Url->build(['controller' =>Xml::xml_attribute($xmls,'controller'), 'action' => Xml::xml_attribute($xmls->menuItem,'action'), 'prefix'=>Xml::xml_attribute($xmls,'prefix'), $i]) ?> ">
                          <?= Xml::xml_attribute($xmls,'titre') ?>
                          </a>
                          <!-- S'il y a des sous sous-menu -->
                          <?php if (Xml::xml_attribute($xmls->menuItem,'titre') != null): ?>
                          <ul class="dropdown-menu">
                        <?php foreach ($xmls->menuItem as $xmla): ?>
                          <li class=" ">
                            <a href="<?= $this->Url->build(['controller' =>Xml::xml_attribute($xmla,'controller'), 'action' => Xml::xml_attribute($xmla,'action'), 'prefix'=>Xml::xml_attribute($xmla,'prefix'), $i]) ?> ">
                              <?= Xml::xml_attribute($xmla,'titre') ?>
                            </a>
                          </li>
                          <?php endforeach; ?>
                          </ul>
                          <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- END HEADER MENU -->
    </div>
  </div>
</div>