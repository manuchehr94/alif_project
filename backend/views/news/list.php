<?php include_once __DIR__ . "/../header.php"?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>News</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">News</li>
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
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Created</th>
                            <th style="text-align: right;" scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allNews as $news): ?>
                            <tr>
                                <td><?=$news['id']?></td>
                                <td><?=$news['title']?></td>
                                <td><?=$news['content']?></td>
                                <td><?=$news['created']?></td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="/?model=news&action=update&id=<?=$news['id']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/?model=news&action=delete&id=<?=$news['id']?>">
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