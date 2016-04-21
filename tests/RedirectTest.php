<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RedirectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
	
	/*
	* Test to ensure that visiting /profiles will redirect away with a 302 response code
	*
	*/
	public function testRedirectHideProfilesNotLoggedIn()
	{
		$response = $this->call('GET', '/profiles');
		$this->assertEquals(302, $response->status());
		
	}

}
