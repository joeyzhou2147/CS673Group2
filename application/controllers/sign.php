<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/15
 * Time: 18:54
 */

class Sign extends CI_Controller {

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

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }


    public function index()
    {
        $data = "";
        $this->load->view('layout/sign_in_header',$data);
        $this->load->view('sign_in',$data);
        $this->load->view('layout/sign_in_footer',$data);
    }



    /* 1 - User Sign_up Login
    ---------------------------------------------------------------------- */
    function join()
    {
        $this->load->view('sign_up');
    }

    function sign_up()
    {
        $this->load->model('User_model');
        $email = $this->input->post('register_email');
        $password = $this->input->post('register_password');
        if (!is_null($email) && !is_null($password)) {
            $data['password'] = $password;
            $data['email'] = $email;
            if ($this->User_model->validUqEmailByString($email)) {
                $data['query'] = $this->User_model->create($email, $password);
                $data['user_id'] = $this->User_model->getIdByEmail($email);
                $data['redirect'] = 1;
                $data['query'] = "Your account is activated. Please login to check! ";
            } else {
                $data['query'] = "Email already registered in this site. Please use another email or reset your password.";
                $data['redirect'] = 0;
            }
        } else {
            $data['query'] = "Insert failed. Null Parameter.";
            $data['redirect'] = 0;
        }

        $this->load->view('sign_up', $data);

    }

    function login()
    {
        $this->load->model('User_model');
        // todo: AI
        $email = $this->input->post('login_email');
        $password = $this->input->post('login_password');
        $id = $this->User_model->getIdByEmail($email);

        $data['user_id'] = $id;
        $data['email'] = $email;
        $data['password'] = $password;
        if ($this->User_model->validLoginByEmail($email)) {
            if ($this->User_model->validLoginPwByEmail($password, $email)) {
                $this->session->set_userdata('username', $email);
                $this->User_model->updateLastLoginTime($email);
                $this->load->view('cabin2', $data);
            } else {
                $data['query'] = "login failed, your password is wrong.";
                $this->load->view('sign_up', $data);
            }

        } else {
            $data['query'] = "login failed, username doesn't exist.";
            $this->load->view('sign_up', $data);
        }
    }

    /* 1 - User Sign_up Login   End
    ---------------------------------------------------------------------- */

    /* 2 - News Add Delete Search Modify
    ---------------------------------------------------------------------- */

    function add_news()
    {
        $this->load->view('news_add');
    }

    function news_home()
    {
        $this->load->view('news_home');
    }

    function show_all_news()
    {
        $this->load->model('News_model');
        $this->db->select('news_id,title,author_email,sub_category,creation_date,');
        $allNewsQuery = $this->db->get('news');
        $allNewsResult = $allNewsQuery->result();
        if (isset($allNewsResult)) {
            echo '<div style="width:900px"><a style="margin-left:100px ">Title<a/>';
            echo '<a style="margin-left:300px ">Category<a/>';
            echo '<a style="margin-left:100px ">Author<a/>';
            echo '<a style="margin-left:100px ">Date<a/>';
            echo '</div><br/>';
            foreach ($allNewsResult as $allNewsRow) {
                if ($allNewsRow->title == "") {
                    $allNewsRow->title = "untitled";
                }
                //$this->db->select('news_id,title,author_email,sub_category,creation_date,');
                echo '<div style="width:900px"><a href="/index.php/test_database/news/' . $allNewsRow->news_id . '" style="position:absolute;width: 400px;margin-left: 5%">' . $allNewsRow->title . '<a/>';
                echo '<a style="position:absolute;width: 100px;margin-left: 33%">' . $allNewsRow->sub_category . '<a/>';
                echo '<a style="position:absolute;width: 100px;margin-left: 45%">' . $allNewsRow->author_email . '<a/>';
                $old_date_timestamp = strtotime($allNewsRow->creation_date);
                $new_date = date('F d, Y', $old_date_timestamp);
                echo '<a style="position:absolute;width: 200px;margin-left: 55%">' . $new_date . '<a/>';
                echo '<br/></div>';
            }
        }
        $data = array(
            'allNewsResult' => $allNewsResult,
        );
        $this->load->view('news_list', $data);
    }

    // show the particular news by id
    function news($news_id = 0)
    {
        if ($news_id > 0) {
            $data['news'] = $this->News_model->getRowById($news_id);
            if ($data['news']['title'] == "") {
                $data['news']['title'] = "untitled";
            }
            $data = array(
                'news_id' => $data['news']['news_id'],
                'title' => $data['news']['title'],
                'creation_date' => $data['news']['creation_date'],
                'author' => $data['news']['author_email'],
                'category' => $data['news']['sub_category'],
                'description' => $data['news']['description'],
                'summary' => $data['news']['summary'],
            );
            $this->load->view('news_detail', $data);
        } else {
            $data["title"] = "Unknown News";
            $data["info"] = "The id of this news doesn't valid, please contact the manager.";
            $this->load->view("infoDisplay", $data);
        }
    }

    function add()
    {
        $this->load->model('News_model');

        $news_title = $this->input->post('news_title');
        $news_summary = $this->input->post('news_summary');
        $news_user_email = $this->input->post('news_user_email');
        $news_sub_category = $this->input->post('news_sub_category');
        $news_keywords = $this->input->post('news_keywords');
        $news_description = $this->input->post('news_description');

        if (!is_null($news_title) && !is_null($news_user_email)) {

            $data['news_title'] = $news_title;
            $data['news_summary'] = $news_summary;
            $data['news_user_email'] = $news_user_email;
            $data['news_sub_category'] = $news_sub_category;
            $data['news_keywords'] = $news_keywords;
            $news_description = $this->News_model->formatTextDescription($news_description);
            $data['news_description'] = $news_description;

            // TODO need to check if this id(email) exist
            $user_id = $this->User_model->getIdByEmail($news_user_email);
            $add_news_result = $this->News_model->create($news_title, $news_user_email, $news_summary, $user_id, $news_sub_category, $news_keywords, $news_description);
            if ($add_news_result) {
                $data['news_id'] = $add_news_result['news_id'];
                $data['title'] = $add_news_result['title'];
                $data['redirect'] = 1;
                $data['query'] = "You successfully add this news.";
                echo "<script>alert('" . $data["query"] . "');</script>";
                redirect("/test_database/news/" . $data['news_id'] . "");
            } else {
                $data['query'] = "Insert failed.Error in Database.";
                echo "<script>alert('" . $data["query"] . "');</script>";
                $data['redirect'] = 0;
            }
        } else {
            $data['query'] = "Insert failed. Null Parameter of title and you Email";
            echo "<script>alert('" . $data["query"] . "');</script>";
            $data['redirect'] = 0;
        }

    }

    function edit_news($news_id = 0)
    {
        if ($news_id > 0) {
            $data['news'] = $this->News_model->getRowById($news_id);
            if ($data['news']['title'] == "") {
                $data['news']['title'] = "untitled";
            }
            $description = $this->News_model->reformatTextDescription($data['news']['description']);
            $data = array(
                'news_id' => $data['news']['news_id'],
                'title' => $data['news']['title'],
                'creation_date' => $data['news']['creation_date'],
                'author' => $data['news']['author_email'],
                'category' => $data['news']['sub_category'],
                'description' => $description,
                'summary' => $data['news']['summary'],
                'keywords' => $data['news']['keywords'],
            );
            $this->load->view('news_edit', $data);
        } else {
            $data["title"] = "Unknown News";
            $data["info"] = "The id of this news doesn't valid, please contact the manager.";
            $this->load->view("infoDisplay", $data);
        }
    }

    // we can edit directly or by id
    function edit()
    {
        $this->load->model('News_model');
        $this->load->model('User_model');

        $news_id = $this->input->post('news_id');
        $news_title = $this->input->post('news_title');
        $news_summary = $this->input->post('news_summary');
        $news_user_email = $this->input->post('news_user_email');
        $user_id = $this->User_model->getIdByEmail($news_user_email);
        $news_sub_category = $this->input->post('news_sub_category');
        $news_keywords = $this->input->post('news_keywords');
        $news_description = $this->input->post('news_description');

        $dataArray = array(
            'title' => $news_title,
            'summary' => $news_summary,
            'user_id' => $user_id,
            'sub_category' => $news_sub_category,
            'keywords' => $news_keywords,
            'description' => $news_description,
            'creation_date' => date("Y-m-d H:i:s"),
        );

        if (!is_null($news_title) && !is_null($news_user_email)) {

            $data['news_title'] = $news_title;
            $data['news_summary'] = $news_summary;
            $data['news_user_email'] = $news_user_email;
            $data['news_sub_category'] = $news_sub_category;
            $data['news_keywords'] = $news_keywords;
            $data['news_description'] = $news_description;

            $edit_news_result = $this->News_model->update($news_id, $dataArray);
            if ($edit_news_result) {
                $data['redirect'] = 1;
                $data['query'] = "You successfully modified this news.";
                $this->load->view('news_detail', $data);
            } else {
                $data['query'] = "Insert failed.Error in Database.";
                $data['redirect'] = 0;
            }
        } else {
            $data['query'] = "Failed to modify this news. Null Parameter of title and you Email";
            $data['redirect'] = 0;
        }
    }

    function delete_news($news_id)
    {
        // delete one or more than one news
        // delete user we need to update the new add by that user
        if ($news_id > 0) {
            if ($this->News_model->deleteRowById($news_id)) {
                $data["query"] = "delete successfully.";
                echo "<script>alert('" . $data["query"] . "');</script>";
                redirect('/test_database/show_all_news');
            } else {
                $data["query"] = "delete failed, this news might not exist. Please check.";
                echo "<script>alert('" . $data["query"] . "');</script>";
                redirect('/test_database/show_all_news');
            }
        } else {
            $data["query"] = "Cannot find this news, please contact the manager";
            echo "<script>alert('" . $data["query"] . "');</script>";
            redirect('/test_database/show_all_news');
        }
    }


    /* 2 - News Add Delete Search Modify    End
    ---------------------------------------------------------------------- */




}

/* End of file sign.php */
/* Location: ./application/controllers/sign.php */