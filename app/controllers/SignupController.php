<?php

use Phalcon\Security;
use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function indexAction()
    {

    }
    
    public function registerAction()
    {
        $user = new Users();
        $email = $this->request->getPost('email');

        if($this->request->isPost())
        {
            $exist = Users::findFirst(     // Nyari user berdasar Email yang diinput
                [
                    'conditions' => 'email = :email:',
                    'bind'       => [
                        'email' => $email,
                    ],
                ]
            );
    
            if($exist)
            {
                // $this->view->message = "<div class='alert alert-danger'> Email already used, please use a new one! </div>";
                $success = false;
                header("refresh:2;url=/signup");
                echo "<div class='alert alert-danger'> Email already used, please use a new one! </div>";
                // exit;
                
            } else
            {
                $dataSent = $this->request->getPost();

                $security = new Security();
                
                $hashed = $security->hash($dataSent["password"]);
                $user->name = $dataSent["name"];
                $user->email = $dataSent["email"];
                $user->password = $hashed;
                $user->address = $dataSent["address"];
                $user->phone = $dataSent["phone"];
    
                $success = $user->save();
            }
        }
        if (!$success) {
            // if ($success) {
            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo "<div class='alert alert-danger'>", $message->getMessage(), "</div>";
            }
            header("refresh:2;url=/signup");
        } else {
            echo "<div class='alert alert-success'> Sign up successful! </div>";
            header("refresh:2;url=/user/loginpage");
        }
        // $this->view->message = $message;
        // $this->view->disable();
    }
}