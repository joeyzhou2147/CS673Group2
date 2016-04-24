<?php

/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */
class Bug_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($email, $password, $username = '')
    {
        $password = hash('md5', $password);
        $salt = hash('md5', uniqid());
        $generatePassword = hash('md5', $password . $salt);
        if (!$username) {
            $splits = explode('@', $email);
            $username = $splits[0];
        }

        $dataArray = array(
            // 'user_id' => $id, // column id is auto incremental
            'user_name' => $username,
            'email' => $email,
            'password' => $generatePassword,
            'salt' => $salt,
            'register_date' => date("Y-m-d H:i:s"),
        );

        if ($this->db->insert('user', $dataArray)) {
            return array(
                'user_id' => $this->getIdByEmail($email),
                'salt' => $salt);
        } else {
            return false;
        }
    }

    function get()
    {
        return $this->db->get('bug')->result();
    }

    public function getCountsByRowNum()
    {
        $query = $this->db->query('SELECT user_name FROM user');
        $Counts = $query->num_rows();
        return $Counts;
    }


    function addProject($bProjectId, $bDescription, $bassignedTo,
                        $bSeverity, $bStatus, $bDueDate)
    {
        $dataArray = array(
            'story_id' => $bProjectId, // column id is auto incremental
            'bug_description' => $bDescription,
            'bug_assigned_to' => $bassignedTo,
            'bug_severity' => $bSeverity,
            'bug_status' => $bStatus,
            'bug_due_date' => $bDueDate,

            //'register_date' => date("Y-m-d H:i:s"),
        );

        if ($this->db->insert('bug', $dataArray)) {
            //            return array(
            //                'project_id' => $this->getIdByName($pName),
            //                'project_name' => $pName);
            return true;
        } else {
            return false;
        }
    }

    /*
     * useless function
     * */

    function updateBug($bBugId, $bProjectId, $bDescription, $bassignedTo,
                       $bSeverity, $bStatus, $bDueDate)
    {
        $this->load->database();
        $dataArray = array(
            'story_id' => $bProjectId, // column id is auto incremental
            'bug_description' => $bDescription,
            'bug_assigned_to' => $bassignedTo,
            'bug_severity' => $bSeverity,
            'bug_status' => $bStatus,
            'bug_due_date' => $bDueDate,

            //'register_date' => date("Y-m-d H:i:s"),
        );
        //alert($bBugId);
        $this->db->where('bug_id', $bBugId);
        $this->db->update('bug', $dataArray);

    }

    public function updateLastLoginTime($email)
    {
        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data = array(
                'last_login' => date("Y-m-d H:i:s")
            );
            $this->db->where('email', $email);
            $this->db->update('user', $data);
            return $this->db->affected_rows() > 0;
        }
        return false;
    }


    public function activeGetUser()
    {
        $result = array();
        $this->db->select('user_id, username, password')->from('user');
        $query = $this->db->get();

        // the query cannot be returned directly
        // change the query data to array of string
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getBugByBugId($bugId)
    {

        //$this->db->select('user_id, username, password')->from('user');
        $this->db->where('bug_id', $bugId)->from('bug');
        return $this->db->get()->result();
    }

    public function getAllWithStoryDetail()
    {
        // $this->db->select('bug.bug_id','bug.bug_description','bug.bug_assigned_to','bug.bug_severity','bug.bug_status','bug.bug_due_date');
        $this->db->select('*');
        $this->db->from('bug');
        $this->db->join('story', 'bug.story_id=story.story_id', 'inner');
        $this->db->join('project', 'story.project_id = project.project_id', 'inner');
        //   $rowcount =  $this->db ->get()->num_rows();
        // log_message('debug', 'KJ bug Some variable was correctly set');
        // log_message('debug',$rowcount);
        return $this->db->get()->result();

    }

}