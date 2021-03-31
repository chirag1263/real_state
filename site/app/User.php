<?php

namespace App;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\VisitHistory;
class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function listing(){
        return User::select('users.*','user_details.contact_person','user_details.contact_email','user_details.contact_mobile','user_details.portal_access')->join('user_details','user_details.user_id','=','users.id');
    }

    public static function getClients(){
        return User::select('name','id')->where('active',0)->where('privilege',2)->where('parent_id',Auth::id())->get();
    }

    public static function curl_fnt($url,$inputs){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        if(sizeof($inputs)  > 0){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($inputs));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        $curl_error = curl_error($ch);
        if($curl_error){

            echo "<script>console.log($curl_error);</script>";
        }
        $output = json_decode($server_output,true);
        
        curl_close ($ch);
        
        return $output;
    }

    public static function fileExtensions()
    {
        return ["jpg","jpeg","png","JPG","JPEG","PNG","pdf","PDF","docs","ppt","PPT"];
    }

    
    public static function dashboard($type)
    {
        $count = 0;
        switch ($type) {
            case 'agents':
                $count = DB::table('users')->where('priv',2)->count();
                break;
            case 'users':
                $count = DB::table('users')->where('priv',3)->count();
                break;
            case 'projects':
                $count = DB::table('projects')->select('id')->count();
                break;
            case 'listings':
                $count = DB::table('listings')->select('id')->count();
                break;
            case 'wishlist-projects':
                $count = DB::table('wishlist')->select('id')->where('type',1)->where('user_id',Auth::id())->count();
                break;
            case 'wishlist-listing':
                $count = DB::table('wishlist')->select('id')->where('type',2)->where('user_id',Auth::id())->count();
                break;
            case 'history-listing':
                $count = VisitHistory::select('cat.category_name','ls.feature_image','ls.id as list_id','ls.title','ls.price','ls.location','visit_history.*')
                    ->join('listings as ls','ls.id','=','visit_history.entity_id')
                    ->join('list_categories as cat','cat.id','=','ls.list_category_id')
                    ->where('entity_type',2)->where('user_id',Auth::id())
                    ->orderBy('updated_at','desc')
                    ->take(4)
                    ->get();
                break;
            case 'history-project':
                $count = VisitHistory::select('pr.feature_image','pr.id as list_id','pr.title','pr.cost','pr.location','visit_history.*')
                    ->join('projects as pr','pr.id','=','visit_history.entity_id')
                    ->where('entity_type',1)->where('user_id',Auth::id())
                    ->orderBy('updated_at','desc')
                    ->take(4)
                    ->get();
                break;
            
        }
        return $count;
    }

    public static function getSeller($seller_id)
    {
        $seller = User::find($seller_id);
        if($seller){
            $seller->reviews = DB::table('seller_reviews')->select('seller_reviews.*','users.first_name','users.last_name')
                ->join('users','users.id','=','seller_reviews.added_by')
                ->where('seller_id',$seller_id)->where('seller_reviews.status',1)->orderBy('seller_reviews.id','desc')->take(5)->get();

            $seller->reviews_count = DB::table('seller_reviews')->select('seller_reviews.id')
                ->where('seller_id',$seller_id)->where('seller_reviews.status',1)->count();

            foreach ($seller->reviews as $row) {
                $row->given_by = $row->first_name.' '.$row->last_name;
            }
            $seller->rating = DB::table('seller_reviews')->where('seller_id',$seller_id)->where('status',1)->avg("rating");
        }

        return $seller;
    }

    public static function getRandPassword(){
        $string1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $string2 = "abcdefghijklmnopqrstuvwxyz";
        $string3 = "0123456789";
        $string4 = "$#@*^%";
        $string5 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$#@*^%";

        $n = rand(0, strlen($string1) - 1);
        $rand_pwd =  $string1[$n];

        for ($i=0; $i < 2; $i++) { 
            $n = rand(0, strlen($string2) - 1);
            $rand_pwd .=  $string2[$n];
        }

        $n = rand(0, strlen($string3) - 1);
        $rand_pwd .=  $string3[$n];

        $n = rand(0, strlen($string4) - 1);
        $rand_pwd .=  $string4[$n];

        for ($i=0; $i < 3; $i++) { 
            $n = rand(0, strlen($string5) - 1);
            $rand_pwd .=  $string5[$n];
        }

        return $rand_pwd;
    }

}

