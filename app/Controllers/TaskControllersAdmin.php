<?php


namespace App\Controllers;


use App\Core\Request;
use App\Database\fireBase;


class TaskControllersAdmin
{

    public function index(): void
    {

        $this->isAdmin();
        $data = fireBase::get("problems");
        viewAdmin("admin-main", $data);
    }

    private function isAdmin(): void
    {
        if ($_SESSION["Role"] !== "Admin") {
            back();
            exit();
        }
    }



    public function userAddPage(): void
    {
        $this->isAdmin();
        if ($message = Request::get("message")) {
            viewAdmin("admin-user-add", array("message" => $message));
            return;
        }
        if ($message = Request::get("message2")) {
            viewAdmin("admin-user-add", array("message" => $message));
            return;
        }

        viewAdmin("admin-user-add");
    }

    public function creatUser(): void
    {
        $this->isAdmin();
        if ($_POST["Password"] !== $_POST["re-password"]) {
            redirect(home() . "/admin-user-add?message=كلمه المرور غير متطابقه");
            return;
        }
        unset($_POST["re-password"]);
        if (fireBase::count("problems", "Id", $_POST["Id"])) {
            redirect(home() . "/admin-user-add?message2=الرقم الجامعي او البطاقه مستخدم من قبل");
        }
        fireBase::insert("users", $_POST);
        redirect(home() . "/admin-user");
    }


    public function user(): void
    {
        $this->isAdmin();
        $data = fireBase::get("users");
        viewAdmin("admin-user", $data);
    }

    public function request(): void
    {
        $this->isAdmin();
        $data1 = fireBase::get("users");
        $data2 = fireBase::get('problems', "Request_num", "desc");
        $data = array_merge($data1, $data2);
        viewAdmin("admin-request", $data);

    }

    public function delete()
    {
        $this->isAdmin();
        if ($id = Request::get("id")) {
            fireBase::delete("users", "Id", $id);
        }
        back();
    }

    public function adminReport()
    {
        $this->isAdmin();
        viewAdmin("admin-report");
    }

    public function adminStat()
    {
        $this->isAdmin();
        viewAdmin("admin-statastic");
    }

    public function adminUserEdit()
    {
        $this->isAdmin();
        if ($id = Request::get("id")) {
            $user = fireBase::get("users", null, null, "Id", $id);
            viewAdmin("admin-user-edit", $user);
        }

    }

    public function editUser()
    {
        $this->isAdmin();
        if ($id = Request::get("id")) {
            fireBase::update("users", $_POST, "Id", $id);
            redirect(home() . "/admin-user");
        }
    }

    public function show()
    {
        $this->isAdmin();
        if ($id = Request::get("id")) {
            $data1 = fireBase::get("problems", null, null, "Request_num", $id);
            $data2 = fireBase::get("problems/$id/map");
            array_push($data2,["endloop"=> false]);
            $data = array_merge($data2,...$data1);
            if (isset($data)) {
                viewAdmin("admin-show-request", $data);
                return;
            }
        }
        back();
    }
    public function adminFeedBack()
    {
        $this->isAdmin();
        if ($id = Request::get("id")) {
            fireBase::checkTec($id);
            back();
        }
        back();
    }

}


