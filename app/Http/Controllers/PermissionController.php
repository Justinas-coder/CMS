<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //

    public function index()
    {
        return view('admin.permissions.index', [
            'permissions'=>Permission::All()
        ]);
    }

    public function store()
    {
        request()->validate([
            'name'=> ['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission)
    {
        $permission->name = STR::ucfirst(request('name'));
        $permission->SLUG = STR::of(request('name'))->slug('-');

        if($permission->isDirty('name')){

            session()->flash('permission-updated', 'Permission Updated: '.  request('name'));

            $permission->save();
            
        } else {

            session()->flash('permission-updated', 'Nothing has been updated');
        }

        $permission->save();

        

        return back();

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back();
    }

}
