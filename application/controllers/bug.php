<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bug extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('story_model');

    }

    public function index()
    {

        //        $bugs['bugindex'] = $this->bug_model->get();

        if ($this->input->get('storyId')) {
            $bugs['bugindex'] = $this->bug_model->get_by_story_id($this->input->get('storyId'));
        } else {
            $bugs['bugindex'] = $this->bug_model->getAllWithStoryDetail();
        }
        //$bugs['bugindex'] = $this->bug_model->getAllWithStoryDetail();

        // $data['page'] = 'userview3';
        //   $this->load->view('template',$data);
        /* $this->load->view('userview1',$users);*/
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/bug_mgnt', $bugs);


    }
    
    public function data_in()
    {

        $container = array();

        $addBugStoryId = $this->input->post('addBugStoryId');
        $addBugDescription = $this->input->post('addBugDescription');
        $addBugOwner = $this->input->post('addBugOwner');
        $addBugSeverity = $this->input->post('addBugSeverity');
        $addBugStatus = $this->input->post('addBugStatus');
        $addBugDueDate = $this->input->post('addBugDueDate');

        if ($this->bug_model->addBug($addBugStoryId, $addBugDescription, $addBugOwner,
            $addBugSeverity, $addBugStatus, $addBugDueDate)
        ) {
            $container['message'] = 'You successfully added this bug ';
        } else {
            $container['message'] = 'Bugg  add failed';
        }

        //  $this->load->view('project_mgnt/bug_mgnt', $container);
        $this->index();
    }
    
    public function add_bug()
    {
        $container['projectindex'] = $this->project_model->get();
        $container['storyindex'] = $this->story_model->get();

        // $container = array();
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/bug_mgnt_add', $container);
    }


    public function data_in_update()
    {

        if ($this->input->get('bugId')) {
            $container['storyindex'] = $this->story_model->get();
            $container['bugindex'] = $this->bug_model->getBugByBugId($this->input->get('bugId'));
            $this->load->view('project_mgnt/top_page.php');
            $this->load->view('project_mgnt/menu_page.php');
            $this->load->view('project_mgnt/bug_mgnt_update', $container);

        } else {
            $bugs['message'] = 'Error happened, please contact manager!';
            if ($this->input->get('storyId')) {
                $bugs['bugindex'] = $this->bug_model->get_by_story_id($this->input->get('storyId'));
            } else {
                $bugs['bugindex'] = $this->bug_model->getAllWithStoryDetail();
            }
            $this->load->view('project_mgnt/top_page.php');
            $this->load->view('project_mgnt/menu_page.php');
            $this->load->view('project_mgnt/bug_mgnt', $bugs);
        }
        // $container = array();
        //$this->load->view('project_mgnt/bug_mgnt', $container);
    }

    public function detailview()
    {
        if($this->input->get('bugID')) {
            $container['bugindex'] = $this->bug_model->getBugByBugId($this->input->get('bugID'));
        }
        else
        {
            $container['bugindex'] = $this->bug_model->getBugByBugId('5');
        }
        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/bug_mgnt_detailview', $container);
    }

    public function updateBugData()
    {

        $container = array();
        $bBugId = $this->input->post('updateBugId');
        $bStoryId = $this->input->post('updateBugStoryId');
        $bDescription = $this->input->post('updateBugDescription');
        $bAssignedTo = $this->input->post('updateBugOwner');
        $bSeverity = $this->input->post('updateBugSeverity');
        $bStatus = $this->input->post('updateBugStatus');
        $bDueDate = $this->input->post('updateBugDueDate');

        //echo phpinfo();dieout();
        if ($this->bug_model->updateBug($bBugId, $bStoryId, $bDescription, $bAssignedTo,
            $bSeverity, $bStatus, $bDueDate)
        ) {
            $container['message'] = 'You successfully updated this bug ';
        } else {
            $container['message'] = 'Bug update failed, please contact the manager!';
        }
        $container['bugindex'] = $this->bug_model->get_by_story_id($bStoryId);

        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/bug_mgnt', $container);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */