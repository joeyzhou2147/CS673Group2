<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class Project_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_project(){
        return $this->db->get('project')->result();
    }

    function get_project_column($column){
        $this->db->select($column);
        return $this->db->get('project')->result();
    }
    function get_all_project_id()
    {
        $sql = 'SELECT project_id FROM project';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}