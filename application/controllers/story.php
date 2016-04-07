<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story extends CI_Controller {

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
        $this->load->model('story_model');
        $this->load->model('project_model');
    }
    public function index()
    {
        if($this->input->get('projectId')){
            $stories['storyindex'] = $this->story_model->get_by_project_id($this->input->get('projectId'));
        }else{
            $stories['storyindex'] = $this->story_model->get();
        }

        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/story_mgnt',$stories);
    }
    public function delete()
    {
        if($this->input->get('storyId')){
            if($this->story_model->delete_by_story_id($this->input->get('storyId'))){
                $stories['message'] = 'Successfully delete story "'.$this->input->get('storyId').'".';
            }else{
                $stories['message'] = 'Delete story "'.$this->input->get('storyId').'" failed.';
            }
        }
        $stories['storyindex'] = $this->story_model->get();

        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');

        $this->load->view('project_mgnt/story_mgnt',$stories);
    }

    public function data_in()
    {
        //get the last story id
       // $storyid = $this->story_model->get_last_story_id();
        $data['storyid'] = '3005';
        //get all the project ids
        //$project['projectindex']= $this->project_model->get_all_project_id();
         $data['projectindex'] = $this->project_model->get();
        //getall user names from user table
        $data['owners'] = array('kali','gilbert','terry','han','joe');
        // $data['page'] = 'project_mgnt_add_story';

        $data['status']  = array('pending','open','completed');
         //$this->load->view('template', $data);

        $this->load->view('project_mgnt/top_page.php');
        $this->load->view('project_mgnt/menu_page.php');
        $this->load->view('project_mgnt/project_mgnt_add_story', $data);

       // $this->load->view('add_story', $data);
    }
    
    public function add_story()
    {

        $container = array();

        $sProjectID = $this->input->post('addProjectId');
        $sCreateDate =  date("m.d.y");   // 03.10.01
        $sDescription = $this->input->post('addStoryDescription');
        $sUpdateDate = date("m.d.y");  // 03.10.01
        $StoryUser = $this->input->post('addStoryUser');
        $StoryStatus =$this->input->post('addStoryStatus');

        if($this->story_model->addStory($sProjectID, $sCreateDate, $sDescription,$sUpdateDate,
            $StoryUser,$StoryStatus))
        {
            $container['message'] = 'You successfully add this Story ';
        }else{
            $container['message'] = 'Story add failed';
        }

        $this->index();
    }
    public function project_mgnt()
    {
        $stories = $this->story_model->get();
        $dataStories = $this->story_model->get_by_story_id(1);

        //get story count
        $story_count = 0;
        foreach($stories as $row){
            $story_count ++;
        }
        $story_count ++;
        //echo phpinfo(); dieout();
        //echo $this->data['stories']->story_id;
        /*        foreach($stories as $story){
                    echo '<br>';
                    echo $story->story_id;
                    echo '</br>';
                }*/

        // summary of data post to view

        $container  = array();
        $container['story_count'] = $story_count;
        $container['dataStories'] = $stories;
        $container['project_ids'] = $this->project_model->get_project_column('project_id');

        $this->load->view('project_mgnt/project_mgnt_add_story',$container);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */