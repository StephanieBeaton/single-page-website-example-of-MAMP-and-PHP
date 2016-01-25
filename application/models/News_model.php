<?php   if (! defined('BASEPATH')) exit('No direct script access alowed');

class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        public function get_news($slug = FALSE)
        {
          if ($slug === FALSE)
          {
                  $query = $this->db->get('news');
                  return $query->result_array();
          }

          $query = $this->db->get_where('news', array('slug' => $slug));
          return $query->row_array();
        }

        //  set_news() takes care of inserting the news item into the database.
        public function set_news()
        {
            // this next line is needed in order to use url_title()
            $this->load->helper('url');

            //  replacing all spaces by dashes (-)
            //  and makes sure everything is in lowercase characters.
            //  This leaves you with a nice slug, perfect for creating URIs.

            // post() method makes sure the data is sanitized,
            // protecting you from nasty attacks from others
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

            return $this->db->insert('news', $data);
        }

        //  delete_news_item() takes care of deleting the news item from the database.
        public function delete_news_item($slug)
        {

          $result = $this->db->delete('news', array('slug' => $slug));

        }

}
