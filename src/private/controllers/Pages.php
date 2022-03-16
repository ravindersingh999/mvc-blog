<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        // $this->userModel=$this->model('Users');
    }

    public function index()
    {
        die("home page");
    }

    public function login()
    {
        global $settings;
        // $postdata = $_POST ?? array();
        
        // $user = $this->model('Users')::find_by_username('admin');

        // if ($user->user_id) {
        //     $_SESSION['userdata'] = array(
        //         'user_id'=>$user->user_id,
        //         'username'=>$user->username,
        //         'email'=>$user->email);
            
        //     header("Location: /public/admin/dashboard");
        // }
        if (isset($_POST['login'])) {
            if ($this->model('Users')::find_by_email($_POST['email'])) {
                $row = $this->model('Users')::find_by_email($_POST['email']);
                if ($row->password == $_POST['password']) {
                    // var_dump($row);
                    if ($row->role == "admin") {
                        header("location:".$settings['siteurl']."/admin/dashboard");
                    } else {
                        if ($row->status == "approved") {
                            header('location:'.$settings["siteurl"].'/pages/user/profile');
                        } else {
                            echo "Application not approved yet";
                        }
                    }

                } else {
                    echo "Wrong password";
                }
            } else {
                echo "Please sign up first";
            }
        }
        $this->view('pages/login/header');
        $this->view('pages/login/main');
        $this->view('pages/login/footer');
    }

    public function register()
    {
        $postdata = $_POST ?? array();
        if (isset($postdata['username']) && isset($postdata['name']) && isset($postdata['email']) && isset($postdata['password'])) {
            $user = $this->model('Users');
            $user->username = $postdata['username'];
            $user->name = $postdata['name'];
            $user->email = $postdata['email'];
            $user->password = $postdata['password'];
            // $user->status = "pending";
             
            if (empty($user->username) || empty($user->name) || empty($user->email) || empty($user->password)) {
                $_SESSION['msg'] = "**Please fill all details";
            } else {
                $user->save();
            }
        }

        $data['users'] = $this->model('Users')::all();
        $this->view('pages/register/header');
        $this->view('pages/register/main', $data);
        $this->view('pages/register/footer');
    }

    public function user()
    {
        $this->view('pages/user/profile');
    }
}
