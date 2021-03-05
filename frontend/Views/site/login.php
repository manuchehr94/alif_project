<?php
    include_once __DIR__ . "/../header.php";
?>

    <section class="detailsOFProduct">
        <div class="wrapper">
            <h3 class="h-of-forms">Login</h3>
            <form class="form-of-login" action="/?model=auth&action=check" method="POST">
                <div>
                    <label>Login:</label>
                    <input type="text" name="login">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input type="submit" value="login">
                </div>
            </form>
            <form class="form-of-login" action="/?model=register&action=form" method="POST">
                Don't have an account? Please
                <input type="submit" value="Register">
            </form>
        </div>
    </section>




<?php
    include_once __DIR__ . "/../footer.php";
?>