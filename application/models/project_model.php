<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class Project_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        return $this->db->get('project')->result();
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

    function get_project_column($column){
        $this->db->select($column);
        return $this->db->get('project')->result();
    }
    function get_last_story_id()
    {
        $sql = 'SELECT LAST(story_id) as ID ID FROM story';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
