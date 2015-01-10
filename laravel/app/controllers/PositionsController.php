<?php

class PositionsController extends BaseController {

	/**
	 * Receive a position, insert for the currently logged in user
	 * @return type
	 */
	public function receivePosition() {
		$lat = Input::get('lat');
		$lon = Input::get('lon');
		$timestamp = Input::get('timestamp');

		$id = DB::table('positions')->insertGetId(
				array('latitude' => $lat, 'longitude' => $lon, 'timestamp' => $timestamp, 'user' => Auth::id())
		);

		return Response::json(array('success' => true, 'position' => 'received', 'id' => $id));
	}

	/**
	 * Get the last known position of the logged in user
	 * @return type
	 */
	public function getLastPosition() {
		$position = DB::table('positions')->where('user', Auth::id())->orderBy('timestamp', 'desc')->first();
		return Response::json($position);
	}

	/**
	 * Get all positions from the currently logged in user
	 * @return type
	 */
	public function getAllPositions() {
		$positions = DB::table('positions')->where('user', Auth::id())->orderBy('timestamp', 'desc')->get();
		return Response::json($positions);
	}

}
