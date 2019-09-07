<?php

class UsersController extends Controller {

    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function login() {
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //init data
            $data = [
                'username' => trim(htmlspecialchars($_POST['username'])),
                'password' => hash("md5", $_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];

            //validate username
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            //validate password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            //check for user/username
            if($this->userModel->findUserByUsername($data['username'])) {
                // user found
                // header("Location: ../admin/dashboard");
            } else {

                $data['username_err'] = 'User not found!';
                $this->loadView('Users/login', $data);
            }

            // make sure error are mepty
            if(empty($data['username_err']) && empty($data['password_err'])) {
               // Check and set logged in user
               $loggedInUser = $this->userModel->login($data['username'], $data['password']);

               if($loggedInUser) {
                   // Create Session
                   $this->createUserSession($loggedInUser);
               } else {
                   $data['password_err'] = 'Incorrect password!';
                   $this->loadView('Users/login', $data);
               }
            } else {
                //load view with errors
                // die('failure');
            }

        } else {
            $data = [
                'username'      => '',
                'password'      => '',
                'username_err'  => '',
                'password_err'  => ''
            ];
            //load view
            $this->loadView('Users/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id']        = $user->id;
        $_SESSION['user_username']  = $user->username;
        $_SESSION['user_password']  = $user->password;
        $_SESSION['user_status']    = $user->status_id_status;
        $_SESSION['user_name']      = $user->pname;

        switch ($_SESSION['user_status']) {
            case 1:
                header("Location: ../Admin/dashboard_admin");
                break;
            case 2:
                header("Location: ../Headmaster/headmaster_dashboard");
                break;
            case 3:
                header("Location: ../Teacher/teachers_dashboard");
                break;
            case 4:
                header("Location: ../Parents/dashboard_parent");
                break;
        }

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        unset($_SESSION['user_password']);
        session_destroy();
        header("Location: login");
    }

}