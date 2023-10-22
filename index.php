<?php

require "_init.php";

use App\Controllers\TaskControllers;
use App\Controllers\TaskControllersRequest;
use App\Core\Request;
use App\Core\Router;
use App\Controllers\TaskControllersAdmin;



Router::make()
    ->get('', [TaskControllers::class, "login"])
    ->get('login', [TaskControllers::class, "login"])
    ->get("logout",[TaskControllers::class,"delete"])
    ->post("search", [TaskControllers::class, "search"])
    ->get('admin',[TaskControllersAdmin::class,"index"])
    ->get('admin-user-add',[TaskControllersAdmin::class,"userAddPage"])
    ->get('admin-request',[TaskControllersAdmin::class,"request"])
    ->get('admin-user',[TaskControllersAdmin::class,"user"])
    ->get('admin-user-edit',[TaskControllersAdmin::class,"adminUserEdit"])
    ->post("admin/editUser",[TaskControllersAdmin::class, "editUser"])
    ->post("admin/addUser",[TaskControllersAdmin::class, "creatUser"])
    ->get("admin/user/delete",[TaskControllersAdmin::class,"delete"])
    ->get('', [TaskControllers::class, "index"])
    ->get('request', [TaskControllersRequest::class, "index"])
    ->get('addrequest', [TaskControllersRequest::class, "insert"])
    ->get("logout",[TaskControllers::class,"delete"])
    ->post("request/create",[TaskControllersRequest::class,"create"])
    ->post("tecFeedback/request",[TaskControllersRequest::class,"tecFeedback"])
    ->get("complete/request",[TaskControllersRequest::class,"requestCompleted"])
    ->post("update/request",[TaskControllersRequest::class,"update"])
    ->get("delete/request",[TaskControllersRequest::class,"delete"])
    ->get("client/search",[TaskControllers::class,"search"])
    ->get("admin-show-request",[TaskControllersAdmin::class,"show"])
    ->post("admin/feedback",[TaskControllersAdmin::class,"adminFeedBack"])
    ->get("show-request-tec",[TaskControllersRequest::class,"showTec"])
    ->post("create",[TaskControllers::class, "create"])
    ->post("search",[TaskControllers::class, "search"])
    ->resolve(Request::uri(), Request::method());


