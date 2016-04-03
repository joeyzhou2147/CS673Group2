<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bug extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();

        // needed when we
        $this->load->library('form_validation');
        //load the employee model

        $this->load->model('bug_model');
    }
    public function index()
    {

        $bugs['bugindex'] = $this->bug_model->get();

       // $data['page'] = 'userview3';
     //   $this->load->view('template',$data);
        /* $this->load->view('userview1',$users);*/
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

       // $this->load->view('project_mgnt/story_mgnt',$stories);

      


    }
    
    public function data_in()
    {
        //get the last story id
       // $storyid = $this->story_model->get_last_story_id();
        $data['storyid'] = '3005';
        //get all the project ids
        //$project['projectindex']= $this->project_model->get_all_project_id();
         $data['projectindex'] = array('5000','5001','50002');
        //getall user names from user table
        $data['owners'] = array('kali','gilbert','terry','han','joe');
        // $data['page'] = 'project_mgnt_add_story';

        $data['status']  = array('pending','open','completed');
         //$this->load->view('template', $data);

        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt_add_story', $data);

       // $this->load->view('add_story', $data);
    }
    
    public function add_story()
    {
        $stories['storyindex'] = $this->story_model->get();

        $id=$this->input->post('storyiid');
        $idescription=$this->input->post('storydescription');







            $data['message'] = 'Data Inserted Successfully';
            //Loading View
            $this->load->view('insert_view', $data);
        

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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */