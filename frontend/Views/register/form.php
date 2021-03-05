<?php
    include_once __DIR__ . "/../header.php";
?>

    <section class="detailsOFProduct">
        <div class="wrapper">
            <h3 class="h-of-forms">Register</h3>
            <form class="form-of-login" action="/?model=register&action=register" method="POST">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Phone:</label>
                    <input type="text" name="phone">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label>Password (repeat):</label>
                    <input type="password" name="password_repeat">
                </div>
                <div>
                    <input type="submit" value="register">
                </div>
            </form>
        </div>
    </section>




<?php
    include_once __DIR__ . "/../footer.php";
?>