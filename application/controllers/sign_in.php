<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/15
 * Time: 18:54
 */

class Sign_in extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $userInfo = $this->User_model->activeGetUser();
        if(!($userInfo)){
            $data['info'] = 'We\'re sorry, we could not find the user';
        }
        $this->load->view('sign_in',$data);
    }


}

/* End of file sign_in.php */
/* Location: ./application/controllers/sign_in.php */