<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Admin extends Controller
{
    public function __construct()
    {
        //empty func
    }

    public function index()
    {
        die("admin home page");
    }

    public function dashboard()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id'])) {
            header("Location: /public/pages/login");
        }
        $join = ' JOIN users u ON(posts.post_user_id = u.user_id)';
        $data['posts'] = $this->model('Posts')::find_by_sql("SELECT 
        `posts`.*,`u`.`username` 
        FROM 
        `posts` JOIN `users` u 
        ON(posts.post_user_id = u.user_id)");
        //var_dump($this->model('Posts')::connection()->last_query);
        $this->view('pages/admin/dashboard/header');
        $this->view('pages/admin/dashboard/nav');
        $this->view('pages/admin/dashboard/main', $data);
        $this->view('pages/admin/dashboard/footer');
    }
}
