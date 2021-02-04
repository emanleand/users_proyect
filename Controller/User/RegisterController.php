<?php

include_once __DIR__ . '/UserController.php';
include_once __DIR__ . '../../../Model/User/UserModel.php';

class RegisterUser extends UserController 
{
    function __construct()
    {                
        session_start();
        try {
            $user = $this->validate();
            $this->registerUser($user);

            //return json status code 202
        } catch (\Throwable $e) {
            var_dump($e);die();
            // return json status code 400
        }
    }

    /**
     * registerUser
     * @param user
     */
    private function registerUser($user) {//var_dump('doo min');die();
        $db = new UserModel;
        $db->setUser($user);
    }

    /**
     * validate
     */
    private function validate() {

        $field = UserController::REGISTER_USER;
        $data = [];

        foreach ($field as $key => $value) {
            if (!isset($_POST[$value]) || empty($_POST[$value])) {                
                throw new Exception($value . " is requerided", 400);                 
            } else {
                $data[$value] = $_POST[$value];
            }
        }

        if ($data['password'] !== $data['password_repeat']) {
            throw new Exception('los password son distintos', 400);
        }

        return $data;
    }
}

new RegisterUser;