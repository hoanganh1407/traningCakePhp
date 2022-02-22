<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'adminmaster';
?>


<div class="content">
<?= $this->Form->create() ?>
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>Add User </strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>
              
                <div class="widget-content padding">
                    <form role="form" id="contactForm"  method="POST" enctype="multipart/form-data">
                    
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                     
                        <p></p>
                        
                      </div>
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" name="email">
                      </div>
                      <div class="form-group">
                        <label>password</label>
                        <input type="text" class="form-control" name="password">
                      </div>
                      <div class="form-group">
                        <label>Role</label>
                            <select class="form-control" name="is_admin">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <?= $this->Form->end() ?>  
                    
</div>
