<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_po_rekap extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()          
    {
        return $this->session->userdata("id_user");
    }

    public function getLastOrderNumber()
    {
        $sql = "SELECT no_order FROM tb_prc_rekap_import ORDER BY id_prc_rekap_import DESC LIMIT 1";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
          
            $last_order = $query->row_array();
            
        
            if (isset($last_order['no_order'])) {
                return $last_order['no_order'];  
            } else {
        
                log_message('error', 'No "no_order" field in query result');
                return null;
            }
        } else {
            
            log_message('error', 'No data found in tb_prc_rekap_import');
            return null;
        }
    }
    

    public function get($id = null)
    {
        $sql = "
        SELECT  a.*, c.no_po_import, c.id_prc_master_barang, b.nama_barang, b.spek, c.jumlah, c.harga_perunit, c.total_harga, e.metode, d.nama_po_supplier
        FROM tb_prc_rekap_import a
        LEFT JOIN tb_prc_po_import c ON a.id_prc_po_import = c.id_prc_po_import
        LEFT JOIN tb_prc_po_import_tf e ON c.no_po_import = e.no_po_import
        LEFT JOIN tb_prc_master_barang b ON c.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_supplier d ON b.id_prc_ppb_supplier = d.id_prc_ppb_supplier
        WHERE a.is_deleted = 0 ORDER BY a.tgl_pib, created_at ASC";
    
        return $this->db->query($sql);
    }

    public function get_rekap($id = null)
    {
        $sql = "
        SELECT a.*, b.id_prc_master_barang, b.kode_barang, b.nama_barang, b.jenis_barang, b.tipe_barang, b.spek, b.satuan, c.nama_po_supplier,  c.pic_po_supplier, d.metode
        FROM tb_prc_po_import a
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_supplier c ON b.id_prc_ppb_supplier = c.id_prc_ppb_supplier
        LEFT JOIN tb_prc_po_import_tf d ON a.no_po_import = d.no_po_import
        WHERE a.is_deleted = 0 ORDER BY a.no_po_import ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_rekap_import (id_prc_po_import, no_order, tgl_pib, no_pib, no_invoice, tgl_invoice, tgl_etd, tgl_eta, no_bl, voyager, no_voyager, prc_admin, created_at, created_by, update_at, update_by, is_deleted) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, '0000-00-00', '', 0)";
        
        return $this->db->query($sql, [
            $data['id_prc_po_import'],
            $data['no_order'],
            $data['tgl_pib'],
            $data['no_pib'],
            $data['no_invoice'],
            $data['tgl_invoice'],
            $data['tgl_etd'],
            $data['tgl_eta'],
            $data['no_bl'],
            $data['voyager'],
            $data['no_voyager'],
            $data['prc_admin'],

            $id_user
        ]);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_rekap_import
        SET id_prc_po_import = ?, no_order = ?, tgl_pib = ?, no_pib = ?, no_invoice = ?, tgl_invoice = ?, tgl_etd = ?, tgl_eta = ?, no_bl = ?, voyager = ?, no_voyager = ?, prc_admin = ?, status = ?, update_at = NOW(), update_by = ?
        WHERE id_prc_rekap_import = ?";
        
        return $this->db->query($sql, [
            $data['id_prc_po_import'],
            $data['no_order'],
            $data['tgl_pib'],
            $data['no_pib'],
            $data['no_invoice'],
            $data['tgl_invoice'],
            $data['tgl_etd'],
            $data['tgl_eta'],
            $data['no_bl'],
            $data['voyager'],
            $data['no_voyager'],
            $data['prc_admin'],
            $data['status'],
            $id_user,
            $data['id_prc_rekap_import']
        ]);
    }

    public function update_status($data) {
        
        $id_user = $this->id_user(); 
        $sql = "
            UPDATE tb_prc_rekap_import
            SET 
                `status` = '$data[status]',
                `update_at` = NOW(),   
                `update_by` = '$id_user' 
            WHERE `id_prc_rekap_import` = '$data[id_prc_rekap_import]'
        ";

        return $this->db->query($sql);
        
    }

    public function delete($data)
    {
        $sql = "
        DELETE FROM tb_prc_rekap_import WHERE id_prc_rekap_import = ?";
        return $this->db->query($sql, [$data['id_prc_rekap_import']]);
    }

    public function cek_no_po_rekap($no_po_import)
    {
        $sql = "SELECT COUNT(a.no_po_import) count_sj FROM tb_prc_po_import a WHERE a.no_po_import = ? AND a.is_deleted = 0";
        return $this->db->query($sql, [$no_po_import]);
    }
}
?>