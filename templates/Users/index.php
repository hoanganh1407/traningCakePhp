<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->layout = 'adminmaster';

// $this->assign('content','hello');
// $this->start('content');
?>

<div class="content">
        <!-- Your awesome content goes here -->

    <div class="row">
    <div class="col-md-12">
    <div class="widget">
    <div class="widget-header transparent">
    <h2><strong>Toolbar</strong> CRUD Table</h2>
    <div class="additional-btn">
    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
    </div>
    </div>
    <div class="widget-content">
    <div class="data-table-toolbar">
    <div class="row">
    <div class="col-md-4">
        <form role="form">
        <input type="text" class="form-control" placeholder="Search...">
        </form>
        
    </div>
    <div class="col-md-8">
        <div class="toolbar-btn-action">
            <a class="btn btn-success" href="/admin/users/create" ><i class="fa fa-plus-circle"></i> Add new</a>
            
        </div>
    </div>
    </div>
    </div>

    <div class="table-responsive">
    <table data-sortable class="table table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th data-sortable="false">Option</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($users as $key=>$user): ?>
        <tr>
            
                <td><?= (++$key) ?></td>
                <td><strong><?= ($user->name) ?></strong></td>
                <td><a href="mailto:#"></a> <?= ($user->email) ?> </td>
                <?php if($user->is_admin == 1): ?>
                <td>Admin</td> 
                <?php elseif($user->is_admin == 0): ?>
                    <td>User</td>   
                <?php endif; ?>
                <?php if($user->active == 0): ?>
                <td><span class="label label-success">Active</span></td>
                <?php elseif($user->is_admin == 0): ?>
                <td><span class="label label-danger">Lock</span></td>
                <?php endif; ?>
                <td>
                    <div class="btn-group btn-group-xs">
                        <a data-toggle="tooltip" title="Edit" class="btn btn-default" href="/admin/users/edit/<?= ($user->id) ?>"><i class="fa fa-edit"></i></a>
                        <a data-toggle="tooltip" title="Delete" class="btn btn-default" href="/admin/users/delete/<?= ($user->id) ?>"><i class="fa fa-trash-o"></i></a>
                        <a data-toggle="tooltip" title="Active User" class="btn btn-default" href="/admin/users/lock/<?= ($user->id) ?>"><i class="fa fa-power-off"></i></a>
                        
                    </div>
                   
                </td>
                
        </tr>
        <?php endforeach ?>
    
       
        
    </tbody>
    </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?= $this->Paginator->prev('Previous') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Next') ?>
        </ul>
    </nav>
    </div>
    </div>
    </div>

    </div>


    </div>


