<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class Activity_model extends CI_Model
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

    public function getCountsByRowNum()
    {
        $query = $this->db->query('SELECT user_name FROM user');
        $Counts = $query->num_rows();
        return $Counts;
    }

    /*
     * useless function
     * */
    public function getUserNameById($id)
    {
        $sql = 'SELECT user_name FROM user where user_id = ?';
        $query = $this->db->query($sql, array($id));
        $row = $query->row();
        return $row->user_name;
    }


    public function getIdByEmail($email)
    {
        $sql = 'SELECT user_id FROM user where email = ?';
        $query = $this->db->query($sql, array($email));
        $idArray = $query->row_array();
        return $idArray['user_id'];
    }

    public function validUqEmailByString($email)
    {
        $sql = 'SELECT email FROM user where email = ?';
        $query = $this->db->query($sql, array($email));
        $rowNum = $query->num_rows();
        return ($rowNum < 1 ? true : false);
    }

    public function validLoginByEmail($email)
    {
        $sql = 'SELECT email FROM user where email = ?';
        $query = $this->db->query($sql, array($email));
        $rowNum = $query->num_rows();
        return $rowNum > 0;
    }

    public function validLoginPwByEmail($password, $email)
    {
        $passwordSql = 'SELECT password FROM user where email = ?';
        $passwordQuery = $this->db->query($passwordSql, array($email));
        $password = hash('md5', $password);
        $saltQuery = $this->db->query('SELECT salt FROM user where email = ?', array($email));
        $saltArray = $saltQuery->row_array();
        $salt = $saltArray['salt'];
        $generatePassword = hash('md5', $password . $salt);
        if ($passwordQuery->num_rows() > 0) {

            $passwordArray = $passwordQuery->row_array();
            if ($passwordArray['password'] != $generatePassword) return false;

        } else {
            return false;
        }

        return true;
    }

    /*
     * TODO duplicate? this function seems to be useless. --Joe(YuZhou)
     * */
    public function validPasswordByUserName($password, $email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        $user = $query->row_array();
        $password = hash('md5', $password);
        $generatePassword = hash('md5', $password . $user['salt']);
        return strcmp($user['password'], $generatePassword) == 0;
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