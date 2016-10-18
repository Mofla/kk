<!-- END PAGE TITLE -->
<!-- BEGIN PAGE TOOLBAR -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="profile">
                <div class="tabbable-line tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"> Profil </a>
                        </li>
                        <?php
                        if ($autoriser) {
                        ?>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab"> Compte </a>
                        </li>
                        <?php }?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <?= $this->Html->image('../uploads/user/'. $user->picture_url,['class' => 'img-responsive pic-bordered'])?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8 profile-info">
                                            <h1 class="font-green sbold uppercase"><?= $user->firstname ?> <?= $user->lastname ?></h1>
                                            <div class="list-inline" style="font-size: 22px">
                                                    <i class="fa fa-map-marker"></i> <?= $user->city ?><br>
                                                    <i class="fa fa-birthday-cake"></i> <?= $user->birthday ?><br>
                                                    <i class="fa fa-phone"></i> <?= $user->phone ?><br>
                                                    <i class="fa fa-mobile"></i> <?= $user->cellphone ?><br>
                                                    <i class="fa fa-at"></i> <?= $user->email ?><br>
                                                    <i class="fa fa-user"></i> <?= $user->role->name ?>
                                            </div>
                                            <?php if (!empty($user->github_username)): ?>
                                                <a href="https://github.com/<?= $user->github_username ?>"><?= $user->github_username ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <!--end col-md-8-->
                                    </div>
                                    <!--end row-->
                                    <div class="tabbable-line tabbable-custom-profile">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_11">
                                                <div class="portlet-body">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab_1_2-->
                        <?php
                        if ($autoriser) {
                        ?>
                        <div class="tab-pane" id="tab_1_3">
                            <div class="row profile-account">
                                <div class="col-md-3">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1-1">
                                                <i class="fa fa-cog"></i> Editer profil </a>
                                            <span class="after"> </span>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2-2">
                                                <i class="fa fa-picture-o"></i> Changer Avatar </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3-3">
                                                <i class="fa fa-lock"></i> Changer Password </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_4-4">
                                                <i class="fa fa-eye"></i> Privacity Settings </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <div class="profile">
                                                <div class="tab-pane" id="tab_1_3">
                                                    <div class="row profile-account">
                                                        <div class="col-md-12">
                                                            <div class="tab-content">
                                                                <div id="tab_1-1" class="tab-pane active">
                                                                    <?= $this->Form->create($user) ?>
                                                                    <fieldset>
                                                                        <legend><?= __('Editer son profil') ?></legend>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="label-control">Rôle
                                                                                    : </label>
                                                                                <?= $this->Form->input('role_id', ['options' => $roles, 'label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control"> Promotion
                                                                                    : </label>
                                                                                <?= $this->Form->input('promotion', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Pseudo
                                                                                    : </label>
                                                                                <?= $this->Form->input('username', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Mot de
                                                                                    passe : </label>
                                                                                <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Email
                                                                                    : </label>
                                                                                <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Compte
                                                                                    Github
                                                                                    : </label><?= $this->Form->input('github_username', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Url avatar
                                                                                    : </label>
                                                                                <?= $this->Form->input('picture_url', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="label-control">Prénom
                                                                                    : </label><?= $this->Form->input('firstname', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Nom
                                                                                    : </label>
                                                                                <?= $this->Form->input('lastname', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Adresse
                                                                                    : </label>
                                                                                <?= $this->Form->input('address', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Code Postal
                                                                                    : </label>
                                                                                <?= $this->Form->input('zipcode', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Ville
                                                                                    : </label>
                                                                                <?= $this->Form->input('city', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Téléphone
                                                                                    : </label>
                                                                                <?= $this->Form->input('phone', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Portable
                                                                                    : </label>
                                                                                <?= $this->Form->input('cellphone', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Numéro
                                                                                    d'urgence : </label>
                                                                                <?= $this->Form->input('emergency_phone', ['label' => false, 'class' => 'form-control']); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">Date de
                                                                                    naissance : </label>
                                                                                <?= $this->Form->input('birthday', ['type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'datepicker']); ?>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <?= $this->Form->button('Submit',['class'=>'btn green']) ?>
                                                                    <?= $this->Form->end() ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_2-2" class="tab-pane">
                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                skateboard dolor brunch. Food truck quinoa
                                                nesciunt laborum eiusmod. </p>
                                            <form action="#" role="form">
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 200px; height: 150px;">
                                                            <img
                                                                src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                                alt=""/></div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;"></div>
                                                        <div>
                                                                                        <span
                                                                                            class="btn default btn-file">
                                                                                            <span class="fileinput-new"> Select image </span>
                                                                                            <span
                                                                                                class="fileinput-exists"> Change </span>
                                                                                            <input type="file"
                                                                                                   name="..."> </span>
                                                            <a href="javascript:;" class="btn default fileinput-exists"
                                                               data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger"> NOTE! </span>
                                                        <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                    </div>
                                                </div>
                                                <div class="margin-top-10">
                                                    <a href="javascript:;" class="btn green"> Submit </a>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_3-3" class="tab-pane">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" class="form-control"/></div>
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" class="form-control"/></div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" class="form-control"/></div>
                                                <div class="margin-top-10">
                                                    <a href="javascript:;" class="btn green"> Change Password </a>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_4-4" class="tab-pane">
                                            <form action="#">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td> Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus..
                                                        </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios1"
                                                                           value="option1"/> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios1"
                                                                           value="option2" checked/> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid
                                                            wolf moon
                                                        </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios21"
                                                                           value="option1"/> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios21"
                                                                           value="option2" checked/> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid
                                                            wolf moon
                                                        </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios31"
                                                                           value="option1"/> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios31"
                                                                           value="option2" checked/> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid
                                                            wolf moon
                                                        </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios41"
                                                                           value="option1"/> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios41"
                                                                           value="option2" checked/> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!--end profile-settings-->
                                                <div class="margin-top-10">
                                                    <a href="javascript:;" class="btn green"> Save Changes </a>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-md-9-->
                            </div>
                        </div>
                        <?php }?>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="tab_1_6">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1">
                                                <i class="fa fa-briefcase"></i> General Questions </a>
                                            <span class="after"> </span>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2">
                                                <i class="fa fa-group"></i> Membership </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3">
                                                <i class="fa fa-leaf"></i> Terms Of Service </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_1">
                                                <i class="fa fa-info-circle"></i> License Terms </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2">
                                                <i class="fa fa-tint"></i> Payment Rules </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3">
                                                <i class="fa fa-plus"></i> Other Questions </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content">
                                        <div id="tab_1" class="tab-pane active">
                                            <div id="accordion1" class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_1"> 1. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_1" class="panel-collapse collapse in">
                                                        <div class="panel-body"> Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid.
                                                            3 wolf moon officia aute, non cupidatat skateboard dolor
                                                            brunch. Food truck
                                                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                                            sunt aliqua put a bird on it squid single-origin coffee
                                                            nulla assumenda shoreditch et. Nihil anim keffiyeh
                                                            helvetica, craft beer labore wes anderson cred nesciunt
                                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw
                                                            denim aesthetic synth nesciunt you probably haven't heard of
                                                            them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_2"> 2. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_3"> 3. Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_4"> 4. Wolf
                                                                moon officia aute, non cupidatat skateboard dolor brunch
                                                                ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_5"> 5.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_6"> 6.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion1" href="#accordion1_7"> 7. Ad
                                                                vegan excepteur butcher vice lomo. Leggings occaecat
                                                                craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_2" class="tab-pane">
                                            <div id="accordion2" class="panel-group">
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_1"> 1. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high
                                                                life accusamus terry richardson ad squid. 3 wolf moon
                                                                officia aute, non cupidatat skateboard dolor brunch.
                                                                Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor, sunt aliqua put a bird on it squid
                                                                single-origin coffee nulla assumenda shoreditch et.
                                                                Nihil
                                                                anim keffiyeh helvetica, craft beer labore wes anderson
                                                                cred nesciunt sapiente ea proident. Ad vegan excepteur
                                                                butcher vice lomo. Leggings occaecat craft beer
                                                                farm-to-table, raw denim aesthetic synth nesciunt you
                                                                probably haven't heard of them accusamus labore
                                                                sustainable VHS. </p>
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high
                                                                life accusamus terry richardson ad squid. 3 wolf moon
                                                                officia aute, non cupidatat skateboard dolor brunch.
                                                                Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor, sunt aliqua put a bird on it squid
                                                                single-origin coffee nulla assumenda shoreditch et.
                                                                Nihil
                                                                anim keffiyeh helvetica, craft beer labore wes anderson
                                                                cred nesciunt sapiente ea proident. Ad vegan excepteur
                                                                butcher vice lomo. Leggings occaecat craft beer
                                                                farm-to-table, raw denim aesthetic synth nesciunt you
                                                                probably haven't heard of them accusamus labore
                                                                sustainable VHS. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_2"> 2. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_3"> 3. Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_4"> 4. Wolf
                                                                moon officia aute, non cupidatat skateboard dolor brunch
                                                                ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_5"> 5.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_6"> 6.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion2" href="#accordion2_7"> 7. Ad
                                                                vegan excepteur butcher vice lomo. Leggings occaecat
                                                                craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_3" class="tab-pane">
                                            <div id="accordion3" class="panel-group">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_1"> 1. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high
                                                                life accusamus terry richardson ad squid. 3 wolf moon
                                                                officia aute, non cupidatat skateboard dolor brunch.
                                                                Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor, sunt aliqua put a bird on it squid
                                                                single-origin coffee nulla assumenda shoreditch et. </p>
                                                            <p>
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high
                                                                life accusamus terry richardson ad squid. 3 wolf moon
                                                                officia aute, non cupidatat skateboard dolor brunch.
                                                                Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor, sunt aliqua put a bird on it squid
                                                                single-origin coffee nulla assumenda shoreditch et. </p>
                                                            <p>
                                                                Food truck quinoa nesciunt laborum eiusmod. Brunch 3
                                                                wolf moon tempor, sunt aliqua put a bird on it squid
                                                                single-origin coffee nulla assumenda shoreditch et.
                                                                Nihil
                                                                anim keffiyeh helvetica, craft beer labore wes anderson
                                                                cred nesciunt sapiente ea proident. Ad vegan excepteur
                                                                butcher vice lomo. Leggings occaecat craft beer
                                                                farm-to-table, raw denim aesthetic synth nesciunt you
                                                                probably haven't heard of them accusamus labore
                                                                sustainable VHS. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_2"> 2. Anim
                                                                pariatur cliche reprehenderit, enim eiusmod high life
                                                                accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_3"> 3. Food
                                                                truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                                moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch
                                                            et. Anim pariatur
                                                            cliche reprehenderit, enim eiusmod high life accusamus terry
                                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                            aliqua put a bird on it squid single-origin coffee nulla
                                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                            craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_4"> 4. Wolf
                                                                moon officia aute, non cupidatat skateboard dolor brunch
                                                                ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_5"> 5.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_6"> 6.
                                                                Leggings occaecat craft beer farm-to-table, raw denim
                                                                aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse"
                                                               data-parent="#accordion3" href="#accordion3_7"> 7. Ad
                                                                vegan excepteur butcher vice lomo. Leggings occaecat
                                                                craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat
                                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                            on it squid
                                                            single-origin coffee nulla assumenda shoreditch et. Nihil
                                                            anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                            nesciunt sapiente ea proident. Ad vegan excepteur
                                                            butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you
                                                            probably haven't heard of them accusamus labore sustainable
                                                            VHS.
                                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid
                                                            single-origin coffee nulla assumenda shoreditch et
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>


