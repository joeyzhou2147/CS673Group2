<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class Story_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStory(){
        require 'PivotalClassAPI.php';
        // Create an instance of the class
        //	$pivotal = new pivotal;
        $pivotal = new PivotalTrackerAPI;

        // Set our API token and project number
        $pivotal->token = '1cee9562e50dcbbb9800128a7d911b4c';
        $pivotal->project = '1522017';   // project id

        // Get an existing story
        //	$story = $pivotal->getStory('112739899');// story id
        // Display some details
        //echo $story->name;
        $tok = $pivotal->authenticate();
        echo "\n";
        echo $tok;
        //  $xml = $pivotal->projects_get();
        $xml = $pivotal->projects_get('1522017');
        echo "\n";
        echo "after get";
        echo "\n";

        //print_r($xml);


        $activity = $pivotal-> stories_get( '1522017');

        echo "\n";
        echo "after activity  get";
        echo "\n";
    }
}