<?php   if (! defined('BASEPATH')) exit('No direct script access alowed');

class Guest_book_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        public function get_guestbookentries($slug = FALSE)
        {
          if ($slug === FALSE)
          {
                  $query = $this->db->get('guest_book');
                  return $query->result_array();
          }

          $query = $this->db->get_where('guest_book', array('slug' => $slug));
          return $query->row_array();
        }

        //  set_guestbookentry() takes care of inserting the guestbook entry into the database.
        public function set_guestbookentry()
        {
            // this next line is needed in order to use url_title()
            $this->load->helper('url');

            //  replacing all spaces by dashes (-)
            //  and makes sure everything is in lowercase characters.
            //  This leaves you with a nice slug, perfect for creating URIs.

            // post() method makes sure the data is sanitized,
            // protecting you from nasty attacks from others
            $slug = url_title($this->input->post('name'), 'dash', TRUE);

            $data = array(
                'name'     => $this->input->post('name'),
                'slug'     => $slug,
                'email'    => $this->input->post('email'),
                'comments' => $this->input->post('comments')
            );

            return $this->db->insert('guest_book', $data);
        }

        //  delete_guestbook_item() takes care of deleting the guest book entry from the database.
        public function delete_guestbook_entry($slug)
        {

          $result = $this->db->delete('guest_book', array('slug' => $slug));

        }

}
