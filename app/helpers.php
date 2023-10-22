<?php

use App\App;
use App\Database\QueryBuilder;

function home()
{
    return trim(App::get("config")['app']["home_url"], '/'); // will retrun http://localhost/phptutorialPartTwo
}

function redirect($to)
{
    header("Location: {$to}");   // will take u to $location
}

function redirect_home()
{
    redirect(home());
}

function back()
{
    redirect($_SERVER["HTTP_REFERER"] ?? home());
}

function view($name, $data = [])
{
    if ($data != null) {
        extract($data);
    }
    require "resources/{$name}.view.php";
}
function viewAdmin($name, $data = [])
{
    if ($data != null) {
        extract($data);
    }
    require "resources/admin/{$name}.view.php";
}

function isUser()
{
    if ($_SESSION) {
        return true;
    } else {
        redirect("http://localhost/fixit/login");
    }
}

function isStudent()
{
    if ($_SESSION["Role"] === "Student") {
        return true;
    } else {
        return false;
    }
}

function isTechnical(): bool
{

    if ($_SESSION["Role"] !== "Student" && $_SESSION["Role"] !== "Admin" ) {
        return true;
    } else {
        return false;
    }
}


$itRain = true;
$message = $itRain ? "yeah its rain":"Not rain";

