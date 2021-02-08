<?php

include_once __DIR__ . '/UserController.php';
include_once __DIR__ . '../../../Model/User/UserModel.php';

/**
 * Class RegisterController 
 */
class RegisterController extends UserController
{
    function __construct()
    {
        session_start();
        $this->registerUserAction();
    }

    /**
     * This registers a new account.
     * 
     */
    private function registerUserAction()
    {
        try {
            $input = json_decode(file_get_contents('php://input'), 1);
            $error = $this->validate($input);

            if (!empty($error)) {
                $this->createResponseFailer(400, 'BadRequest');
            }

            if ($input['password'] !== $input['password_repeat']) {
                $this->createResponseFailer(400, 'BadRequest');
            }

            $db = new UserModel;
            $db->setUser($input);

            $this->createResponseSuccess(['message' => 'success']);
        } catch (Exception $e) {
            $this->createResponseFailer(409, 'Conflict');
        } catch (Throwable $e) {
            $this->createResponseFailer(409, 'Conflict');
        }
    }
}

new RegisterController;
