<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Hot Deal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Hot Deal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=hotDeal&action=save" method="post">
               <div class="card-body">
                   <input value="<?=$oneHotDeal['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">To main Page</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneHotDeal['to_main_page'] ?? 0 ?>" type ="number" name = "to_main_page" class="form-control">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Title</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneHotDeal['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Description Id</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneHotDeal['description_id'] ?? "" ?>" type ="number" name = "description_id" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneHotDeal['content'] ?? "" ?>" type="text" name ="content" class="form-control"><div class="col-sm-10"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneHotDeal['price'] ?? "" ?>" type="number" name ="price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sale</label>
                        <div class="col-sm-10">
                            <input value="<?=($oneHotDeal['sale'] <= 90) ? $oneHotDeal['sale'] : 0 ?>" type="number" name ="sale" class="form-control">
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