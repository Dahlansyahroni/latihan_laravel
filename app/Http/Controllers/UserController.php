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
        $users = User::findOrFail($id);
        return view('pages.user.user1', compact('users'));
    }
    public function create()
    {
        return view('pages.user.createUser');
    }
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/users')->with('success', 'User created successfully.');
    }
    public function delete($id)
    {
        $users = User::find($id);
        if ($users){
            $users->delete();
            return redirect('/users')->with('success', 'User deleted successfully.');
        }else{
        return redirect('/users')->with('error', 'User not found.');
        }
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('pages.user.editUser', compact('users'));
    }
    public function update(Request $request, $id)
    {
      
        $users = User::findOrFail($id);
        if ($users) {
            $users->update($request->all());
            return redirect('/users')->with('success', 'User updated successfully.');
        } else {
            return redirect('/users')->with('error', 'User not found.');
        }
    }
    public function showuser($id)
    {
        $users = User::findOrFail($id);
        return view('pages.user.showuser', compact('users'));
    }
}