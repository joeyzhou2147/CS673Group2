<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/3
 * Time: 18:37
 */

class User_group_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        return $this->db->get('user_group')->result();
    }


    /**
     * Get user by user id
     *
     * @access public
     * @param string $user_id
     * @return object areas
     */
 public function add_user_group($gGroupId,$gEnteringDate,$gUserId,$gUserRole,$gUserStatus)
 {
     $dataArray = array(
         'group_id' => $gGroupId, // column id is auto incremental
         'user_entering_date' => $gEnteringDate,
         'user_id' => $gUserId,
         'user_role' => $gUserRole,
         'user_status' => $gUserStatus,


         //'register_date' => date("Y-m-d H:i:s"),
     );

     if ($this->db->insert('user_group', $dataArray)) {
//            return array(
//                'project_id' => $this->getIdByName($pName),
//                'project_name' => $pName);
         return true;
     } else {
         return false;
     }
 }

}