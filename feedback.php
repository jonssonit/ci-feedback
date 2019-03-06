<?php
/* 
 * FEEDBACK LIBRARY
 * Jonas Jonsson Oktober 22 2012
 * jonas@jonssonweb.se
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class feedback
{
    protedcted $ci;
    public $messages = array();

    public function __construct()
    {
        //Create a pointer to Codeigniter main object
        $this->ci =& get_instance();
        //Load session library with help of CI object
        $this->ci->load->library('session');
         //Get messages from flash session
        $this->messages = $this->ci->session->flashdata('messages');
    }

    /*
     *  Display messages
     *  This echoes a label for each message with bootstrap css classes
     *  Can be changed to liking...
     */
    public function display()
    {
        if( $this->hasMessages() > 0 && is_array($this->messages) )
        {
            foreach( $this->messages as $k => $m )
            {
                echo '<label class="alert alert-'.$m['type'].'"><i class="close icon icon-remove" data-dismiss="alert"></i>';
                echo $m['message'];
                echo '</label>';
            }
        }
    }

    /*
     *  Add message to display at next page-load
     *  $message: The message to display
     *  $type: Typ of message for label css class
     */
    public function add( $message, $type='info' )
    {
        $this->messages[] = array('type'=>$type,'message'=>$message); 
        $this->ci->session->set_flashdata('messages', $this->messages); //Create session flashdata
    }

    /*
     *  Get messages
     *  Returns array of messages
     *  Returns false of no messages exist
     */
    public function get()
    {
        if( is_array($this->messages) )
        {
            return $this->messages;
        }
        return false;
    }

    /*
     *  Check if there is any messages
     *  returns number of messages
     *  return false if none exist
     */
    public function hasMessages()
    {
        if( is_array($this->messages) && count($this->messages) > 0 )
        {
            return count( $this->messages );
        }
        return 0;
    }
}
