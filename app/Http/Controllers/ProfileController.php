<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
	const active = 'profile';
	const title = 'Profile';

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
		$user = User::find(auth()->user()->id);
		return view('pages.profile.index', compact('title', 'user'));
	}

	/**
	* Show the application settings.
	*
	* @return \Illuminate\Http\Response
	*/
	public function settings()
	{
		$title = array(
			'active' => 'settings',
			'title' => self::title,
		);
		$user = User::find(auth()->user()->id);
		return view('pages.profile.index', compact('title', 'user'));
	}

	/**
	* Update profile
	*
	* @param Request $request
	* @param  \App\User $user
	* @return \Illuminate\Http\Response
	*/
	public function updateProfile(Request $request, User $user)
	{
		$request->validate([
			'fname' => 'required|string|max:100',
			'lname' => 'required|string|max:100',
			'image' => 'mimetypes:image/jpeg,image/png,image/jpg',
		]);

		$newImage = '';
		if ($request->file('image')) {
        	$path = 'upload/profile/';
        	$image = 'img-' . $user->id . time() . '.png';
        	Image::make($request->file('image'))->resize(277, 183)->save($path.$image);
        	$newImage = $image;
		}

		$user->fname = $request->fname;
		$user->lname = $request->lname;
		if(@$newImage){
			$user->image = $newImage;
		}
		$user->save();

		return redirect()->back()->with("success","Profile Updated!");
	}


	/**
	* Show the application password.
	*
	* @return \Illuminate\Http\Response
	* @param Request $request
	*/
	public function password(Request $request)
	{
		$request->validate([
			'current_password' => 'required',
			'new_password' => 'required|string|min:6',
			'new_password_confirmed' => 'required|same:new_password',
		]);

		if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
			// The passwords matches
			return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
		}

		if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
			//Current password and new password are same
			return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
		}

		//Change Password
		$user = auth()->user();
		$user->password = bcrypt($request->get('new_password'));
		$user->save();

		return redirect()->back()->with("success","Password changed successfully!");
	}

}
