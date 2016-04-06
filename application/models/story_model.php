<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class Story_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        return $this->db->get('story')->result();
    }


    /**
     * Get user by user id
     *
     * @access public
     * @param string $user_id
     * @return object areas
     */
    function get_by_story_id($story_id)
    {
        return $this->db->get_where('story', array('story_id' => $story_id))->result();
    }

    function form_insert($data){
// Inserting in Table(students) of Database(college)
        $this->db->insert('story', $data);
    }

    function get_last_story_id()
    {
        $sql = 'SELECT LAST(story_id) as ID ID FROM story';
        $query = $this->db->query($sql);
        return $query->result();
    }
    function get_by_project_id($project_id)
    {
        return $this->db->get_where('story', array('project_id' => $project_id))->result();
    }

    function addStory($sProjectID, $sCreateDate, $sDescription,$sUpdateDate,
                      $StoryUser,$StoryStatus)
    {
        $dataArray = array(
            'project_id' => $sProjectID, // column id is auto incremental
            'story_create_time' => $sCreateDate,
            'story_description' => $sDescription,
            'story_last_update_time' => $sUpdateDate,
            'story_owner' => $StoryUser,
            'story_status' => $StoryStatus,

            //'register_date' => date("Y-m-d H:i:s"),
        );

        if ($this->db->insert('story', $dataArray)) {
//            return array(
//                'project_id' => $this->getIdByName($pName),
//                'project_name' => $pName);
            return true;
        } else {
            return false;
        }
    }
}
