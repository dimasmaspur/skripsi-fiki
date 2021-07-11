<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('Crud');
    }
	
	public function test_post()
	{
       
        $theCredential = $this->user_data;
        $this->response($theCredential, 200); // OK (200) being the HTTP response code
        
	}

    public function users_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,nama,email,alamat,no_telp,role','user')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No users were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,nama,email,alamat,no_telp,role','user',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get User or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function users_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "nama"      => $this->put('nama'),
                    "email"  => $this->put('email'),
                    "password"  => sha1($this->put('password')),
                    "alamat"    => $this->put('alamat'),
                    "no_telp"   => $this->put('no_telp'),
                    "role"      => $this->put('role')
                ];

                $updateData = $this->Crud->updateData('user',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }


    public function users_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('user',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete user',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
    public function  loker_post(){
        $nama_posisi = $this->post('nama_posisi');
        $spesifikasi = $this->post('spesifikasi');
        $deskripsi = $this->post('deskripsi');
        $dataArray = [
            "nama_posisi"=>$nama_posisi,
            "spesifikasi"=>$spesifikasi,
            "deskripsi"=>$deskripsi
        ];

        $createUser = $this->Crud->createData('loker',$dataArray);
                
        if($createUser){
            $output = [
                'status' => 200,
                'error' => false,
                'message' => 'Success create loker',
                'data'=> $dataArray
            ];
            $this->set_response($output, REST_Controller::HTTP_OK); 
        }else{
            $output = [
                'status' => 400,
                'error' => false,
                'message' =>'Failed create loker',
                'data'=> []
            ];
            $this->set_response($output, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function loker_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('*','loker')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get loker',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No loker were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('*','loker',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get loker',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get loker or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function loker_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','loker',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "nama_posisi"      => $this->put('nama_posisi'),
                    "spesifikasi"  => $this->put('spesifikasi'),
                    "deskripsi"  => $this->put('deskripsi')
                ];

                $updateData = $this->Crud->updateData('loker',$data,$where);

                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit loker',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit loker',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete loker or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function loker_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','loker',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('loker',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete loker',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete loker or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

    public function  lamaran_post(){
        $id_loker = $this->post('id_loker');
        $id_user = $this->post('id_user');
        $nama_user = $this->post('nama_user');
        $cv = $this->post('cv');
        $ktp = $this->post('ktp');
        $surat_lamaran = $this->post('surat_lamaran');
        $kk = $this->post('kk');
        $skck = $this->post('skck');
        $foto = $this->post('foto');
        $status = $this->post('status');
        $dataArray = [
             'id_loker' => $id_loker,
            'id_user' => $id_user,
            'nama_user' => $nama_user,
            'cv' => $cv,
            'ktp' => $ktp,
            'surat_lamaran' => $surat_lamaran,
            'kk' => $kk,
            'skck' => $skck,
            'foto' => $foto,
            'status' => $status,
        ];

        $createUser = $this->Crud->createData('lamaran',$dataArray);
                
        if($createUser){
            $output = [
                'status' => 200,
                'error' => false,
                'message' => 'Success create lamaran',
                'data'=> $dataArray
            ];
            $this->set_response($output, REST_Controller::HTTP_OK); 
        }else{
            $output = [
                'status' => 400,
                'error' => false,
                'message' =>'Failed create lamaran',
                'data'=> []
            ];
            $this->set_response($output, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function lamaransaya_get()
    {

        $id = $this->get('userid');

        if($id){
            $where = [
                'id_user'=> $id
            ];
            $getUserById = $this->db->query('select lamaran.*, loker.nama_posisi, user.nama,user.no_telp ,user.email from lamaran 
            INNER JOIN loker ON lamaran.id_loker = loker.id INNER  JOIN user ON lamaran.id_user = user.id where lamaran.id_user='.$id.'')->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get lamaran',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get lamaran or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function lamaran_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->db->query('select lamaran.*, loker.nama_posisi, user.nama,user.no_telp ,user.email from lamaran 
            INNER JOIN loker ON lamaran.id_loker = loker.id INNER  JOIN user ON lamaran.id_user = user.id')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get lamaran',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No lamaran were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->db->query('select lamaran.*, loker.nama_posisi, user.nama,user.no_telp ,user.email from lamaran 
            INNER JOIN loker ON lamaran.id_loker = loker.id INNER  JOIN user ON lamaran.id_user = user.id where lamaran.id='.$id.'')->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get lamaran',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get lamaran or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function lamaran_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','lamaran',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    'id_loker' => $this->put('id_loker'),
                    'id_user' => $this->put('id_user'),
                    'nama_user' => $this->put('nama_user'),
                    'cv' => $this->put('cv'),
                    'ktp' => $this->put('ktp'),
                    'surat_lamaran' => $this->put('surat_lamaran'),
                    'kk' => $this->put('kk'),
                    'skck' => $this->put('skck'),
                    'foto' => $this->put('foto'),
                    'status' => $this->put('status'),
                ];

                $updateData = $this->Crud->updateData('lamaran',$data,$where);

                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete lamaran or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function lamaran_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','lamaran',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('lamaran',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete lamaran',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete lamaran or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

    public function tolak_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','lamaran',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    'status' => 'di tolak',
                ];

                $updateData = $this->Crud->updateData('lamaran',$data,$where);

                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success tolak lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed tolak lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete lamaran or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function review_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','lamaran',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    'status' => 'di review',
                ];

                $updateData = $this->Crud->updateData('lamaran',$data,$where);

                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success review lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed review lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete lamaran or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function interview_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','lamaran',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    'status' => 'interview',
                ];

                $updateData = $this->Crud->updateData('lamaran',$data,$where);

                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success interview lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed interview lamaran',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete lamaran or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

   


}
