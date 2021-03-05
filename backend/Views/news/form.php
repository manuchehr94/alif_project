<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create News</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=news&action=save" method="post" enctype="multipart/form-data">
               <div class="card-body">
                   <input value="<?=$oneNews['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Title</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneNews['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneNews['content'] ?? "" ?>" type="text" name ="content" class="form-control">
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