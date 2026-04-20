<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request)
    {
       $keyword = $request->input('search');
      
        if ($keyword !='') {
            $users = User::where('name', 'LIKE', "%{$keyword}%")->paginate(5);
        }else{
            $users = User::paginate(5);
        }
        return view('pages.user.indexUser', compact('users'));
    }   
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.showuser', compact('user'));
    }
    public function create()
    {
        return view('pages.user.createUser');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($request->password);
        User::create($validated);
        
        return redirect('/users')->with('success', 'User created successfully.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }
}