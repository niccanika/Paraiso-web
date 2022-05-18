<?php
session_start();

header("location:/views/login-form.php");

session_destroy();