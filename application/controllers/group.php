<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

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

        $this->load->model('group_model');

    }
    public function index()
    {

        $groups['groupindex'] = $this->group_model->get();

       // $data['page'] = 'userview3';
     //   $this->load->view('template',$data);
        /* $this->load->view('userview1',$users);*/
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/group_mgnt',$groups);

      


    }
    
    public function data_in()
    {
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/group_mgnt_add');
    }
    
    public function add_group()
    {
        $container = array();

        $sGroupName = $this->input->post('addGroupName');
        $sGroupId = "7011";
        if($this->group_model->addGroup($sGroupName,$sGroupId))
        {
            $container['message'] = 'You successfully add this Story ';
        }else{
            $container['message'] = 'Story add failed';
        }

        //after finishing the add lodad the controller
        require_once(APPPATH.'controllers/setup.php'); //include controller
        $aObj = new Setup();  //create object
        $aObj->index(); //call function

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */