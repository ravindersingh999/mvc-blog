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

    public function admin()
    {
        $users = $this->model('Users')::all();

        // echo $users[0]->email;
        $this->view('pages/admin/profile', $users);
    }
    public function blog()
    {
        $blog = $this->model('Blogs')::all();
        
        $this->view('pages/blog', $blog);
    }

    public function login()
    {
        global $settings;
        if (isset($_POST['login'])) {
            if ($this->model('Users')::find_by_email($_POST['email'])) {
                $row = $this->model('Users')::find_by_email($_POST['email']);
                if ($row->password == $_POST['password']) {
                    // var_dump($row);
                    if ($row->role == "admin") {
                        header('location:' . $settings["siteurl"] . '/pages/admin');
                    } else {
                        if ($row->status == "approved") {
                            header('location:' . $settings["siteurl"] . '/pages/user');
                        } else {
                            $_SESSION['msg'] = "**Application not approved yet";
                        }
                    }
                } else {
                    $_SESSION['msg'] = "**Wrong password";
                }
            } else {
                $_SESSION['msg'] = "**Please fill deltais";
            }
        }
        $this->view('pages/login/header');
        $this->view('pages/login/main');
        $this->view('pages/login/footer');
    }

    public function register()
    {
        global $settings;
        $postdata = $_POST ?? array();
        if (isset($_POST['register'])) {
            if (isset($postdata['username']) && isset($postdata['name']) && isset($postdata['email']) && isset($postdata['password'])) {
                $row = $this->model('Users')::find_by_email($_POST['email']);
                $user = $this->model('Users');
                $user->username = $postdata['username'];
                $user->name = $postdata['name'];
                $user->email = $postdata['email'];
                $user->password = $postdata['password'];
                $user->role = "user";
                $user->status = "pending";
                if (empty($user->username) || empty($user->name) || empty($user->email) || empty($user->password)) {
                    $_SESSION['msg'] = "**Please fill all details";
                } elseif ($this->model('Users')::find_by_email($_POST['email'])) {
                    $_SESSION['msg'] = "**Email already exists";
                } else {
                    $user->save();
                    header('location:'.$settings["siteurl"].'/pages/login');
                }
            }
        }

        $data['users'] = $this->model('Users')::all();
        $this->view('pages/register/header');
        $this->view('pages/register/main', $data);
        $this->view('pages/register/footer');
    }

    public function user()
    {
        $blogs = $this->model('Blogs')::all();

        // echo $blogs[1]->content;
        $this->view('pages/user/profile', $blogs);
    }

    public function status()
    {
        global $settings;
        if (isset($_POST['change'])) {
            if ($this->model('Users')::find_by_user_id($_POST['id'])) {
                $row = $this->model('Users')::find_by_user_id($_POST['id']);
                // $user = $this->model('Users');
                // print_r($row);
                if ($row->status == "pending") {
                    $row->status = "approved";
                    // print_r($row->status);
                } else {
                    $row->status = "pending";
                    // print_r($row->status);
                }
            }
            $row->save();
            header('location:' . $settings["siteurl"] . '/pages/admin');
        }
        if (isset($_POST['delete'])) {
            if ($this->model('Users')::find_by_user_id($_POST['id'])) {
                $row = $this->model('Users')::find_by_user_id($_POST['id']);

                $row->delete();
                header('location:' . $settings["siteurl"] . '/pages/admin');
            }
        }
        $this->view('' . $settings["siteurl"] . '/pages/admin');
    }

    public function addBlog()
    {
        $postdata = $_POST ?? array();
        if (isset($postdata['title']) && isset($postdata['content'])) {
            $blog = $this->model('Blogs');
            $blog->title = $postdata['title'];
            $blog->content = $postdata['content'];
            $blog->save();
        }
        $this->view('pages/addBlog');
    }
    public function editBlog()
    {
        $blog = "";
        if (isset($_POST['edit'])) {
            $blog = $this->model('Blogs')::find_by_blog_id($_POST['id']);
            // echo '<pre>';
            // print_r($blog);
            // echo '</pre>';
        }
        $this->view('pages/editBlog', $blog);
    }

    public function update()
    {
        global $settings;
        if (isset($_POST['update'])) {
            $row = $this->model('Blogs')::find_by_blog_id($_POST['id']);
            // print_r($row);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $row->title = $title;
            $row->content = $content;

            $row->save();

            header('location:'.$settings['siteurl'].'/pages/user');
        }
    }

    public function deleteBlog()
    {
        global $settings;
        if (isset($_POST['delete'])) {
            if ($this->model('Blogs')::find_by_blog_id($_POST['id'])) {
                $row = $this->model('Blogs')::find_by_blog_id($_POST['id']);
                $row->delete();
            
            }
            header('location:'.$settings['siteurl'].'/pages/blog');
        }
    }
}
