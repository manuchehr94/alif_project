<?php
include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class AuthController
{
    /**
     * @var SecurityService
     */
    private $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    /**
     * @throws Exception
     */
    public function check()
    {
        //TODO remote to service
        $email = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $user = (new User())->getByEmail($email);

        if(!$this->securityService->checkPassword($user, $password)) {
            throw new Exception("Incorrect login or password", 403);
        }

        UserService::saveUserData([
            'id' => $user['id'],
            'login' => $user['email'],
            'role' => json_decode($user['roles'], true)
        ]);

        SecurityService::redirectToStarterPage();
    }

    public function logout() {
        UserService::clear();

        SecurityService::redirectToLoginPage();
    }
}