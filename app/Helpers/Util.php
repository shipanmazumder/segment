<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

if (!function_exists('setMessage')) {

    function setMessage($key, $class, $message)
    {
        session()->flash($key, $message);
        session()->flash("class", $class);
        // session()->flash($key,'<div class="alert alert-'.$class.'">'.$message.'</div>');
        return true;
    }
    if (!function_exists('active_link')) {

        function set_Topmenu($top_menu_name)
        {
            $session_top_menu = session('top_menu');
            if ($session_top_menu == $top_menu_name) {
                return 'active';
            }
            return "";
        }

        function set_Submenu($sub_menu_name)
        {
            $session_sub_menu = session('sub_menu');
            if ($session_sub_menu == $sub_menu_name) {
                return 'active';
            }
            return "";
        }
    }
}
