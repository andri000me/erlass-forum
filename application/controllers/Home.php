<?php

    class Home extends CI_Controller{

        public function __construct(){

            parent::__construct();

        }

        public function index(){

            $this->load->view('front/header');
            $this->load->view('front/home');
            $this->load->view('front/footer');

        }


    }