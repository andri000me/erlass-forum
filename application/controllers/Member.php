<?php

    class Member extends CI_Controller{

        public $id_member = null;

        public function __construct(){

            parent::__construct();
            // cek jika login
            if($this->session->userdata('id_member')){

                // ambil id member
                // lalu simpan di class variable
                $this->id_member = $this->session->userdata('id_member');

                if($this->session->userdata('level') == 2){
                    
                    // lanjutin program
                }
                else{
                    // jika belum login, redirect ke login
                    redirect('/logout');
                }
            }
            else{
                // jika belum login, redirect ke login
                redirect('/login');
            }
        } // end of function construct
        //==================================================



        public function datasidebar(){

            $data = array(
                'inbox' => 0,
            );
            // ambil data surat belum dibaca
            $jumlahinbox = $this->member_model->ambiljumlahsuratbelumdibaca($this->session->userdata('id_member'));
            if($jumlahinbox){
                $data['inbox'] = $jumlahinbox;
            }
            
            return $data;
        } // end of function data default
        //==================================================




        public function index(){

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/dashboard');
            $this->load->view('member/footer');

        } // end of function index
        //==================================================



        public function inbox(){

            //ambil data surat spesifik
            $idmember = $this->session->userdata('id_member');
            $surat = $this->member_model->ambildatasurat($idmember);

            // echo '<pre>';
            // print_r($surat);
            // echo '</pre>';

            $data['datasurat'] = $surat;
 
            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/inbox', $data);
            $this->load->view('member/footer');

        } // end of function inbox
        //==================================================




        public function lihatsurat($idsurat){

            // ambil data surat
            $surat = $this->member_model->lihatsurat($idsurat);
            // update data surat sdh dibaca
            $this->member_model->suratdibaca($idsurat);

            $data['surat'] = $surat;

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/lihatsurat', $data);
            $this->load->view('member/footer');

        } // end of function lihatsurat
        //==================================================




        public function profil(){

            // ambil data member dari Admin_model
            // ambil data spesifik member
            $result = $this->admin_model->ambildatamember($this->id_member);

            $data['member'] = $result;

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/profil', $data);
            $this->load->view('member/footer');

        } // end of function profil
        //==================================================




        public function editprofil(){

            // ambil data member dari Admin_model
            // ambil data spesifik member
            $result = $this->admin_model->ambildatamember($this->id_member);

            $data['member'] = $result;

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/profiledit', $data);
            $this->load->view('member/footer');

        } // end of function editprofil
        //==================================================

        

        public function simpaneditmember(){

            // set form validation
			$this->form_validation->set_rules(array(
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				),
                array(
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
                ),
                array(
					'field' => 'nomorinduk',
					'label' => 'Nomor Induk',
					'rules' => 'required'
                ),
                array(
					'field' => 'alamat',
					'label' => 'Alamat',
					'rules' => 'required'
                ),
                array(
					'field' => 'sekolah',
					'label' => 'Sekolah',
					'rules' => 'required'
                ),
                array(
					'field' => 'hp',
					'label' => 'HP',
					'rules' => 'required'
                ),
                array(
					'field' => 'memberid',
					'label' => 'memberid',
					'rules' => 'required'
                )
                
            ));

            $this->form_validation->set_message('required', 'wajib diisi');

            // ambil semua variable
            $idmember = $this->id_member;
            $datamember = array(
                'email' => $this->input->post('email'),
                'no_induk' => $this->input->post('nomorinduk'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'sekolah' => $this->input->post('sekolah'),
                'hp' => $this->input->post('hp'),
            );

            // simpan data
            $result = $this->admin_model->simpandataeditmember($idmember, $datamember);

            if($result){
                redirect('member/profil');
            }
            else{
                echo 'error';
            }
        } // end of function simpaneditmember
        // =======================================================






        public function post(){

            // ambil data post yang pernah dibuat
            $post = $this->member_model->ambilpost($this->id_member);

            $data['posts'] = $post;

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/post', $data);
            $this->load->view('member/footer');

        } // end of function post
        //==================================================




        public function lihatpost($postid){

            // ambil data post yang pernah dibuat
            $post = $this->member_model->ambilpost($this->id_member, $postid);

            $data['post'] = $post;

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/postlihat', $data);
            $this->load->view('member/footer');

        } // end of function post
        //==================================================





        public function level(){

            $this->load->view('member/header');
            $this->load->view('member/sidebar', $this->datasidebar());
            $this->load->view('member/topbar');
            $this->load->view('member/level');
            $this->load->view('member/footer');

        } // end of function level
        //==================================================






    }