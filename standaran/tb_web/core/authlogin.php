<?php

function cek_login()
{
    if (!isset($_SESSION['login'])) {
        return false;
    } else {
        return true;
    }
}
function after_login()
{
    if (isset($_SESSION['login'])) {
        return true;
    } else {
        return false;
    }
}
