<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfirmasi_pesanan extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    
    // Get all data dengan join customer - DIPERBAIKI (tanpa stok)
    public function get_all($nama_customer = null, $date_from = null, $date_until = null) {
    $sql = "
        SELECT 
            a.*,
            b.id_master_print, 
            b.kode_print,
            b.logo_print,
            c.nama_customer,
            c.kode_customer,
            c.id_customer, 
            d.id_master_kw_cap, 
            d.kode_warna_cap,
            d.warna_cap,
            e.id_master_kw_body,
            e.kode_warna_body,
            e.warna_body
        FROM tb_mkt_kp a
        LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
        LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
        LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
        LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
        WHERE a.is_deleted = 0 
    ";
    
    // Apply filters
    if ($nama_customer && $nama_customer != '') {
        $sql .= " AND c.nama_customer = '" . $this->db->escape_str($nama_customer) . "'";
    }
    
    // PERBAIKAN: Konversi tanggal filter dari dd/mm/yyyy ke Y-m-d
    if ($date_from && $date_until && $date_from != '' && $date_until != '') {
        $tgl_mulai = $this->convertFilterDate($date_from);
        $tgl_akhir = $this->convertFilterDate($date_until);
        $sql .= " AND a.tgl_kp >= '" . $tgl_mulai . "' AND a.tgl_kp <= '" . $tgl_akhir . "'";
    }
    
    $sql .= " ORDER BY a.tgl_kp DESC";
    
    return $this->db->query($sql)->result_array();
}

/**
 * Convert filter date from dd/mm/yyyy to Y-m-d
 */
private function convertFilterDate($date) {
    $parts = explode('/', $date);
    if (count($parts) === 3) {
        return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
    }
    return $date; // fallback
}
    
    // Get customers untuk dropdown
    public function get_customers() {
        $this->db->select('id_customer, nama_customer, kode_customer');
        $this->db->from('tb_mkt_master_customer');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('nama_customer', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get by ID dengan join - DIPERBAIKI (tanpa stok)
    public function get_by_id($id) {
        $sql = "
            SELECT 
                a.*,
                b.id_master_print, 
                b.kode_print,
                b.logo_print,
                c.nama_customer,
                c.kode_customer,
                c.id_customer, 
                d.id_master_kw_cap, 
                d.kode_warna_cap,
                d.warna_cap,
                e.id_master_kw_body,
                e.kode_warna_body,
                e.warna_body
            FROM tb_mkt_kp a
            LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
            LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
            LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
            WHERE a.Id_mkt_kp = ? AND a.is_deleted = 0
        ";
        return $this->db->query($sql, [$id])->row_array();
    }
    
    // Insert data
    public function insert($data) {
        $id_user = $this->id_user();
        return $this->db->insert('tb_mkt_kp', $data);
    }
    
    // Update data
    public function update($id, $data) {
        $this->db->where('Id_mkt_kp', $id);
        return $this->db->update('tb_mkt_kp', $data);
    }
    
    // Delete data (soft delete)
    public function delete($id) {
        $this->db->where('Id_mkt_kp', $id);
        return $this->db->update('tb_mkt_kp', [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('nama')
        ]);
    }
    
    // Cek No KP sudah ada
    public function cek_no_kp($no_kp) {
        $this->db->where('No_kp', $no_kp);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get('tb_mkt_kp');
        return $query->num_rows() > 0;
    }
    
    // Get prints by customer
    public function get_prints_by_customer($id_customer) {
        $this->db->select('id_master_print, kode_print, logo_print');
        $this->db->from('tb_mkt_master_print');
        $this->db->where('id_customer', $id_customer);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_print', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get warna cap untuk dropdown
    public function get_warna_cap() {
        $this->db->select('id_master_kw_cap, kode_warna_cap, warna_cap');
        $this->db->from('tb_mkt_master_kw_cap');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_warna_cap', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get warna body untuk dropdown
    public function get_warna_body() {
        $this->db->select('id_master_kw_body, kode_warna_body, warna_body');
        $this->db->from('tb_mkt_master_kw_body');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_warna_body', 'ASC');
        return $this->db->get()->result_array();
    }
}
?>