<?php include_once __DIR__ . "/../header.php"?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hot Deals Description</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hot Deals Description</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Description Id</th>
                            <th scope="col">First Offer</th>
                            <th scope="col">Second Offer</th>
                            <th scope="col">Third Offer</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allHotDealsDesc as $hotDeals): ?>
                            <tr>
                                <td><?=$hotDeals['id']?></td>
                                <td><?=$hotDeals['description_id']?></td>
                                <td><?=$hotDeals['first_offer']?></td>
                                <td><?=$hotDeals['second_offer']?></td>
                                <td><?=$hotDeals['third_offer']?></td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="/?model=hotDealDescription&action=update&id=<?=$hotDeals['id']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/?model=hotDealDescription&action=delete&id=<?=$hotDeals['id']?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php include_once __DIR__ . "/../footer.php"?>