<?php

namespace App\Controllers;

use App\Core\Request;
use App\Database\fireBase;


class TaskControllers
{
    public function index(): void
    {
        isUser();
        if ($_SESSION["Role"] === "Admin") {
            redirect(home() . "/admin");
            return;
        }
        view("main");

    }


    public function login(): void
    {

        view("login");

    }

    public function create(): void
    {
        isUser();
    }

    public function update(): void
    {
        if (!$_POST) {
            back();
        }
        $id = Request::get("id");
    }

    public function search(): void
    {
        foreach ($_POST as $key => $item) {
            if($key === "user_id"){
                $_POST[$key] = (int)($item);
            }
            $_POST[$key] = addslashes($item);;

        }

        fireBase::check("users", $_POST);
    }

    public function delete(): void
    {
        session_destroy();
        redirect("login");
    }

}
