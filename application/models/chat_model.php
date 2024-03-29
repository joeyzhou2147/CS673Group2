<?php

class Chat_model extends CI_Model {
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
    $this->load->helper('date');
  }


  function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('chats', 1);
     return $query->result();
  }
  
  
  function insert_message($message)
  {
    $this->load->helper('date');
  $this->message = $message;
   // $this->message_text = $message;

    $datestring = "%Y-%m-%d %h:%i:%s";

    $oTime = time();
    $this-> time =  mdate($datestring, $oTime);
  //    $this-> message_time =  mdate($datestring, $oTime);
   // $cTime =  time();
  //  $dataArray = array(
   //     'message' => $message, // column id is auto incremental
  //      'time' => $cTime,


      //'register_date' => date("Y-m-d H:i:s"),
   // );

    $this->db->insert('chats',$this);
    //  $this->db->insert('message',$this);
  }

  function get_chat_after($time)
  {
    $this->db->where('time >', $time)->order_by('time', 'DESC')->limit(10); 
    $query = $this->db->get('chats');
    
    $results = array();
    
    foreach ($query->result() as $row)
    {
      $results[] = array($row->message,$row->time);
    }
    
    return array_reverse($results);
  }

  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    /* Specify the table schema */
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'message' => array(
                                  'type' => 'TEXT'
                              ),
                    'time' => array(
                        'type' => 'INT'
                      )
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    $this->dbforge->add_key('id', TRUE);
    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('chats', TRUE);
  }


}
?>