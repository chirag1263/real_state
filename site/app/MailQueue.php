<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class MailQueue extends Model
{

    protected $table = 'mail_queue';

    public static function createNew($to,$cc,$bcc,$subject,$content){

    	$mail_queue = new MailQueue;
    	$mail_queue->mailto = $to;
    	$mail_queue->mailcc = $cc;
    	$mail_queue->mailbcc = $bcc;
    	$mail_queue->subject = $subject;
    	$mail_queue->content = $content;
    	$mail_queue->save();

    }
    
}