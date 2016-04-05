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
        $this->load->model('project_model');

    }
    public function index()
    {

        $bugs['bugindex'] = $this->bug_model->get();

       // $data['page'] = 'userview3';
     //   $this->load->view('template',$data);
        /* $this->load->view('userview1',$users);*/
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

       $this->load->view('project_mgnt/bug_mgnt',$bugs);

      


    }
    
    public function data_in()
    {

        $container = array();

        $bProjectId = $this->input->post('addBugProjectId');
        $bDescription = $this->input->post('addBugDescription');
        $bassignedTo = $this->input->post('addBugOwner');
        $bSeverity = $this->input->post('addBugSeverity');
        $bStatus = $this->input->post('addBugStatus');
        $bDueDate = $this->input->post('addBugDueDate');

        if($this->bug_model->addProject($bProjectId, $bDescription, $bassignedTo,
            $bSeverity,$bStatus,$bDueDate)){
            $container['message'] = 'You successfully added this bug ';
        }else{
            $container['message'] = 'Bugg  add failed';
        }

      //  $this->load->view('project_mgnt/bug_mgnt', $container);
        $this->index();
    }
    
    public function add_bug()
    {
        $container['projectindex'] = $this->project_model->get();
       // $container = array();
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/bug_mgnt_add', $container);
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