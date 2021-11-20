<?php

class Pages extends CI_Controller{
    public function view($page='home'){
        if ( !file_exists( APPPATH.'views/es/pages/'.$page.'.php' ) ){
            show_404();
        }
        
        if ($this->session->userdata('logged_in'))
            redirect('/dashboard');

        $data['url'] = base_url();
        
            $style['style'] = strtolower($page);
            $script['script'] = strtolower($page);
        
        $this->session->set_userdata('page','/'.$page);
        
        $this->load->view('templates/header_home' , $style);
        $this->load->view('es/pages/' . $page , $data);
        $this->load->view('templates/footer' , $script);
    }

}

?>