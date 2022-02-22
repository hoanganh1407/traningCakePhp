<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'adminmaster';
?>


<div class="content">
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>Add Category </strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>
              
                <div class="widget-content padding">
                    <?= $this->Form->create(null,['type'=>'file']) ?>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                     
                        <p></p>
                        
                      </div>
    
                      <div class="form-group">
                        <label>Category Parent</label>
                            <select class="form-control" name="parent_id">
                                <option>No Category Parent</option>
                                <?php foreach($categories_parent as $key => $value): ?>
                                    <?php if($value->parent_id == null): ?>
                                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <?= $this->Form->end() ?>  
                </div>
            </div>
            
        </div>
    </div>
    
                    
</div>
