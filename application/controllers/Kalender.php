<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->library('calendar', [
            'show_next_prev' => TRUE,
            'next_prev_url'    => site_url('/Kalender'),
        ]);
    }

    public function index($year = null, $month = null)
    {
        $this->load->Model('HariBesarModel');
        
        $year = $year ?? date('Y');
        $month = $month ?? date('m');

        $event = $this->HariBesarModel->getKalender($year, $month);

        $data['varkal'] = $this->calendar->generate($year, $month, $event);
        $data['title']  = "Kalender $year";

        $this->load->view('calendar', $data);
    }

    function infohari($year, $month, $date)
    {
        $this->load->Model('HariBesarModel');
        
        if ($this->input->post('aksi')) {
            $input = [
                'kegiatan' => $this->input->post('kegiatan'),
            ];

            $config = [
                'upload_path' => './upload/',
                'allowed_types' => '*',
                'max_size' => '200000'
            ];
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('attach')) {
                $error = array('error' => $this->upload->display_errors());
                $data['error'] = $error['error'];
            } else {
                $file = array('upload_data' => $this->upload->data());
                print_r($file);
                $input['attachment'] = $file['upload_data']['full_path'];
            }

            $this->HariBesarModel->addEvent($year, $month, $date, $input);
        }
        
        $data['infohari'] = $this->HariBesarModel->getEvent($year, $month, $date);
        $data['years']    = $year;
        $data['month']    = $month;
        $data['date']  = $date;

        $data['title']  = "Info Hari";
        $this->load->view('haribesar', $data);
    }
}
