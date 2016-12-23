<?php

namespace PD\PushNotifications;

/**
 * Created by PhpStorm.
 * User: Hash
 * Date: 04-10-2015
 * Time: 10:12
 */
use Illuminate\Support\Facades\Log;

define("GOOGLE_API_KEY",'AIzaSyBCpnM7wH43l452sH61ZfTegqXZRpZCATo');

class PushNotification {

    public function send_notification($registration_ids, $message) {
        // include config

        // Set POST variables
       //dd($registration_ids->pushRegId);
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            "notification" =>array(
                    "body" => "Portal Up Notification Done",
                    "title" => $message
                ),
            "to" => $registration_ids->pushRegId

        );
        var_dump(json_encode($fields));

        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        Log::debug($result);
    }

}