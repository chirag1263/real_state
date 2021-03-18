<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{

    protected $table = 'wishlist';

    public static function projects()
    {
    	return Wishlist::where('type',1)->where('user_id',Auth::id())->pluck("item_id")->all();
    }

    public static function listing()
    {
    	return Wishlist::where('type',2)->where('user_id',Auth::id())->pluck("item_id")->all();
    }
}

