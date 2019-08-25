<?php
class News_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function get_news($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $img = 'noticia.png';
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'img' => $img
        );

        return $this->db->insert('news', $data);
    }


    public function delete_news($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('news');
    }


    public function update_news($id, $img)
    {
        $this->load->helper('url');
        $this -> db -> where('id', $id);

        if(empty($img)){
            $data = array(
                'title' => $this->input->post('title'),
                'text' => $this->input->post('text')
                );
        }else{
            
            $data = array(
            'title' => $this->input->post('title'),
            'text' => $this->input->post('text'),
            'img' => $img
            );
        }

        return $this->db->update('news', $data);
    }

}
