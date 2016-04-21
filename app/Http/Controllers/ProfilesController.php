<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Config;
use TwitterAPIExchange;

use Illuminate\Http\Request;
use App\Http\Requests;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This is the default GET behaviour when /profiles is accessed.
		//This is where we should pull a list of profiles from the db. 
		
		//get users table
		$users = DB::table('users')->get();
		
		//get keys - located in config/twitter.php
		$keys = Config::get('twitter.keys');
		
		//set up Twitter - only need to define settings once
		$settings = array(
			'oauth_access_token' => $keys['oauth_access_token'],
			'oauth_access_token_secret' => $keys['oauth_acces_token_secret'],
			'consumer_key' => $keys['consumer_key'],
			'consumer_secret' => $keys['consumer_secret']
		);
		//create the utility once
		$twitterUtility = new TwitterAPIExchange($settings);
		
		//loop through users so we can access each individually to add a "last Tweet"
		foreach ($users AS $user){
			
			//try to get tweet, but ensure username is valid string, first.
			if (!empty($user->twitter) && preg_match("/^[\w]+$/", $user->twitter)){			
				//split URL into sections for readability
				$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
				//fields
				$fields = "?count=1";
				$fields .= "&trim_user=1";
				$fields .= "&exclude_replies=true";
				$fields .= "&include_rts=false";
				$fields .= "&screen_name=".$user->twitter;
				//specify request method
				$method = "GET";
				
				//request can throw an exception, so perform within try-catch
				try{
				//make the request using the utility
					$latestTweet = json_decode($twitterUtility->setGetfield($fields)
					->buildOauth($url, $method)
					->performRequest());
				}catch(Exception $e){
					echo "Twitter threw an exception: ". $e->getMessage() . " Please contact an administrator. ";
				}
				
				
				if (!isset($latestTweet->errors)){ //valid tweet was returned
					$user->twitter .= ": <a href=\"http://twitter.com/".$user->twitter."/statuses/".$latestTweet[0]->id_str."\" target=\"_blank\">".$latestTweet[0]->text."</a>";
				}else if ($latestTweet->errors[0]->code == 34){ //username is valid string, but user didn't exist.
					$user->twitter = " (User does not exist)";
				}else if (isset($latestTweet->errors)){ //username is valid string, but there was another issue
					$user->twitter .= " (Unknown issue with request)";
				}
			}else if (!empty($user->twitter)){
				$user->twitter = " (Invalid Username)";
			}
		}
		
		//pass users to view
		//name "profiles" instead of "Users" to avoid any naming confusion
		return view('profiles', ['users' => $users, 'id' => Auth::user()->id]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
