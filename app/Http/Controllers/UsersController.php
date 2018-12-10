<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
	const active = 'users';
	const title = 'Users';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
		);
		$users = User::whereRole('user')->paginate(10);
		return view('pages.users.index', compact('title', 'users'));
	}

	/**
	* Show the form for creating a new user.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
		);
		return view('pages.users.create', compact('title'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param UsersRequest $request
	* @return void
	*/
	public function store(UsersRequest $request)
	{
		$store = new User;
		$store->fname = $request->fname;
		$store->lname = $request->lname;
		$store->email = $request->email;
		$store->role = $request->role;
		$store->password = Hash::make($request->password);
		$store->active = '1';
		$store->image = 'avatar.png';
		$store->save();

		$request->session()->flash('success', "New User Created");
		return redirect()->route('users.index');
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\User $user
	* @return \Illuminate\Http\Response
	*/
	public function edit(User $user)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
		);
		return view('pages.users.edit', compact('title', 'user'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param UsersRequest $request
	* @param  \App\User $user
	* @return \Illuminate\Http\Response
	*/
	public function update(UsersRequest $request, User $user)
	{
		$user->fname = $request->fname;
		$user->lname = $request->lname;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->password = Hash::make($request->password);
		$user->save();

		$request->session()->flash('success', "User Updated");
		return redirect()->route('users.index');
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\User $user
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, User $user)
	{
		$request->session()->flash('error', "User deleted!");
		$user->delete();
		return redirect()->route('users.index');
	}

	/**
	* block unblock the specified resource
	* @param Request $request
	* @param  \App\User $user
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function block(Request $request, User $user)
	{
		if($user->blocked=='0'){
			$user->blocked = '1';
			$msg = 'User Blocked!';
		}
		else{
			$user->blocked = '0';
			$msg = 'User Un-blocked!';
		}
		$user->save();

		$request->session()->flash('error', $msg);		
		return redirect()->route('users.index');
	}


}
