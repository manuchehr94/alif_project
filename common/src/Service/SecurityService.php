<?php

    include_once __DIR__ . "/UserService.php";

class SecurityService
{
    /**
     * @param $user
     * @param $password
     * @return bool
     * @throws Exception
     */
    public function checkPassword($user, $password)
    {
        if(empty($user)) {
            throw new Exception("User wasn't found", 404);
        }

        if(UserService::encodePassword($password) !== $user['password']) {
            //TODO SECURITY
            throw new Exception("Incorrect password", 400);
        }
        return true;
    }

    public static function redirectToStarterPage()
    {
        header("Location: /");
        die();
    }

    public static function redirectToLoginPage()
    {
        header("Location: /?model=site&action=login");
        die();
    }

    public static function isAuthorized()
    {
        if(empty(UserService::getCurrentUser())) return false;

        return true;
    }

    public static function getPermissionNameByControllerAndAction($controller, $action)
    {
        return strtoupper($controller) . "_" . strtoupper($action);
    }
}