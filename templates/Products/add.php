
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'adminmaster';
?>
<div class="content">
    <div class="row">
        <div class="col-sm-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>Contact</strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                    </div>
                </div>
                <div class="widget-content padding">
                <?= $this->Form->create(null,['type'=>'file']) ?>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="products[category_id]">
                                <?php foreach($categories as $key=>$value):?>
                                <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="products[name]" required>
                        </div>

                        <div class="variant row">
                            <?php foreach($attributes as $attribute): ?>
                            <div class="form-group col-lg-6">
                                <label><?= $attribute->name ?></label>
                                <input type="text" class="form-control" name="attribute_products[1][<?=$attribute->id?>]" required>
                            </div>
                            <?php endforeach ?>
                            <div class="form-group col-lg-6">
                                <label>Price</label>
                                <input type="number" class="form-control" name="product_details[1][price]" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Image</label>
                                <br>
                                    <img id='test1' class="view_image" style="max-height: 80px; max-width: 80px; margin-bottom: 10px;" >
                                    <br>
                                    <input onchange="document.getElementById('test1').src = window.URL.createObjectURL(this.files[0])" class="add_image" type="file" class="form-control" name="product_details[1][image]"  required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="product_details[1][quantity]" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Description</label>
                                <input type="text" class="form-control" name="product_details[1][description]" required>
                            </div>
                            <div class="col-lg-6">
                                <p class="delete_variant" style="background:green;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">-</p>
                            </div>
                        </div>
                        <div class="append">

                        </div>
                        <div class="col-lg-6">
                                <p class="add_variant" style="background:red;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">+</p>
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?= $this->Form->end() ?>  
                </div>
            </div>
        </div>
    </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.add_variant').click(function(){
      let count = uuidv4();
      let html = 
      `<div class="variant row">`+
          <?php 
          foreach ($attributes as $attribute){ ?>
          `<div class="form-group col-lg-6">
              <label>`+`<?php echo $attribute->name; ?>`+`</label>
              <input type="text" class="form-control" name="attribute_products[${count}][<?php echo $attribute->id; ?>]" required>
          </div>`+
          <?php } ?>
          `
          <div class="form-group col-lg-6">
              <label>Price</label>
              <input type="number" class="form-control" name="product_details[${count}][price]" required>
          </div>
          <div class="form-group col-lg-6">
              <label>Image</label>
              <br>
                <img id='test${count}' class="view_image" style="max-height: 80px; max-width: 80px; margin-bottom: 10px;" >
                <br>
                <input onchange="document.getElementById('test${count}').src = window.URL.createObjectURL(this.files[0])" class="add_image" type="file" class="form-control" name="product_details[${count}][image]"  required>
          </div>
          <div class="form-group col-lg-6">
              <label>Quantity</label>
              <input type="number" class="form-control" name="product_details[${count}][quantity]" required>
          </div>
          <div class="form-group col-lg-6">
              <label>Description</label>
              <input type="text" class="form-control" name="product_details[${count}][description]" required>
              <input type="text" class="form-control" style="display: none" name="product_details[${count}][id]" >
          </div>
          <div class="col-lg-6">
                                <p class="delete_variant" style="background:green;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">-</p>
                            </div>
      </div>`;
      
      
      $('.append').append(html)
      
      
    });
    $('body').on('click','.delete_variant',function(){
        $(this).parents('.variant').remove();
    })

    function uuidv4() {
        return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }
});



function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }




   
    
</script>