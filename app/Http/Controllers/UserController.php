<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //return login page
    public function login() {
        return view('users.login');
    }

    //validate user login
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    //logout
    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }

    //show all users
    public function index() {
        if(Gate::allows('is-supervisor') || Gate::allows('is-admin')) { 
            $users = User::all();

            return view('users.index', [
                'users' => $users
            ]);
        }
        
    }

    //show profile of logged in user page
    public function show() {
        return view('users.show', [
            'user' => Auth::user()
        ]);
    }

    //show create user page
    public function create() {
        if(Gate::allows('is-supervisor')) {
            return view('users.create');
        }
    }

    //create spesific user
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $user->save();
        
        return redirect('/users')->with('success', 'Create User Success');
    }

    //show edit spesific user page
    public function edit(User $user) {
        if(Gate::allows('is-supervisor')) {
            return view('users.edit', [
                'user' => $user
            ]);
        }
    }

    //update spesific user
    public function update(Request $request, User $user) {
        
        if($request->get('password') == null) {
            $request->request->remove('password');
        }

        $formFields = $request->validate([
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => 'required|email',
            'password' => 'nullable',
            'role' => 'required'
        ]);

       
    
        if($request->get('password') != null) {
            $formFields['password'] = bcrypt($formFields['password']);
        }

        $user->update($formFields);
        $user->save();

        return redirect('/users')->with('success', 'Edit User Success');
    }

    //delete spesific user
    public function destroy(User $user) {
        if(Gate::allows('is-supervisor')) {
            $user->delete();

            return redirect('/users')->with('success', 'Delete User Success');
        }
    }
}
