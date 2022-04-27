<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class ModelLaporan extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }
}
