<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=product&action=save" method="post" enctype="multipart/form-data">
               <div class="card-body">
                   <input value="<?=$oneProduct['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Title</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneProduct['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input type ="file" name = "picture" class="form-control">
                            <?php
                                if(!empty($oneProduct['picture'])){
                                    ?><img src="http://localhost/php/Alif_Academy_php/shop/uploads/products/<?=$oneProduct['picture'] ?>" style="width: 70px;"><?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneProduct['preview'] ?? "" ?>" type="text" name ="preview" class="form-control"><div class="col-sm-10"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneProduct['price'] ?? "" ?>" type="number" name ="price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneProduct['status'] ?? "" ?>" type="number" name ="status" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content"><?=$oneProduct['content'] ?? ''?></textarea>
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