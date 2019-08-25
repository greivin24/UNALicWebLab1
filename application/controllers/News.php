<?php
class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        // $set_data = $this->session->all_userdata();
        // $data['name'] = $set_data['session_data']['name'];
        // $data['email'] = $set_data['session_data']['email'];
        // $data['urlImg'] = $set_data['session_data']['urlImg'];

        //Returns User's name 
         $dataUser['name'] =  $this->session->userdata('name');
         $dataUser['email'] =  $this->session->userdata('email');
         $dataUser['urlImg'] =  $this->session->userdata('urlImg');
         $dataUser['loginProvedor'] =  $this->session->userdata('loginProvedor');

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'Noticias';

        $this->load->view('templates/header', $dataUser);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($id);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $dataUser['name'] =  $this->session->userdata('name');
        $dataUser['email'] =  $this->session->userdata('email');
        $dataUser['urlImg'] =  $this->session->userdata('urlImg');

        $this->load->view('templates/header', $dataUser);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        $data['title'] = 'Crear Nueva Noticia';

        $dataUser['name'] =  $this->session->userdata('name');
        $dataUser['email'] =  $this->session->userdata('email');
        $dataUser['urlImg'] =  $this->session->userdata('urlImg');
        $dataUser['loginProvedor'] =  $this->session->userdata('loginProvedor');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $dataUser);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news();
            $this->session->set_userdata('msg', 'Noticia creada exitosamente.');
            redirect('news');
        }
    }


    public function delete($id) {   
        $this->load->model("News_model");
        $this->News_model->delete_news($id);
        $this->session->set_userdata('msg', 'Noticia eliminada exitosamente.');
        redirect('news');

    }



    public function update($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Actualizar Noticia';

        $data['news_item'] = $this->news_model->get_news($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        $dataUser['name'] =  $this->session->userdata('name');
         $dataUser['email'] =  $this->session->userdata('email');
         $dataUser['urlImg'] =  $this->session->userdata('urlImg');
         $dataUser['loginProvedor'] =  $this->session->userdata('loginProvedor');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $dataUser);
            $this->load->view('news/update', $data);
            $this->load->view('templates/footer');
            

        } else {
            $img = $this->loadImagen();
            $this->news_model->update_news($id, $img);
            $this->session->set_userdata('msg', 'Noticia actualizada exitosamente.');
            redirect('news');
            
        }
    }


        function loadImagen() {

            $mi_archivo = 'upload';
            $config['upload_path'] = "imgNoticias/";
            $config['file_name'] = date('dmyHms').'-'.$_FILES['upload']['name'];
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = "50000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";
    
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload($mi_archivo)) {
                return "";
            }
            return $this->upload->data()['file_name'];
        }


}
