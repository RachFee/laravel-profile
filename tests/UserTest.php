<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	/* 
	*call the setup function so we can begin a database transaction
	*/
	public function setUp(){
		parent::setUp(); //extension of TestCase
		DB::beginTransaction();
	}
	
	/*
	* Call the teardown function to rollback the database transaction
	*/
	public function tearDown(){
		DB::rollBack();    
		parent::tearDown(); //extension of TestCase
	}

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
	
	/**
	* Test registering a new valid user. 
	*
	*/
	public function testNewValidUserRegistration(){
		$this->visit('/register')
		->type('City of London', 'name')
		->type('testphpUnit@test.com', 'email')
		->type('password', 'password')
		->type('password', 'password_confirmation')
		->type('London', 'city')
		->type('cityofldnont', 'twitter')
		->type('RachFee', 'github')
		->select('Developer', 'career_role')
		->press('Register')
		->seePageIs('/profiles');
	}
	
	/**
	* Test registering a new valid user that already exists. 
	*Create user, logout, register, login
	*
	*/
	public function testNewDuplicationRegistration(){
		$this->visit('/register')
		->type('City of London', 'name')
		->type('testphpUnit@test.com', 'email')
		->type('password', 'password')
		->type('password', 'password_confirmation')
		->type('London', 'city')
		->type('cityofldnont', 'twitter')
		->type('RachFee', 'github')
		->select('Developer', 'career_role')
		->press('Register')
		->seePageIs('/profiles')	
		->visit('/logout')
		->visit('/register')
		->type('City of London', 'name')
		->type('testphpUnit@test.com', 'email')
		->type('password', 'password')
		->type('password', 'password_confirmation')
		->type('London', 'city')
		->type('cityofldnont', 'twitter')
		->type('RachFee', 'github')
		->select('Developer', 'career_role')
		->press('Register')
		->seePageIs('/register');
	}
	
	
	/**
	* Test an incomplete registration
	*
	*/
	public function testNewIncompleteRegistration(){
		$this->visit('/register')
		->type('City of London', 'name')
		->type('testphpUnit2@test.com', 'email')
		->type('password', 'password')
		->select('Developer', 'career_role')
		->press('Register')
		->seePageIs('/register');
	}
		
}
