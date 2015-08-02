<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('index');
    }

    public function getAllTems() {
        $tems = $this->my_lib->getfilesnames();
        echo json_encode(array('tems' => $tems));
    }

    public function starttest($temname = 0) {

        $tems = $this->my_lib->getfilesnames();
        if (!in_array($temname, $tems)) {
            echo json_encode(array('temeror' => 'нема такої теми'));
            exit();
        }

        $quest_ans_res = $this->my_lib->getquest_ans_res($temname);
        echo json_encode(array('quest_ans_res' => $quest_ans_res));
        
    }
    
    public function showres() {
        if (isset($_GET)){
            $name = strip_tags($_GET['name']);
            $email = strip_tags($_GET['email']);
            $num_ans = strip_tags($_GET['num_ans']);
        }else{
            $num_ans = 0;
        }
        
        $error=array();
        
        if(!isset($email)||!$email){
            $error[]='відсутній email';
        }else{
            if(!valid_email($email)){
                $error[]='неправильний email';    
            }
        }
        
        if(!isset($name)||!$name){
            $error[]='відсутні прізвище та ініціали';
        }
        
        if(count($error)==0){
            send_email($email, 'Результати тесту ІКТ', 'Ви набрали: '.$num_ans.' балів');
            send_email('leshkoroman@mail.ru', 'Результати тесту ІКТ '.$name, 'Ви набрали: '.$num_ans.' балів');
            file_put_contents('results.txt', 'Name: '.$name."\t".' Ans: '.$num_ans." \r\n", FILE_APPEND);
            echo json_encode(array('ok' => '1'));
            exit();
        }else{
            echo json_encode(array('error' => $error));
            exit();
        }

    }

}

?>