<?php

require_once 'lib/Controller.php';
require_once 'lib/Validation.php';
require_once 'controllers/ErrorController.php';
require_once 'models/UserModel.php';
require_once 'data/UsersJson.php';

class AuthController extends Controller
{
    /**
     * @param UserModel $user
     * @return array
     */
    private function validateUserInfo(UserModel $user): array
    {
        // Receive user values and Validate.
        $errors = [];
        if (!Validation::isUsername($user->getUsername())) {
            $errors[] = Validation::ERROR_USERNAME;
        }

        if (!Validation::isPhoneNumber($user->getPhone())) {
            $errors[] = Validation::ERROR_PHONE;
        }

        if (!Validation::isEmail($user->getEmail())) {
            $errors[] = Validation::ERROR_EMAIL;
        }

        if (!Validation::isValidPassword($user->getPassword())) {
            $errors[] = Validation::ERROR_PASSWORD;
        }

        return $errors;
    }

    /**
     * @param array $validationErrors
     * @return void
     */
    public function createAccountAction(array $validationErrors = []): void
    {
        $this->view->errors = $validationErrors;
        $this->view->render('views/auth/create-account.phtml');
    }

    /**
     * @return void
     */
    public function createAction(): void
    {
        // Receive user values and Validate.
        if (isset($_POST['username'], $_POST['phone'], $_POST['email'], $_POST['password'])
        ) {
            $userInfo = new UserModel(
                $_POST['username'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['password']
            );
            $validationErrors = $this->validateUserInfo($userInfo);
            if (empty($validationErrors)) {
                // Create/Write new user into Users JSON file.
                $jsonScribe = new UsersJson();
                $jsonScribe->update($userInfo);

                header("Location: /Auth/login");
                exit();
            }

            // Go back to the Create Account form, with errors info.
            $this->createAccountAction($validationErrors);
        } else {
            $errorController = new ErrorController();
            $errorController->indexAction(Validation::ERROR_INCOMPLETE_DATA, "");
        }
    }

    /**
     * @param string $flag
     * @return void
     */
    public function loginAction(string $flag = 'default'): void
    {
        $this->view->message = "Hallo!";
        $this->view->render('views/auth/login.phtml');
    }

    /**
     * @return void
     */
    public function authorizeAction(): void
    {
        // Receive user values and Validate.
        if (isset($_POST['username'], $_POST['password'])
        ) {
            $validationErrors = $this->validateUserInfo($userInfo);
            if (empty($validationErrors)) {
                // Create/Write new user into Users JSON file.
                $jsonScribe = new UsersJson();
                $jsonScribe->update($userInfo);

                header("Location: /Auth/login");
                exit();
            }

            // Go back to the Create Account form, with errors info.
            $this->createAccountAction($validationErrors);
        } else {
            $errorController = new ErrorController();
            $errorController->indexAction(Validation::ERROR_INCOMPLETE_DATA, "");
        }
    }
}