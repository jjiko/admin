<?php

namespace Jiko\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Jiko\Auth\Permission;
use Jiko\Auth\Role;
use Jiko\Auth\User;

class UserPageController extends AdminController
{
  protected $layout = 'admin::layouts.default';

  public function index(Request $request)
  {
    return $this->content('admin::user.index');
  }

  public function roles()
  {
    return $this->content('admin::user.roles');
  }

  public function storeRole(Request $request)
  {
    $role = new Role;
    $role->name = $request->input('name');
    $role->display_name = $request->input('display_name');
    $role->description = $request->input('description');
    $role->save();

    return redirect(route('role_permissions', [$role->id]));
  }

  public function updateRole(Request $request)
  {
    // @todo
    return redirect(route('roles'));
  }

  public function userShowRoles($user)
  {
//    if(auth()->user()->hasRole(['jiko','admin'])) {
    return $this->content('admin::user.role', ['role_user' => User::find($user)]);
  }

  public function showRolePermissions($id)
  {
    return $this->content('admin::user.role-permissions', ['role' => Role::find($id)]);
  }

  public function updateRolePermissions($id)
  {
    $role = Role::find($id);
//    if (!$role->name == "jiko") {
    $perms_ids = request()->input('perms');
    $role->perms()->detach();
    $role->perms()->attach($perms_ids);
//    }

    return redirect(route('role_permissions', [$id]));
  }

  public function userUpdateRoles($id)
  {
    $role_ids = request()->input('roles');

    // don't allow the jiko role to be set
    $jiko = Role::where('name', 'jiko')->first();
    $key = array_search($jiko->id, $role_ids);
    if (false !== $key) {
      unset($role_ids[$key]);
    }

    //if (auth()->user()->can('manage-users')) {
    $user = User::find($id);

    if ($user->hasRole('jiko')) {
      $user->roles()->detach();
      // add jiko back
      $user->attachRole($jiko);
    } else {
      $user->roles()->detach();
    }

    // continue
    $user->roles()->attach($role_ids);

    $message = 'Request complete.';
//    } else {
//      $message = 'Nope.';
//    }

    return redirect(route('user_roles', [$user->id]))->with('message', $message);
  }

  public function permissions()
  {
    return $this->content('admin::user.permissions');
  }

  public function storePermission(Request $request)
  {
    $perm = new Permission;
    $perm->name = $request->input('name');
    $perm->display_name = $request->input('display_name');
    $perm->description = $request->input('description');
    $perm->save();

    return redirect(route('permissions'));
  }
}
