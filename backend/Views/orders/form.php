<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=order&action=update" method="post" enctype="multipart/form-data">
               <div class="card-body">
                   <input value="<?=$oneNews['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">User Id</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['user_id'] ?? "" ?>" type ="text" name = "user_id" class="form-control" readonly>
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneNews['total'] ?? "" ?>" type="text" name ="total" class="form-control" readonly>
                        </div>
                    </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Delivery</label>
                       <div class="col-sm-10">
                           <select name="delivery">
                               <option disabled selected></option>
                               <option value="1" <?=($oneNews['delivery_id'] ?? null == '1') ? 'selected' : '' ?>>Delivery 1</option>
                               <option value="2" <?=($oneNews['delivery_id'] ?? null == '2') ? 'selected' : '' ?>>Delivery 2</option>
                               <option value="3" <?=($oneNews['delivery_id'] ?? null == '3') ? 'selected' : '' ?>>Delivery 3</option>
                           </select>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Payment</label>
                       <div class="col-sm-10">
                           <select name="payment">
                               <option disabled selected></option>
                               <option value="1" <?=($oneNews['payment_id'] ?? null == '1') ? 'selected' : '' ?>>Payment 1</option>
                               <option value="2" <?=($oneNews['payment_id'] ?? null == '2') ? 'selected' : '' ?>>Payment 2</option>
                               <option value="3" <?=($oneNews['payment_id'] ?? null == '3') ? 'selected' : '' ?>>Payment 3</option>
                           </select>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Comment</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['comment'] ?? "" ?>" type="text" name ="comment" class="form-control" readonly>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Phone</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['phone'] ?? "" ?>" type="text" name ="phone" class="form-control">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Email</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['email'] ?? "" ?>" type="text" name ="email" class="form-control">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Name</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['name'] ?? "" ?>" type="text" name ="name" class="form-control">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Status</label>
                       <div class="col-sm-10">
                           <select name="status">
                               <option disabled selected></option>
                               <?php foreach (OrderService::getStatuses() as $key => $label) : ?>
                                    <option value="<?=$key?>"
                                        <?=($oneNews['status'] ?? null == $key) ? 'selected' : '' ?>><?=$label?>
                                    </option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Created</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['created'] ?? "" ?>" type="text" name ="created" class="form-control" readonly>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Updated</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['updated'] ?? "" ?>" type="text" name ="updated" class="form-control" readonly>
                       </div>
                   </div>
                    <div class="form-group row">
                        <input type ="submit" name = "submit" class="btn btn-success" value="Save">
                    </div>
               </div>
            </form>
        </div>
    </section>
</div>
<?php
    include_once __DIR__ . "/../footer.php";
?>