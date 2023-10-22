<?php

use App\App;
use App\Database\fireBase;

session_start();

require "vendor/autoload.php";

App::set("config", require "config.php");


$config = App::get("config")["firebase"];
fireBase::setup_client_create($config["projectId"], $config["jsonFile"] );








