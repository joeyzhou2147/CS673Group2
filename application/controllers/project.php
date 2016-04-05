<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

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
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();

        // needed when we
        $this->load->library('form_validation');
        //load the employee model
        $this->load->model('story_model');
        $this->load->model('project_model');
        $this->load->model('group_model');
    }
    function index()
    {

        $projects['projectindex'] = $this->project_model->get();

       // $data['page'] = 'userview3';
     //   $this->load->view('template',$data);
        /* $this->load->view('userview1',$users);*/
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/project_mgnt',$projects);
      //  $this->load->view('project_mgnt/bottom_page.php');
    }

    function project_mgnt_add(){
        //$container = array();
        $container['groupIndex']=  $this->group_model->get();
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/project_mgnt_add', $container);

    }
    
    function data_in()
    {
        $container = array();

        $pName = $this->input->post('addProjectName');
        $pGroupId = $this->input->post('addProjectGroupId');
        $pLength = $this->input->post('addProjectLength');
        $pStartDate = $this->input->post('addProjectStartDate');
        $pStatus = $this->input->post('addProjectStatus');

        if($this->project_model->addProject($pName, $pGroupId, $pLength,$pStartDate,$pStatus)){
            $container['message'] = 'You successfully add this project "'.$pName.'"!';
        }else{
            $container['message'] = 'Project "'.$pName.'" add failed';
        }
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/project_mgnt_add', $container);
    }
    function data_in_backup()
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
    
    function add_story()
    {
        $stories['storyindex'] = $this->story_model->get();

        $id=$this->input->post('id');
        $idescription=$this->input->post('description');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('dname', 'Username', 'required|min_length[5]|max_length[15]');

        //Validating Email Field
        $this->form_validation->set_rules('demail', 'Email', 'required|valid_email');

        //Validating Mobile no. Field
        $this->form_validation->set_rules('dmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

        //Validating Address Field
        $this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('insert_view');
        } else {
                    //Setting values for tabel columns
        /*    $data = array(
                'Student_Name' => $this->input->post('dname'),
                'Student_Email' => $this->input->post('demail'),
                'Student_Mobile' => $this->input->post('dmobile'),
                'Student_Address' => $this->input->post('daddress'),
                 'projectids' => $project['projectindex'],
                'storid' => $storyid,
            );
            //Transfering data to Model
            $this->insert_model->form_insert($data);
            $data['message'] = 'Data Inserted Successfully';
            //Loading View
            $this->load->view('insert_view', $data);*/
        }

    }
function getstory_in_project($projectid)
{
    $stories['storyindex'] = $this->story_model->get_by_project_id($projectid);
    // $data['page'] = 'userview3';
    //   $this->load->view('template',$data);
    /* $this->load->view('userview1',$users);*/
    $this->load->view('project_mgnt/top_page.php');
    $this->load->view('project_mgnt/menu_page.php');

    $this->load->view('project_mgnt/story_mgnt',$stories);

}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */