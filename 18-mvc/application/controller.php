<?php
    class Controller {
        public $load;
        public $model;

        public function __construct() {
            $this->load  = new Load;
            $this->model = new Model;

            $data = $this->model->get('pokemons');
            $this->load->view('Welcome.php', $data);
        }
    }