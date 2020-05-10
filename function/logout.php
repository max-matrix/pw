<?php
require_once("../function/config.php");
session_destroy();

header("Location:../index.php");