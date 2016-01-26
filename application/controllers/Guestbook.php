<?php  if (! defined('BASEPATH')) exit('No direct script access alowed');

class Guestbook extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('guest_book_model');
                $this->load->helper('url_helper');

        }

        public function view($slug = NULL)
        {
                // change $slug from number to string?
                $strslug = strval($slug);

                $data['guest_book_entry'] = $this->guest_book_model->get_guestbookentries($strslug);

                if (empty($data['guest_book_entry']))
                {
                        show_404();
                }

                $data['name'] = $data['guest_book_entry']['name'];

                $this->load->view('templates/header', $data);
                $this->load->view('guest_book/view', $data);
                $this->load->view('templates/footer');
        }

        public function index()
        {
                // this is needed for form_open() in views/guestbook/index.php
                $this->load->helper('form');
                // this is needed for validation_errors() in views/guestbook/index.php
                $this->load->library('form_validation');


                $data['guest_book'] = $this->guest_book_model->get_guestbookentries();
                $data['title'] = 'Guest Book List';

                $this->load->view('templates/header', $data);
                $this->load->view('guestbook/index', $data);
                $this->load->view('templates/footer');

        }



        public function create()
        {
            // this is needed for form_open() in views/guestbook/index.php
            $this->load->helper('form');
            // this is needed for validation_errors() in views/guestbook/index.php
            $this->load->library('form_validation');


            $data['title'] = 'Create a guest book entry';

            /*  this was debugging
            $this->load->helper('url');
            echo base_url();
            */

            // The set_rules() method takes three arguments;
            //     the name of the input field,
            //     the name to be used in error messages,
            //     and the rule.
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('comments', 'Comments', 'required');

            // checks whether the form validation ran successfully.
            // If it did not, the form is displayed,
            // if it was submitted and passed all the rules, the model is called.
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('guestbook/create');
                $this->load->view('templates/footer');

            }
            else
            {
                //  set_guestbookentry() is a method that writes the data to the database
                //  It is in the Guest_book_model
                $this->guest_book_model->set_guestbookentry();

                /*
                $this->load->view('guestbook/success');
                */
                $this->index();
            }

        }

        function delete_guestbook_entry($slug = NULL)
        {

            $this->guest_book_model->delete_guestbook_entry($slug);
            $this->index();
        }
}
