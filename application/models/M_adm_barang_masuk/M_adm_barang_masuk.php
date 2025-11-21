<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }

    // Fungsi untuk mendapatkan data dari tb_prc_dpb_tf
    public function get($no_dpb = null, $jenis_bayar = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $where = "WHERE is_deleted = 0";
        
        if ($no_dpb != null && $no_dpb != '') {
            $where .= " AND no_dpb LIKE '%$no_dpb%'";
        }
        
        if ($jenis_bayar != null && $jenis_bayar != '') {
            $where .= " AND jenis_bayar = '$jenis_bayar'";
        }
        
        if ($tgl_mulai != null && $tgl_mulai != '') {
            $tgl_mulai_db = date('Y-m-d', strtotime($tgl_mulai));
            $where .= " AND tgl_dpb >= '$tgl_mulai_db'";
        }
        
        if ($tgl_selesai != null && $tgl_selesai != '') {
            $tgl_selesai_db = date('Y-m-d', strtotime($tgl_selesai));
            $where .= " AND tgl_dpb <= '$tgl_selesai_db'";
        }

        $sql = "
        SELECT 
            id_prc_dpb_tf,
            no_dpb,
            tgl_dpb,
            jenis_bayar,
            no_sjl,
            prc_admin,
            created_at,
            created_by
        FROM tb_prc_dpb_tf
        $where
        ORDER BY created_at DESC
        ";

        return $this->db->query($sql);
    }

    public function get_rincian_dpb_by_no($no_dpb = null, $jenis_bayar = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $where = "is_deleted = 0";
        
        if (!empty($no_dpb)) {
            $where .= " AND no_dpb = '$no_dpb'";
        }

        if (!empty($jenis_bayar)) {
            $where .= " AND jenis_bayar = '$jenis_bayar'";
        }

        if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
            $where .= " AND DATE(tgl_dpb) BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
        }

        $sql = "
        SELECT 
            id_prc_dpb_tf,
            no_dpb,
            tgl_dpb,
            jenis_bayar,
            no_sjl,
            prc_admin,
            created_at,
            created_by
        FROM tb_prc_dpb_tf
        WHERE $where
        ORDER BY tgl_dpb ASC
        ";

        return $this->db->query($sql);
    }

    public function get_dpb_grouped($no_dpb = null, $jenis_bayar = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $where = "WHERE is_deleted = 0";
        
        if (!empty($no_dpb)) {
            $where .= " AND no_dpb = '$no_dpb'";
        }

        if (!empty($jenis_bayar)) {
            $where .= " AND jenis_bayar = '$jenis_bayar'";
        }

        if (!empty($tgl_mulai)) {
            $tgl_mulai_db = date('Y-m-d', strtotime($tgl_mulai));
            $where .= " AND tgl_dpb >= '$tgl_mulai_db'";
        }
        
        if (!empty($tgl_selesai)) {
            $tgl_selesai_db = date('Y-m-d', strtotime($tgl_selesai));
            $where .= " AND tgl_dpb <= '$tgl_selesai_db'";
        }

        $sql = "
        SELECT 
            no_dpb,
            COUNT(*) as total_record,
            MIN(tgl_dpb) as tanggal_awal,
            MAX(tgl_dpb) as tanggal_akhir,
            GROUP_CONCAT(DISTINCT jenis_bayar) as jenis_bayar_list
        FROM tb_prc_dpb_tf
        $where
        GROUP BY no_dpb
        ORDER BY tanggal_awal ASC
        ";

        return $this->db->query($sql);
    }

    public function data_dpb_detail($filter = [])
    {
        $where = "WHERE is_deleted = 0";
        
        if (!empty($filter['no_dpb'])) {
            $where .= " AND no_dpb = '{$filter['no_dpb']}'";
        }
        
        if (!empty($filter['jenis_bayar'])) {
            $where .= " AND jenis_bayar = '{$filter['jenis_bayar']}'";
        }
        
        if (!empty($filter['tgl_mulai'])) {
            $tgl_mulai_db = date('Y-m-d', strtotime($filter['tgl_mulai']));
            $where .= " AND tgl_dpb >= '$tgl_mulai_db'";
        }
        
        if (!empty($filter['tgl_selesai'])) {
            $tgl_selesai_db = date('Y-m-d', strtotime($filter['tgl_selesai']));
            $where .= " AND tgl_dpb <= '$tgl_selesai_db'";
        }

        $sql = "
        SELECT 
            id_prc_dpb_tf,
            no_dpb,
            tgl_dpb,
            jenis_bayar,
            no_sjl,
            prc_admin,
            created_at,
            created_by
        FROM tb_prc_dpb_tf
        $where
        ORDER BY tgl_dpb ASC, no_dpb ASC
        ";
            
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $this->db->where('id_prc_dpb_tf', $data['id_prc_dpb_tf']);
        return $this->db->update('tb_prc_dpb_tf', ['is_deleted' => 1]);
    }
}