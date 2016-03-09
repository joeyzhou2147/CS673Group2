<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class User_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function activeGetUser(){
        $result = array();
        $this->db->select('user_id, username, password')->from('user');
        $query = $this->db->get();

        // the query cannot be returned directly
        // change the query data to array of string
        if($query->num_rows() > 0){
            $result = $query->result_array();
        }
        return $result;
    }
}