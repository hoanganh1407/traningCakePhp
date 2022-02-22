
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
<h2>Id Order : <?= $order->id ?></h2>
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

</div>
</div>

<div class="table-responsive">
<table data-sortable class="table table-hover table-striped">
<thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Variant</th>
        <th>image</th>
        <th>Quantity</th>
    </tr>
</thead>
<tbody>
    <?php foreach($order->order_details as $key=>$value): ?>
    <tr>
    <?php foreach($products as $k=>$v): ?>
    <?php if($v->id == $value->product_detail_id ): ?>
        <td><?= $v->product->name ?></td>
    <?php endif ?>
    <?php endforeach ?>

        <td><?= $value->product_detail->price ?></td>
        <td>
        <?php foreach($attribute_product as $k=>$v): ?>
            <?php if($value->product_detail->id == $v->product_detail_id): ?>
            <?= ($v->attribute->name) ?> : <?= ($v->value) ?>
            <?php endif ?>
        <?php endforeach ?> 
        </td>
        <td><img src="/img/upload/<?= ($value->product_detail->image)?>"  style="max-height: 80px; max-width: 80px; margin-bottom: 10px;" ></td>
        <td><?= ($value->quantity)?></td>
        <td>
            <div class="btn-group btn-group-xs">
                <a data-toggle="tooltip" title="Active User" class="btn btn-default" href=""><i class="fa fa-power-off"></i></a>
                <a data-toggle="tooltip" title="Edit" class="btn btn-default" href=""><i class="fa fa-edit"></i></a>
                <a data-toggle="tooltip" title="Delete" class="btn btn-default" href=""><i class="fa fa-trash-o"></i></a>
            </div>
        </td>
    </tr>
    <?php endforeach ?>

    </tbody>
</table>
</div>

<div class="form-group">
    <p>Shipping Cost: <?= $order->shipping_cost ?></p> 
    <p>Total Price: <?= $order->total_price ?></p> 
</div>
<div class="widget-content padding">
<?= $this->Form->create(null,['type'=>'file']) ?>
        <div class="form-group">
            <label>Status</label>
                <select class="form-control" name="status">
                    <option
                    <?php if($order->status == 0): ?>
                        selected
                    <?php endif ?>
                    value="0">Đang trong giỏ hàng</option>
                    <option 
                    <?php if($order->status == 1): ?>
                        selected
                        <?php endif ?>
                    value="1">Đang giao</option>
                    <option
                    <?php if($order->status == 2): ?>
                        selected
                        <?php endif ?>
                    value="2">Giao Thành công</option>
                    <option 
                    <?php if($order->status == 3): ?>
                        selected
                        <?php endif ?>
                    value="3">Đã Hủy</option>
                </select>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?= $this->Form->end() ?> 
</div>