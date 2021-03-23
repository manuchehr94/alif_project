<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Access</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Access</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=category&action=save" method="post">
               <div class="card-body">
                   <input value="<?=$oneCategory['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Title</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneCategory['title'] ?? "" ?>" type ="text" name = "title" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Group id</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneCategory['group_id'] ?? "" ?>" type="number" name ="group_id" class="form-control"><div class="col-sm-10"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Parent id</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneCategory['parent_id'] ?? "" ?>" type="number" name ="parent_id" class="form-control">
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