<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function index()
    {
        $this->load->view('landing');
    }
    public function landing()
    {
        $this->load->view('landing');
    }
    public function welcome_message()
    {
        $this->load->view('welcome_message');
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function home()
    {
        $this->load->view('home');
    }
    public function story()
    {
        echo "helloworld";
        //$this->load->model('PivotalClassAPI');
        // Include the file that defines the class
        //require 'pivotal.php';
        require '/application/models/PivotalClassAPI.php';
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
        echo "/n<br/>";
        echo $tok;
        //  $xml = $pivotal->projects_get();
        $xml = $pivotal->projects_get('1522017');
        echo "/n<br/>";
        echo "after get";
        echo "/n<br/>";

        //print_r($xml);


        $activity = $pivotal-> stories_get( '1522017');

        echo "/n<br/>";
        echo "after activity  get";
        echo "/n<br/>";

        //  print_r($activity);

        // print_r($activity[story]);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */