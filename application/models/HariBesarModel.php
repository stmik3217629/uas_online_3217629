<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HariBesarModel extends CI_Model
{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getKalender($tahun = null, $bulan = null)
    {
        // $query = "SELECT DISTINCT 
        //     LEFT(tanggal, 4) AS tahun,
        //     MID(tanggal, 6, 2) AS bulan,
        //     RIGHT(tanggal, 2) AS tanggal
        //     FROM giat WHERE left(tanggal, 7) = '$tahun-$bulan'";
        // $calendar = $this->db->query($query)->result('array');

        // if (!$calendar) return [];

        $events = [];
        for($i = 1; $i < 31; $i++) {
            $tanggal = str_pad($i, 2, '0', STR_PAD_LEFT);
            $events[$i] = site_url("kalender/infohari/$tahun/$bulan/$tanggal");
        }

        return $events;
    }

    public function getEvent($tahun, $bulan, $tanggal)
    {
        $tanggal = (int) $tanggal;

        $query = "SELECT * FROM giat WHERE tanggal = '$tahun-$bulan-$tanggal'";
        $calendar = $this->db->query($query)->result('array');

        if (!$calendar) return [];
        
        return $calendar;
    }

    public function addEvent($tahun, $bulan, $tanggal, $data)
    {
        $tanggal = "$tahun-$bulan-$tanggal";
        $query = "INSERT INTO giat (tanggal, kegiatan, attachment) values ('$tanggal', '$data[kegiatan]', '$data[attachment]')";

        $this->db->query($query);
    }
}