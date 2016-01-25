<?php  if (! defined('BASEPATH')) exit('No direct script access alowed');

class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('news_model');
                $this->load->helper('url_helper');
                //$this->load->helper('utility_helper');  // added Sat Jan 23 by Steph
        }

        public function view($slug = NULL)
        {
                // change $slug from number to string?
                $strslug = strval($slug);

                $data['news_item'] = $this->news_model->get_news($strslug);

                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }



        public function create()
        {
            // this is needed for form_open() in views/news/create.php
            $this->load->helper('form');
            // this is needed for validation_errors() in views/news/create.php
            $this->load->library('form_validation');


            $data['title'] = 'Create a news item';

            /*  this was debugging
            $this->load->helper('url');
            echo base_url();
            */

            // The set_rules() method takes three arguments;
            //     the name of the input field,
            //     the name to be used in error messages,
            //     and the rule.
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            // checks whether the form validation ran successfully.
            // If it did not, the form is displayed,
            // if it was submitted and passed all the rules, the model is called.
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

            }
            else
            {
                //  set_news() is a method that writes the data to the database
                //  It is in the News_model
                $this->news_model->set_news();
                $this->load->view('news/success');
            }

        }
}
