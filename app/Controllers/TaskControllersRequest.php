<?php

namespace App\Controllers;

use App\Core\Request;
use App\Database\fireBase;


class TaskControllersRequest
{
    public function index(): void
    {
        isUser();
        if (isStudent()) {
            $data = fireBase::get('problems', "Request_num", "desc", "SenderId", $_SESSION["ID"]);
            view("request", $data);
            return;
        }
        if (isTechnical()) {
            $data1 = fireBase::get('users', "Name");
            $data2 = fireBase::get('problems', "Request_num", "desc", null, $_SESSION["name"]);

            $data = array_merge($data1, $data2);
            view("request-tech", $data);
            return;
        }
        back();
    }

    public function create(): void
    {
        isUser();
        $_POST["Sender"] = $_SESSION['name'];
        $_POST["SenderId"] = $_SESSION['ID'];
        $_POST["SenderIdNum"] = $_SESSION["IdNum"];
        $_POST["Date"] = date("F j, Y, g:i a", time());
        $_POST["Request_num"] = (string)(time() * 1000);
        $_POST["Status"] = "جار";
        $_POST["imgUrl"] = null;
        $_POST["Technical"] = null;
        $_POST["TechnicalId"] = null;
        $_POST["Track"] = null;
        $_POST["fixTime"] = null;
        $_POST = self::addNull();


        fireBase::insert("problems", $_POST);
        if ($_SESSION["Role"] === "Admin") {
            redirect(home() . "/admin-request");
            return;
        }
        redirect(home() . "/request");

    }

    private static function addNull(): array
    {
        $data = array_map(function ($item) {
            if ($item === "") {
                return $item = null;
            } else {
                return $item;
            }
        }, $_POST);

        return $data;
    }

    public function update(): void
    {
        isUser();
        $_POST = self::addNull();
        if ($id = Request::get("id")) {
            fireBase::update("problems", $_POST, "Request_num", $id);
        }
        back();
    }

    public function insert(): void
    {
        isUser();
        view("addrequest");
    }

    public function delete(): void
    {
        isUser();
        if (isTechnical()) {
            back();
            return;
        }
        if ($id = Request::get("id")) {
            fireBase::delete("problems", "Request_num", $id);
        }
        back();
    }

    public function requestCompleted(): void
    {
        $id = Request::get("id");
        $request_status = array("Status" => Request::get("Status"));
        if ($id && $request_status) {
            fireBase::update("problems", $request_status, "Request_num", $id);
        }
        back();
    }

    public function showTec(): void
    {
        if ($id = Request::get("id")) {
            $data = fireBase::get("problems", null, null, "Request_num", $id);
            $data2 = fireBase::get("problems/$id/adminChat");
            print_r($data2);
            $data = array_merge($data2, ...$data);
            if (isset($data)) {
                view("show-request-tec", $data);
                return;
            }
        }
        back();
    }

    public function tecFeedback(): void
    {
        if ($id = Request::get("id")) {
            fireBase::checkTec($id);
            back();
        }
        back();
    }

}

