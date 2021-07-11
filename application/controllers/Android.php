<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller {

  public function index(){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Home'
        ];
      

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('home');
        $this->load->view('layout/footer');
      }
    }
  }

  public function login (){
    if($this->session->userdata('token')){
      return redirect(base_url('android'));
    }
    return $this->load->view('login-android');
  }
  public function register (){
    return $this->load->view('formregister');
  }

  public function prosesLogin(){
    $url = base_url('/api/auth/login');

		$email = $this->input->post('email');
		$password = $this->input->post('password');

    $data = array(
            'email'      => $email,
            'password' => $password 
    );

    $data_string = json_encode($data);

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string))
    );

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

    // Send the request
    $result = curl_exec($curl);

    // Free up the resources $curl is using
    curl_close($curl);

    $cekLogin = json_decode($result,true);

    if(isset($cekLogin['status'])){
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Invalid Login');
          window.location.href='".base_url('android/login')."';
          </script>");
      return;
    }
    if(isset($cekLogin['token'])){
      if($cekLogin['role'] == 'user'){
        $this->session->set_userdata('token', $cekLogin['token']);
        $this->session->set_userdata('id', $cekLogin['id']);
        $this->session->set_userdata('nama', $cekLogin['nama']);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('isLoginAdmin', true);
        return redirect(base_url('android'));
      }else{
        $this->session->set_userdata('isLoginAdmin', true);
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('You dont have access');
        window.location.href='".base_url('android/login')."';
        </script>");
        return;
      }
    }
   
  }


  public function prosesRegister(){
    
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'android | Loker'
        ];
        $dataCreate = [
          'nama'=> $this->input->post('nama'),
          'alamat'=> $this->input->post('alamat'),
          'no_telp'=> $this->input->post('no_telp'),
          'email'=> $this->input->post('email'),
          'password'=> $this->input->post('password'),
          'role'=> 'user',
        ];

              $url = base_url('/api/auth/register');
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
          
              // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              //   'Authorization: Bearer '.$this->session->userdata('token')
              //   )
              // );
      
              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getloker = json_decode($result,true);
              $loker['dataloker'] = $getloker['data'];
      
              

              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Berhasil di register');
              window.location.href='".base_url('android/login')."';
              </script>");
              return;

        
  }
  public function logout(){
    if($this->session->userdata('token')){
      session_destroy();
    }
    return redirect(base_url('android/login'));
  }
 


  public function delete_lamaran($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $url = base_url('/api/main/lamaran/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);
        $deleteUser = json_decode($result,true);
        if($deleteUser['status'] == 200){
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('lamaran dibatalkan!');
          window.location.href='".base_url('android/lamaransaya')."';
          </script>");
        }else{
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Failed to delete');
          window.location.href='".base_url('android/lamaransaya')."';
          </script>");
        }

      }
    }
  }


  public function lowongan(){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/loker');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        
        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('lowongan',$menu);
        $this->load->view('layout/footer');
      }
    }
  }
  public function lowongan_detail($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/loker/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        
        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('lowongan_detail',$menu);
        $this->load->view('layout/footer');
      }
    }
  }
  public function lamar($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/loker/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        
        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('form_lamar',$menu);
        $this->load->view('layout/footer');
      }
    }
  }
  public function lamaransaya(){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/lamaran/userid/'.$this->session->userdata('id'));
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];
        
        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('lamaransaya',$menu);
        $this->load->view('layout/footer');
      }
    }
  }

  public function proses_lamar($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('android/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'android | Loker'
        ];
      
        $cv = $_FILES['cv']['name'];      
        $ktp = $_FILES['ktp']['name']; 
        $surat_lamaran = $_FILES['surat_lamaran']['name']; 
        $kk = $_FILES['kk']['name']; 
        $skck = $_FILES['skck']['name']; 
        $foto = $_FILES['foto']['name']; 


      //  

        if ($cv !== "")
        {
            $config['upload_path'] = './uploads/';                        
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
            $config['max_size'] = '100000'; // 0 = no file size limit
            // $config['file_name']='cv_'.date('ymdhis');          
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('cv');
            $upload_data = $this->upload->data();
            $file_cv = $upload_data['file_name'];
        }       
        if ($ktp !== "")
        {
          $config['upload_path'] = './uploads/';             
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
          $config['max_size'] = '100000'; // 0 = no file size limit           
          // $config['file_name']='ktp_'.date('ymdhis');
          $config['overwrite'] = false;
          $this->load->library('upload', $config);
          $this->upload->do_upload('ktp');
          $upload_data2 = $this->upload->data();
          $file_ktp = $upload_data2['file_name']; 
        } 

        if ($surat_lamaran !== "")
        {
          $config['upload_path'] = './uploads/';             
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
          $config['max_size'] = '100000'; // 0 = no file size limit           
          // $config['file_name']='ktp_'.date('ymdhis');
          $config['overwrite'] = false;
          $this->load->library('upload', $config);
          $this->upload->do_upload('surat_lamaran');
          $upload_data2 = $this->upload->data();
          $file_surat = $upload_data2['file_name']; 
        } 
        if ($kk !== "")
        {
          $config['upload_path'] = './uploads/';             
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
          $config['max_size'] = '100000'; // 0 = no file size limit           
          // $config['file_name']='ktp_'.date('ymdhis');
          $config['overwrite'] = false;
          $this->load->library('upload', $config);
          $this->upload->do_upload('kk');
          $upload_data2 = $this->upload->data();
          $file_kk = $upload_data2['file_name']; 
        } 
        if ($skck !== "")
        {
          $config['upload_path'] = './uploads/';             
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
          $config['max_size'] = '100000'; // 0 = no file size limit           
          // $config['file_name']='ktp_'.date('ymdhis');
          $config['overwrite'] = false;
          $this->load->library('upload', $config);
          $this->upload->do_upload('skck');
          $upload_data2 = $this->upload->data();
          $file_skck = $upload_data2['file_name']; 
        } 

        if ($foto !== "")
        {
          $config['upload_path'] = './uploads/';             
          $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc';
          $config['max_size'] = '100000'; // 0 = no file size limit           
          // $config['file_name']='ktp_'.date('ymdhis');
          $config['overwrite'] = false;
          $this->load->library('upload', $config);
          $this->upload->do_upload('foto');
          $upload_data2 = $this->upload->data();
          $file_foto = $upload_data2['file_name']; 
        } 

        $dataCreate = [
                  'id_loker'=> $id,
                  'id_user'=> $this->session->userdata('id'),
                  'nama_user'=> $this->session->userdata('nama'),
                  'cv'=> $file_cv,
                  'ktp'=> $file_ktp,
                  'surat_lamaran'=> $file_surat,
                  'kk'=> $file_kk,
                  'skck'=> $file_skck,
                  'foto'=> $file_foto,
                  'status'=> 'melamar'
                ];


              $url = base_url('/api/main/lamaran');
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token')
                )
              );
      
              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['data'];
      
              
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Berhasil melamar');
              window.location.href='".base_url('android/lamaransaya')."';
              </script>");
              return;
          }
    }
  }



}
