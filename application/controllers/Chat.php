<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->helper(array('url'));
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url());
        }
    }

    public function index()
    {
        if ($this->session->userdata('chat') == 'online') {
            redirect(base_url("chat/room"));
        }

        $data['username'] = $this->session->userdata('username');
        $data['nama_user'] = $this->session->userdata('nama_user');

        $this->load->view('header');
        $this->load->view('navigation', $data);
        $this->load->view('chat/chat_start', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function join()
    {
        $this->session->set_userdata('chat', 'online');
        redirect(base_url("chat/room"));
    }

    public function room()
    {
        if ($this->session->userdata('chat') != 'online') {
            redirect(base_url("chat"));
        }

        $data['username'] = $this->session->userdata('username');
        $data['nama_user'] = $this->session->userdata('nama_user');

        $contents = "";
        $logfile = "assets/log/log.html";

        if (file_exists($logfile) && filesize($logfile) > 0) {
            $contents = file_get_contents($logfile);
        }
        $data['contents'] = $contents;

        $this->load->view('header');
        $this->load->view('navigation', $data);
        $this->load->view('chat/chat_room', $data);
        $this->load->view('footer');
        $this->load->view('source');
    }

    public function post()
    {
        $username = $this->session->userdata('username');
        $nama_user = $this->session->userdata('nama_user');

        if ($this->session->userdata('chat') != 'online') {
            redirect(base_url("chat"));
        }
        $text = $_POST['text'];

        $logfile = "assets/log/log.html";
        $text_message = "<div class='msgln'><span class='chat-time'>" . date("g:i A") . "</span> <b class='user-name'>" . $nama_user . "</b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
        file_put_contents($logfile, $text_message, FILE_APPEND | LOCK_EX);
        redirect(base_url("chat/room"));
    }

    public function exit()
    {
        $username = $this->session->userdata('username');
        $nama_user = $this->session->userdata('nama_user');

        $logfile = "assets/log/log.html";
        $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>" . $nama_user . "</b> has left the chat session.</span><br></div>";
        file_put_contents($logfile, $logout_message, FILE_APPEND | LOCK_EX);

        $this->session->set_userdata('chat', 'offline');
        redirect(base_url("chat"));
    }
}
