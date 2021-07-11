<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{

    protected $table = 'listings';

    public static function listing()
    {
    	return Lists::select('listings.*','list_categories.category_name','users.first_name','users.last_name')
            ->leftJoin('users','users.id','=','listings.added_by')
            ->join('list_categories','list_categories.id','=','listings.list_category_id');
    }
}

