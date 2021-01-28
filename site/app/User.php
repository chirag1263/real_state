<?php

namespace App;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    // public function getLink(){
    //     return url("/profile/".$this->id);
    // }

    // public static function getLinkStatic($slug){
    //     return url("/profile/".$slug);
    // }

    // public static function getPhoto($profile_pic){
    //     if($profile_pic){
    //         return url($profile_pic);
    //     } else {
    //         return url('front-end/img/default.png');
    //     }
    // }

    // public static function getCompany($user_id){
    //     return DB::table("companies")->where("added_by",$user_id)->first();
    // }

    // public static function getCompanyName($user_id){
    //     $company_name = DB::table("companies")->where("added_by",$user_id)->limit(1)->pluck('company_name');
    //     return $company_name[0];
    // }

    // public static function getCompanyLogo($user_id){
    //     $logo = DB::table("companies")->where("added_by",$user_id)->limit(1)->pluck('logo');
    //     return url($logo[0]);
    // }

}

