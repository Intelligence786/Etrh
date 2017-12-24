<?php

namespace App\Traits;

use App\Friendship;

trait Friendable


{

public function add_friend($user_requested_id){

if($this->id === $user_requested_id)
{
	return 0;
}
if($this->has_pending_friend_request_sent_to($user_requested_id) === 1)
{
	return "already sent a friend request";
}

if($this->has_pending_friend_request_from($user_requested_id)===1)
{
	return $this->accept_friend($user_requested_id);
}

if($this->is_friends_with($user_requested_id)===1)
{
	return "already friends";
}

$Friendship = Friendship::create([

'requester'=>$this->id,
'user_requested'=>$user_requested_id

]);


if($Friendship){
	return response()->json($Friendship, 200);
}

return response()->json('fail', 501);

}

public function accept_friend($requester){

if($this->has_pending_friend_request_from($requester))
{
	return 0;
}

	$Friendship=Friendship::where('requester', $requester)

	->where('user_requested', $this->id)
	->first();


	if($Friendship){

		$Friendship->update([

'status'=>1

		]);

		return response()->json($Friendship, 200);


	}

	return response()->json('fail', 501);
}

public function friends()
{

	$friends=array();



	$f1=Friendship::where('status', 1)
	->where('requester', $this->id)
	->get();

	foreach ($f1 as $Friendship):
		array_push($friends, \App\User::find($Friendship->user_requested));

	endforeach;




	$friends2=array();



	$f2=Friendship::where('status', 1)
	->where('user_requested', $this->id)->get();

	foreach ($f2 as $Friendship):
		array_push($friends2, \App\User::find($Friendship->requester));

	endforeach;

return array_merge($friends, $friends2);


	}




	public function pending_friend_request()

	{



		$users=array();



		$Friendships=Friendship::where('status', 0)
-> where('user_requested', $this->id)
->get();

foreach ($Friendships as $Friendship):

array_push($users, \App\User::find($Friendship->requester));

endforeach;

return $users;



	}




public function friends_ids(){

return collect($this->friends())->pluck('id')->toArray();

}

public function is_friends_with($user_id)
{
	if(in_array($user_id, $this->friends_ids()->toArray()))
	{
		return response()->json('true', 200);
	}
	else
	{
		return response()->json('false', 200);
	}
}


public function pending_friend_requests_ids()
{
	return collect($this->pending_friend_request())->pluck('id')->toArray();
}


public function pending_friend_requests_sent()
{
	$users=array();
	$friendships=Friendship::where('status',0)->where('requester', $this->id)->get();

	foreach ($friendships as $friendship) {
		array_push($users, \App\User::find($friendship->user_requested));
	}
	return $users;
}


public function pending_friend_requests_sent_ids()
{
	return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
}

public function has_pending_friend_request_from($user_id)
{
		if(in_array($user_id, $this->pending_friend_requests_ids()))
	{
		return 1;
	}
	else
	{
		return 0;
	}
}


public function has_pending_friend_request_sent_to($user_id)
{
		if(in_array($user_id, $this->pending_friend_requests_sent_ids()))
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

}




