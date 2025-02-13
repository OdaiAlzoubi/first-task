<?php


if (!function_exists('is_active_route')) {
    function is_active_route($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (!function_exists('is_active_parent_route')) {
    function is_active_parent_route($route)
    {
        return request()->routeIs($route) ? 'hover show' : '';
    }
}
