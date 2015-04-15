<?php

class UsersControllerTest extends TestCase {

	public function testGetUserInfo() {

		$parameters = array('id' => 1); // Assume that we always have user with id 1

		$crawler = $this->call('GET', 'users/get', $parameters);

		// Test that we got a result
		$this->assertTrue($this->client->getResponse()->isOk());

		// Test the contents
		$content = $crawler->getContent();
		$this->assertJson($content);
		$result = json_decode($content);

		$this->assertTrue($result->success);
		$this->assertNotNull($result->user);
		$this->assertNotEmpty($result->user->name);
	}

}
