<?php

$config = $_SERVER["HTTP_HOST"] == "localhost" ? parse_ini_file(__DIR__."/../development.ini",true) : parse_ini_file(__DIR__."/../production.ini",true);

error_reporting($config["ERRORS"]["types"]);
ini_set("display_errors",$config["ERRORS"]["display"]);

date_default_timezone_set($config["TIMEZONE"]["zone"]);