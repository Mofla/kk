<div class="permissions view large-9 medium-8 columns content">
 <h3><?= h($permission->name) ?></h3>
   <div class="col-md-4 ">
     <div class="portlet box green">
       <div class="portlet-title">
         <div class="caption">
           <i class="fa fa-gift"></i>Informations sur la permission :
         </div>
         <div class="tools">
           <a href="" class="fullscreen"> </a>
         </div>
         <div class="actions">
           <a href=" <?= $this->Url->build(['controller' => 'Permissions', 'action' => 'edit', $permission->id]) ?>" class="btn btn-default btn-sm">
             <i class="fa fa-pencil"></i> Editer </a>
         </div>
       </div>
       <div class="portlet-body">
         <div class="scroller" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
           <h4>La permission :</h4>
           <br><strong>Nom de la permission :</strong>
           <br/> <?= $permission->name ?><br><br>
           <strong>Description :</strong>
           <br/><?= $this->Text->autoParagraph(h($permission->description)); ?>
           <strong>Apparaît dans le menu</strong>
           <br/> <?php if (h($permission->menu)== 1):?>oui <?php else: ?>non <?php endif; ?>
         </div>
       </div>
     </div>
   </div>
   <div class="col-md-8 ">
     <div class="portlet box green">
       <div class="portlet-title">
         <div class="caption">
           <i class="fa fa-gift"></i>Autres informations :
         </div>
         <div class="tools">
           <a href="" class="fullscreen"> </a>
         </div>
       </div>
       <div class="portlet-body">
         <div class="scroller"  data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
           <div class="row">
             <div class="col-md-5">
               <?php if (!empty($permission->connectors)): ?>
                 <h4>La fonctionnalité de la permission :</h4>
                 <?php foreach ($permission->connectors as $connectors): ?><br>
                   <strong>Nom du controller :</strong>
                   <br/> <?= h($connectors->controller) ?> <br><br>
                   <strong>Fonction qui gère la permission :</strong>
                   <br/><?= h($connectors->function)?><br>
                 <?php endforeach; ?>
               <?php endif; ?>
             </div>
             <div class="col-md-7">
               <?php if (!empty($permission->roles)): ?>
                   <h4>Les personnes liées à la permission :</h4><br>
                 <table>
                   <thead>
                     <tr>
                       <th scope="col">Rôle</th>
                       <th scope="col">Description</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php foreach ($permission->roles as $roles): ?>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td><?= $roles->name ?>&nbsp;&nbsp;</td>
                         <td><?= $roles->description ?></td>
                       </tr>
                     <?php endforeach; ?>
                   </tbody>
                 </table>
               <?php endif; ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
