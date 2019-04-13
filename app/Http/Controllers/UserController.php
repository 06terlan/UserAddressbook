<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Model\User;

/**
 * Class UserController.
 *
 * @author Tarlan Abdullayev
 */
class UserController extends Controller
{
	/**
     * Display a listing of the users.
     *
     * @param App\Http\Requests\UserRequest $request
     *
     * @return \Illuminate\Http\Response
    */
    public function users(UserRequest $request)
    {
    	$users = User::orderByDesc('created_at');
    	$this->userFilter($users, $request);

    	$data = [
    		'request'=> $request, 
    		'users'=> $users->paginate(15)
    	];

    	return view('page.user', $data);
    }

    /**
     * Display a information about user.
     *
     * @param int $uid
     *
     * @return \Illuminate\Http\Response
    */
    public function usersInfo(int $uid)
    {
    	$user = User::where('uid', $uid)->with('addresses')->first();
    	
		if($user === null) return response()->view("errors.404", [], 404);

		$userAddressBook = $user->addresses;

    	$data = [
    		'userAddressBook'=> $userAddressBook,
    		'user'=> $user
    	];

    	return view('page.userInfo', $data);
    }

	/**
     * Filter the date for request.
     *
     * @param Illuminate\Database\Eloquent\Builder $users
     * @param App\Http\Requests\UserRequest $request
     *
    */
    public static function userFilter(Builder $users, UserRequest $request)
    {
        if($request->get('name')) 
            $users->where('name', 'like', '%'.$request->get('name').'%');
        if($request->get('LastName')) 
            $users->where('LastName', 'like', '%'.$request->get('LastName').'%');
        if($request->get('mail')) 
            $users->where('mail', 'like', '%'.$request->get('mail').'%');
    }
}
