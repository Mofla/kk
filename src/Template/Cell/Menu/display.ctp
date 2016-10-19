<div class="page-wrapper-row">
  <div class="page-wrapper-top">
    <div class="page-header">
      <div class="page-header-top">
        <div class="container">
          <!-- BEGIN LOGO -->
          <div class="page-logo">
            <a href="/">
              <img src="" alt="logo" class="logo-default">
            </a>
          </div>
          <!-- END LOGO -->
          <a href="javascript:;" class="menu-toggler"></a>
          <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown dropdown-user dropdown-dark">
                <?php $Ses=$this->request->session()->read('Auth');
                if(isset($Ses)): ?>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                      data-hover="dropdown" data-close-others="true">
                  <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                  <span class="username username-hide-mobile">Nick</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                  <?php foreach ($role as $r) : ?>
                    <?php if ($r->role_id == 1): ?>
                  <li>
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $i , 'prefix'=>'admin']) ?>" >
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
                    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout', 'prefix'=>'utilisateur']); ?>">
                      <i class="icon-key"></i> Déconnecter </a>
                  </li>
                </ul>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
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
              <?php $Ses=$this->request->session()->read('Auth');
              if(isset($Ses)): ?>
                <li class="menu-dropdown classic-menu-dropdown ">
                  <a href="<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'index', 'prefix' => false]); ?>">
                    Dashboard
                  </a>
                </li>
                <li class="menu-dropdown classic-menu-dropdown">
                  <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'index', 'prefix'=> 'admin']) ?>">Gérer utilisateurs</a>
                    <ul class="dropdown-menu pull-left">
                      <?php foreach ($perm as $p) : ?>
                        <?php foreach ($p->connectors as $conn): ?>
                          <li class=" ">
                            <a href="
                            <?php foreach ($role as $r) : ?>
                              <?php if ($r->role_id == 1): ?>
                                <?= $this->Url->build(['controller' => $conn->controller, 'action' => $conn->function, 'prefix'=> 'admin']) ?>">
                              <?= $p->name ?>
                              <?php else: ?>
                                <?= $this->Url->build(['controller' => $conn->controller, 'action' => $conn->function, 'prefix'=> false]) ?>">
                                <?= $p->name ?>
                              <?php endif ; ?>
                            <?php endforeach; ?>

                            </a>
                          </li>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </ul>
                </li>
              <?php foreach ($role as $r) : ?>
              <?php if ($r->role_id == 1): ?>
                <li class="menu-dropdown classic-menu-dropdown">
                  <a href="<?=$this->Url->build(['controller' => 'Permissions', 'action' => 'index', 'prefix'=> 'admin']) ?>">Gérer permissions</a>
                  <ul class="dropdown-menu pull-left">
                    <?php foreach ($gererPerm as $gp) : ?>
                      <?php foreach ($gp->connectors as $conn): ?>
                        <li class=" ">
                          <a href="<?= $this->Url->build(['controller' => $conn->controller, 'action' => $conn->function, 'prefix'=> 'admin']) ?>"><?= $gp->name ?></a>
                        </li>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endif; ?>
                <?php endforeach; ?>
                  <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="<?= $this->Url->build(['controller' => 'Tchat', 'action' => 'add', 'prefix' => false]); ?>">
                      Tchat
                      <span class="arrow"></span>
                    </a>
                  </li>
              <?php endif; ?>
              <li class="menu-dropdown classic-menu-dropdown ">
                <a href="<?= $this->Url->build(['controller' => 'Portfolios', 'action' => 'index', 'prefix' => false]); ?>">
                  Portfolios
                </a>
              </li>
              <li class="menu-dropdown classic-menu-dropdown ">
                <a href="<?= $this->Url->build(['controller' => 'Forums', 'action' => 'index', 'prefix' => false]); ?>">
                          Forum
                  <span class="arrow"></span>
                </a>
                <ul class="dropdown-menu pull-left">
                  <li class=" ">
                    <a href="<?= $this->Url->build('/admin/forums/listcategory') ?>">ACP Forum</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END HEADER MENU -->
    </div>
  </div>
</div>