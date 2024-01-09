<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function loginUser()
    {
        if (!Auth::check()) {
            return view('login');
        }
        return redirect('/index');
    }

    public function index()
    {
        if (Auth::check()) {
            return view("/index");
        }
        return redirect('/');
    }

    public function loginn()
    {
        return view('login');
    }
    public function login(Request $req)
    {
        // $user = User::where(['email' => $req->email])->first();
        // if (!$user || !Hash::check($req->password, $user->password)) {
        //     return redirect('/')->with('error', 'Username or password does not match.');
        // }
        // $req->session()->put('user', $user);

        // $credentials = $req->only(['email', 'password']);

        // if (Auth::attempt($credentials)) {
        //     Auth::login($user); // Log in the user
        //     return redirect("index");
        // }
        $user = User::where(['email' => $req->email])->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect('/')
                ->with('error', 'Username or password does not match.')
                ->withInput(); // This retains the old input values in case of a validation error
        }

        $req->session()->put('user', $user);

        $credentials = $req->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            Auth::login($user); // Log in the user
            return redirect("home");
        } else {
            return redirect('/')
                ->with('error', 'Username or password does not match.')
                ->withInput(); // This retains the old input values in case of a validation error
        }
    }
    public function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        // Check if 'role_as' is present in the request, if yes, set to 1, otherwise set to 0
        $user->role_as = $req->has('role_as', 0);

        $user->save();
        return redirect('/');
    }
    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect("/");
    }

    /*user Managent*/

    public function manage()
    {
        $users = User::all();
        return view('users.manage')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',

        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'role_as' => $request->has('role_as', 0),
        ]);

        return redirect()->route('users.manage')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',

        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_as' => $request->has('role_as', 0),
        ]);

        return redirect()->route('users.manage')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.manage')->with('success', 'User deleted successfully');
    }
}
