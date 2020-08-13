<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendPush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $devices = ["d97PAHM48G4:APA91bH5uKpE7Dh6DX6DNdZEEmt3GreA40zeoJUhSe4McYiq6vi6FTWopwCeFxKG99n0rg67jazGT7vs0tLCbj-WczatSKwV-4e7l4aRBPOfTrp_UDr5JqfI8YtNaTvEBHHXcwve7u40"];
        $description = "GAAAA";
        $key_firebase = "AAAAV-tbcP8:APA91bHhiaAxJHp10yiFy3X8F5-zruu4EIxU0pqhkKaREdMhPon3YUg7V2-6JULR2-dwd7n4wNzxGWTKVwWyKPf6VdkW4RKpDPSedEcSIzHNNuqobrd5Bbzd8Ty0QS-L11UeYUyHSXlK";
        $click_action = "FLUTTER_NOTIFICATION_CLICK";
        $fields = array
        (
            'registration_ids'  => $devices,
            "data" => array("click_action"=>$click_action),
            'notification' => array( "title"=>"Push ","body"=>$description),
        );
        $headers = array
        (
            'Authorization: key=' . $key_firebase,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        $response = json_decode($result);
        var_dump($response);
    }
}
