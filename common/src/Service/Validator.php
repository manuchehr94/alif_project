<?php

class Validator
{
    public static function emailValidate($email) {
        //also we have:
        //filter_var($email, FILTER_VALIDATE_EMAIL)
        $email = htmlspecialchars(stripslashes(strip_tags($email)));
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

         return (bool)preg_match($regex, $email);
    }

    public static function phoneValidate($phone) {

        $phone = htmlspecialchars(stripslashes(strip_tags($phone)));
        $regex = '/^[0-9\+]{1,}[0-9\-]{3,15}$/';

        var_dump((bool)preg_match($regex, $phone));
    }
}