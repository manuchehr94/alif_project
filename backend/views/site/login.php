<?php
    include_once __DIR__ . "/../header.php";
?>

<style>
    .login-box {
        margin: auto;
    }

    .footer {
        background: #fff;
        padding: 10px;
        width: 100%;
    }
</style>
<section class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/?model=auth&action=check" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="form-of-login" action="/?model=auth&action=check" method="POST">                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="login">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" value="login">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<?php
    include_once __DIR__ . "/../footer.php";
?>





