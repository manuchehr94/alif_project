<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Hot Deal Description</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Hot Deal Description</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card card-info">
            <form class="form-horizontal" action="/?model=hotDealDescription&action=save" method="post">
               <div class="card-body">
                   <input value="<?=$oneHotDealDescription['id'] ?? "" ?>" type = "hidden" name ="id">
                   <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Description Id</label>
                       <div class="col-sm-10">
                           <input value="<?=$oneHotDealDescription['description_id'] ?? "" ?>" type ="number" name = "description_id" class="form-control">
                       </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">First Offer</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneHotDealDescription['first_offer'] ?? "" ?>" type="text" name ="first_offer" class="form-control"><div class="col-sm-10"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Second Offer</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneHotDealDescription['second_offer'] ?? "" ?>" type="text" name ="second_offer" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Third Offer</label>
                        <div class="col-sm-10">
                            <input value="<?=$oneHotDealDescription['third_offer'] ?? "" ?>" type="text" name ="third_offer" class="form-control">
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