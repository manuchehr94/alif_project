<?php include_once __DIR__ . "/../header.php"?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hot Deals</h1>
                        <h5>!!!PRODUCT WITH "To main Page" that equals to 1 will go to the main page!!!</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hot Deals</li>
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
                            <th scope="col">To main page</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description Id</th>
                            <th scope="col">Content</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sale</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allHotDeals as $hotDeals): ?>
                            <tr>
                                <td><?=$hotDeals['id']?></td>
                                <td><?=$hotDeals['to_main_page']?></td>
                                <td><?=$hotDeals['title']?></td>
                                <td><?=$hotDeals['description_id']?></td>
                                <td><?=$hotDeals['content']?></td>
                                <td><?=$hotDeals['price']?></td>
                                <td><?=($hotDeals['sale'] <= 90 ? $hotDeals['sale'] : 0)?></td>
                                <td class="project-actions text-right">
                                  <!--<a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>-->
                                    <a class="btn btn-info btn-sm" href="/?model=hotDeal&action=update&id=<?=$hotDeals['id']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/?model=hotDeal&action=delete&id=<?=$hotDeals['id']?>">
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