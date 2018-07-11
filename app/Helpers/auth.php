<?php

if(!function_exists('get_permissions')){
    function get_permissions(){
        $user = \Illuminate\Support\Facades\Auth::user();
        $role = $user->role;
        return json_decode($role ? $role->permissions: $user->permissions);
    }
}
if(!function_exists('has_permission')){
    function has_permission($permission){
        $user = \Illuminate\Support\Facades\Auth::user();
        $role = $user->role;
        $permissions =  $role ? $role->permissions: $user->permissions;
        $permissions = json_decode($permissions, true);
        return is_array($permissions) ? array_key_exists($permission, $permissions) : false;
    }
}

