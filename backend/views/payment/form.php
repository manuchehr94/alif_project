<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Payment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=payment&action=save" method="post" enctype="multipart/form-data">
               <div class="card-body">
                   <input value="<?=$onePayment['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Title</label>
                       <div class="col-sm-10">
                           <input value="<?=$onePayment['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <input value="<?=$onePayment['code'] ?? "" ?>" type="text" name ="code" class="form-control">
                        </div>
                    </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Priority</label>
                       <div class="col-sm-10">
                           <input value="<?=$onePayment['priority'] ?? "" ?>" type="number" name ="priority" class="form-control">
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