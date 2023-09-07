<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (after_login() == true) {
    redirect("http://localhost/tb_web/page/index.php");
} else {
    View('template/login');
}
