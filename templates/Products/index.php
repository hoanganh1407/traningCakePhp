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
            <a class="btn btn-success" href="/admin/category/create" ><i class="fa fa-plus-circle"></i> Add new</a>
            
        </div>
    </div>
    </div>
    </div>

    <div class="table-responsive">
    <table data-sortable class="table table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $key=>$value): ?>
        <tr>
            
                <td><?= (++$key) ?></td>
                <td><strong><?= ($value->name) ?></strong></td>
                <td><strong><?= ($value->category->name) ?></strong></td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <a data-toggle="tooltip" title="Edit" class="btn btn-default" href="/admin/product/edit/<?= ($value->id) ?>"><i class="fa fa-edit"></i></a>
                    </div>
                </td>
        </tr>
        <?php endforeach ?>
    
       
        
    </tbody>
    </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?= $this->Paginator->prev('<<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>>') ?>
        </ul>
    </nav>
    </div>
    </div>
    </div>

    </div>


    </div>


