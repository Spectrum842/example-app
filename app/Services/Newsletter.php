<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;
class Newsletter{
    public function subscribe(string $email){
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' =>config('services.mailchimp.key'),
            'server' => 'us8'
        ]);

        $response = $mailchimp->lists->addListMember('e74d694d24', [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }
}