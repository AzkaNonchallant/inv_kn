<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dpb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
}