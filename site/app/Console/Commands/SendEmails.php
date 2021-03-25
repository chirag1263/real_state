<?php

namespace App\Console\Commands;

use App\MailQueue;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        require app_path().'/classes/PHPMailerAutoload.php';

        $mail_queue = MailQueue::where("solved",0)->limit(10)->get();
        
        foreach ($mail_queue as $mail_item) {

            $mail= new \PHPMailer;
        
            if(env('APP_ENV') == "local"){
                $mail->IsSMTP();
                $mail->SMTPAuth   = true;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "smtp.gmail.com";
                $mail->Username   = "contact@test.co.in";
                $mail->Password   = "Vishu_1987";
                $mail->setFrom('contact@test.co.in', 'Test');
            } else {
                $mail->isMail();
                $mail->setFrom('info@realstate.com', 'Realstate');
            }

            $mail->isHTML(true);

            $mail->Subject = $mail_item->subject;
            $mail->Body = $mail_item->content;

            if(env('APP_ENV') == "local"){
                $mail->AddAddress("vishu.iitd@gmail.com");
            } else {
                if($mail_item->mailto){
                    $emails = explode(',', $mail_item->mailto);
                    foreach ($emails as $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $mail->AddAddress($email);
                        }
                    }
                }

                if($mail_item->mailcc){
                    $emails = explode(',', $mail_item->mailcc);
                    foreach ($emails as $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $mail->AddCC($email);
                        }
                    }
                }

                if($mail_item->mailbcc){
                    $emails = explode(',', $mail_item->mailbcc);
                    foreach ($emails as $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $mail->AddBCC($email);
                        }
                    }
                }
            }

            // if($mail_item->at_folder){
            //     if($mail_item->at_file){
            //         $mail->addAttachment(app_path().'/../'.$mail_item->at_folder.'/'.$mail_item->at_file, $mail_item->at_file);
            //     }
            // }

            if(!$mail->Send()) {
                $this->info("Mailer Error: " . $mail->ErrorInfo);
            } else {
                $mail_item->solved = 1;
                $mail_item->save();
            }

            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
            $mail->ClearCustomHeaders();
        }
        $this->info("emails sent - ".sizeof($mail_queue));
    }
}
