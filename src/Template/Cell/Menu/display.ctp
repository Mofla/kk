<div class="page-wrapper-row">
  <div class="page-wrapper-top">
    <!-- BEGIN HEADER -->
    <div class="page-header">
      <!-- BEGIN HEADER TOP -->
      <div class="page-header-top">
        <div class="container">
          <!-- BEGIN LOGO -->
          <div class="page-logo">
            <a href="/">
              <img src="../assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">
            </a>
          </div>
          <!-- END LOGO -->
          <!-- BEGIN RESPONSIVE MENU TOGGLER -->
          <a href="javascript:;" class="menu-toggler"></a>
          <!-- END RESPONSIVE MENU TOGGLER -->
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <!-- END TODO DROPDOWN -->
              <li class="droddown dropdown-separator">
                <span class="separator"></span>
              </li>
              <!-- BEGIN INBOX DROPDOWN -->
              <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                     data-hover="dropdown" data-close-others="true">
                  <span class="circle">0</span>
                  <span class="corner"></span>
                </a>
                  <ul class="dropdown-menu">
                    <li class="external">
                      <h3>You have
                        <strong>0 New</strong> Messages</h3>
                        <a href="app_inbox.html">view all</a>
                    </li>
                  </ul>
              </li>
              <!-- END INBOX DROPDOWN -->
              <!-- BEGIN USER LOGIN DROPDOWN -->
              <li class="dropdown dropdown-user dropdown-dark">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                      data-hover="dropdown" data-close-others="true">
                  <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                  <span class="username username-hide-mobile">Nick</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                  <li>
                    <a href="page_user_profile_1.html">
                      <i class="icon-user"></i> My Profile </a>
                  </li>
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
                  <!--                                        <li>-->
                  <!--                                            <a href="app_todo_2.html">-->
                  <!--                                                <i class="icon-rocket"></i> My Tasks-->
                  <!--                                                <span class="badge badge-success"> 0 </span>-->
                  <!--                                            </a>-->
                  <!--                                        </li>-->
                  <li class="divider"></li>
                  <li>
                    <a href="page_user_lock_1.html">
                      <i class="icon-lock"></i> Lock Screen </a>
                  </li>
                  <li>
                    <a href="<?php $this->Html->link(['controller' => 'Users', 'action' => 'logout']); ?>">
                      <i class="icon-key"></i> Déconnecter </a>
                  </li>
                </ul>
              </li>
              <!-- END USER LOGIN DROPDOWN -->
            </ul>
          </div>
          <!-- END TOP NAVIGATION MENU -->
        </div>
      </div>
      <!-- END HEADER TOP -->
      <!-- BEGIN HEADER MENU -->
      <div class="page-header-menu">
        <div class="container">
          <!-- BEGIN HEADER SEARCH BOX -->
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
          <!-- END HEADER SEARCH BOX -->
          <!-- BEGIN MEGA MENU -->
          <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
          <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
          <div class="hor-menu ">
            <ul class="nav navbar-nav">
              <?php $Ses=$this->request->session()->read('Auth');
              if(isset($Ses)): ?>
                <li class="menu-dropdown classic-menu-dropdown active">
                  <a href="">Gérer utilisateurs</a>
                    <ul class="dropdown-menu pull-left">
                      <?php foreach ($perm as $p) : ?>
                        <?php foreach ($p->connectors as $conn): ?>
                          <li class=" ">
                            <a href="<?= $this->Url->build(['controller' => $conn->controller, 'action' => $conn->function]) ?>"><?= $p->name ?></a>
                          </li>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu-dropdown classic-menu-dropdown">
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $i]) ?>" >Profil</a>
                </li>  
              <?php endif; ?>
              <li class="menu-dropdown classic-menu-dropdown ">
                <a href="<?= $this->Url->build(['controller' => 'Forums', 'action' => 'index']); ?>">
                          Forum
                  <span class="arrow"></span>
                </a>
              </li>
            </ul>
          </div>
          <!-- END MEGA MENU -->
        </div>
      </div>
      <!-- END HEADER MENU -->
    </div>
   <!-- END HEADER -->
  </div>
</div>