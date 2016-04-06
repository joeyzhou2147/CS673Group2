<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Get user
     *
     * @access public
     * @return object areas
     */
    function get()
    {
        return $this->db->get('user')->result();
    }


    /**
     * Get user by user id
     *
     * @access public
     * @param string $user_id
     * @return object areas
     */
    function get_by_user_id($user_id)
    {
        return $this->db->get_where('user', array('user_id' => $user_id))->result();
    }

    /**
     * Get user by username
     *
     * @access public
     * @param string $username
     * @return object areas
     */
    function get_by_username($username)
    {
        return $this->db->get_where('user', array('username' => $username))->row();
    }


    function create($username, $password, $first_name = '')
    {
        // hash once here
        $passwordHash = hash('md5', $password);
        $salt = hash('md5', uniqid());
        // hash twice here
        $generatePassword = hash('md5', $passwordHash . $salt);

        // hash only once here
        //$generatePassword = hash('md5', $password . $salt);
        if (!$first_name) {
            $splits = explode('@', $username);
            $first_name = $splits[0];
        }
        //echo $generatePassword;

        $dataArray = array(
            // 'user_id' => $id, // column id is auto incremental
            'first_name' => $first_name,
            'username' => $username,
            //'password' => $password,

            'password' => $generatePassword,
            'salt' => $salt,
            'register_date' => date("Y-m-d H:i:s"),
        );

        if ($this->db->insert('user', $dataArray)) {
            return array(
                'user_id' => $this->getIdByEmail($username),
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


    function getIdByEmail($email)
    {
        $sql = 'SELECT user_id FROM user where username = ?';
        $query = $this->db->query($sql, array($email));
        $idArray = $query->row_array();
        return isset($idArray['user_id'])?$idArray['user_id']:$idArray;
    }

    public function validUqEmailByString($email)
    {
        $sql = 'SELECT username FROM user where username = ?';
        $query = $this->db->query($sql, array($email));
        $rowNum = $query->num_rows();
        return ($rowNum < 1 ? true : false);
    }

    public function validLoginByEmail($email)
    {
        $sql = 'SELECT username FROM user where username = ?';
        $query = $this->db->query($sql, array($email));
        $rowNum = $query->num_rows();
        return $rowNum > 0;
    }

    public function validLoginPwByEmail($password, $email)
    {
        $saltQuery = $this->db->query('SELECT salt FROM user where username = ?', array($email));
        $saltArray = $saltQuery->row_array();
        $salt = $saltArray['salt'];

        $passwordQuery = $this->db->query('SELECT password FROM user where username = ?', array($email));
        // hash one more time, if password is not hash
        //$password = hash('md5', $password);
        // hash only once here
        $passwordHash = hash('md5', $password);
        // hash twice here
        $generatePassword = hash('md5', $passwordHash . $salt);
        // hash only once here
        //$generatePassword = hash('md5', $password . $salt);

        //echo $generatePassword.'/////////////';
        //echo hash('md5',hash('md5', $password).$salt).' ///////////// ';
        if ($passwordQuery->num_rows() > 0) {

            $passwordArray = $passwordQuery->row_array();
            //echo $passwordArray['password'].'/////////////';
            //echo $salt.'/////////////';
            //echo hash('md5',$password.$salt).'/////////////';
            //if ($passwordArray['password'] != $password) return false;
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
        $this->db->where('username', $email);
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
            $this->db->where('username', $email);
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
    public function  add_user($Group)
    {
        
    }
    
}