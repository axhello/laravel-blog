<?php

namespace App\Helpers;

class SidebarHelper
{
    public static function is_active($url1, $url2 = null, $url3 = null, $url4 = null)
    {
        return \Request::path() == $url1 || \Request::path() == $url2 || \Request::path() == $url3 || \Request::path() == $url4 ? 'active' : '';
    }

    public static function is_in_active($url1, $url2 = null, $url3 = null, $url4 = null)
    {
        return \Request::path() == $url1 || \Request::path() == $url2 || \Request::path() == $url3 || \Request::path() == $url4 ? 'in' : '';
    }

    public static function active($route)
    {
        return \Request::path() == $route ? "active" : '';
    }

}