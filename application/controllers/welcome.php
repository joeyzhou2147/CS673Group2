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

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // login verified here
    function index()
    {
        $email = $this->input->post('login_email');
        $password = $this->input->post('login_password');
        $id = $this->User_model->getIdByEmail($email);

        $container['user_id'] = $id;
        $container['email'] = $email;
        $container['password'] = $password;
        if ($this->User_model->validLoginByEmail($email)) {
            if ($this->User_model->validLoginPwByEmail($password, $email)) {
                $this->session->set_userdata('username', $email);
                //$this->User_model->updateLastLoginTime($email);
                //
                $this->load->view('landing', $container);
            } else {
                //echo $container['password'];
                //echo $container['email'];
                $container['message'] = "login failed, your password is wrong.";
                $this->load->view('layout/sign_in_header',$container);
                $this->load->view('sign_in',$container);
                $this->load->view('layout/sign_in_footer',$container);
            }

        } else {
            $container['message'] = "login failed, username doesn't exist.";
            $this->load->view('layout/sign_in_header',$container);
            $this->load->view('sign_in',$container);
            $this->load->view('layout/sign_in_footer',$container);
        }
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
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('landing');
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
    function stats()
    {
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */