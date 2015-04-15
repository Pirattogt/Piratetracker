<?php

class UsersController extends BaseController {

	public function getUserInfo() {

		$id = Input::get('id');
		if ( ! $id) {
			return Response::json(array('success' => false));
		}

		$user = DB::table('users')->where('id', $id)->first();
		$userResult = array('name' => $user->name);
		return Response::json(array('success' => true, 'user' => $userResult));
	}

}
