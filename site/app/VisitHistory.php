<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VisitHistory extends Model
{

    protected $table = 'visit_history';
    public $timestamps = false;

    public static function create($entity_type , $entity_id)
    {
    	$check = VisitHistory::where('entity_type',$entity_type)->where('entity_id',$entity_id)->where('user_id',Auth::id())->first();

    	if($check){
    		$check->visit_count = $check->visit_count + 1;
    	}else{
    		$check = new VisitHistory;
    		$check->entity_id = $entity_id;	
    		$check->entity_type = $entity_type;	
    		$check->visit_count = 1;
    		$check->user_id = Auth::id();
    	}
		$check->save();
    }

}

