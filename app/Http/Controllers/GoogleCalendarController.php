<?php

namespace App\Http\Controllers;
require  ('../vendor/autoload.php');
require_once('../quickstart.php'); 

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;



class GoogleCalendarController extends Controller
{



public function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Findo');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


public function addEventToCalendar(){

    $client= $this->getClient();
    $service = new Google_Service_Calendar($client);

    $calendarId = 'primary';


    
    
    $events = Event::where('id',request('id'))->get();
    
    $googleEvent = new Google_Service_Calendar_Event(array(
        'summary' => 'test',
        'description' => 'test',
        'start' => array(
            'dateTime' =>'2021-03-29T17:00:00-07:00',
            'timeZone' => 'France/Paris',
        ),
        'end' => array(
            'dateTime' =>'2021-03-29T19:00:00-07:00',
            'timeZone' => 'France/Paris',
        ),
    ));

    $googleEvent = $service->events->insert($calendarId, $googleEvent);
    printf('Event created: %s\n', $googleEvent->htmlLink);

}

}