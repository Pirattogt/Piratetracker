<?php

class PositionsControllerTest extends TestCase {

	public function testReceivePosition() {
		$lat_min = -90;
		$lat_max = 90;
		$lon_min = -180;
		$lon_max = 180;
		$test_lat = ($lat_min + lcg_value() * (abs($lat_min - $lat_max)));
		$test_lon = ($lon_min + lcg_value() * (abs($lon_min - $lon_max)));

		$parameters = array('lat' => $test_lat, 'lon' => $test_lon);

		// Enable auth
		Route::enableFilters();

		// login user
		$user = new User(array('username' => 'test'));
		$this->be($user);

		$crawler = $this->call('POST', 'position', $parameters);
		$this->assertTrue($this->client->getResponse()->isOk());

		$crawler = $this->call('PUT', 'position', $parameters);
		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
