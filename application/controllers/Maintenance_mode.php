<?php

class Maintenance_mode extends CI_Controller
{
    public function index()
    {
        // $this->output->set_status_header('503');
        $this->load->view('maintenance_mode_view');
    }
}
