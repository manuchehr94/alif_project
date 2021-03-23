<?php include_once __DIR__ . "/../header.php"?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                            <th scope="col">User Id</th>
                            <th scope="col">Total</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Delivery</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                            <th style="text-align: right;" scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allNews as $news): ?>
                            <tr>
                                <td><?=$news['id']?></td>
                                <td><?=$news['user_id']?></td>
                                <td><?=$news['total']?></td>
                                <td><?=$news['payment_id']?></td>
                                <td><?=$news['delivery_id']?></td>
                                <td><?=$news['name']?></td>
                                <td><?=$news['phone']?></td>
                                <td><?=$news['email']?></td>
                                <td><?=$news['status']?></td>
                                <td><?=$news['created']?></td>
                                <td><?=$news['updated']?></td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="/?model=order&action=update&id=<?=$news['id']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
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