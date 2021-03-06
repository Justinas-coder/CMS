<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create(){
        
        return view('admin.users.create');
    }

    public function store(Request $request)
    {      
        $request->validate([

            'username'=> ['unique:users,username', 'required', 'string', 'max:255', 'alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['unique:users,email', 'required', 'email', 'max:255'],
            'avatar'=> ['file' ]
        ]);

            $request->avatar = $request->avatar ? $request->avatar->store('images') : '';
        

        User::create([
            'avatar' => $request->avatar,
            'username' => $request->username,
            'name' => $request->name,
            'status' => $request->status ? 1 : 0,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

            
        
        session()->flash('message', 'User '  . $request->name . ' was Created');
        return back();

    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user'=> $user,
            'roles' => Role::all()
        
        ]);
    }

    public function update(User $user)
    {
        // dd(request()->all());
        $inputs = request()->validate([

            'username'=> ['required', 'string', 'max:255', 'alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
            'avatar'=> ['file' ],
            'status'=> ['required']
          
        ]);

        if(request('avatar')){
            Storage::delete($user->avatar);
            $inputs['avatar'] = request('avatar')->store('images');

        }

            $user->update($inputs);

            return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user)
    {
        Storage::delete($user->avatar);

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');

        return back();
    }


}
