<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_po_reg extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()          
    {
        return $this->session->userdata("id_user");
    } 

    public function get($id = null){
        $sql = "
        SELECT a.*, b.spek, b.nama_barang, c.nama_supplier, c.golongan
        FROM tb_prc_po_reg a
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_supplier c ON a.id_supplier = c.id_supplier
        WHERE a.is_deleted = 0 
        ORDER BY a.tgl_po_reg ASC";
    
        // Logging query untuk debugging
        log_message('debug', 'Query get: ' . $this->db->last_query());
    
        return $this->db->query($sql);
    }
                                                                                                
    

    public function add($data)
{
    $id_user = $this->id_user();
    $sql = "
    INSERT INTO tb_prc_po_reg (id_prc_po_reg, no_po_reg, tgl_po_reg, id_supplier, id_prc_master_barang, jumlah, harga_perunit, total_value, metode, shipment, pic1, pic2, no_ppb, harga_netto, pajak, total_harga, prc_admin, created_at, created_by, updated_at, updated_by, is_deleted)
    VALUES ('$data[id_prc_po_reg]', '$data[no_po_reg]', '$data[tgl_po_reg]', '$data[id_supplier]', '$data[id_prc_master_barang]', '$data[jumlah]', '$data[harga_perunit]', '$data[total_value]', '$data[metode]', '$data[shipment]', '$data[pic1]', '$data[pic2]', '$data[no_ppb]', '$data[harga_netto]', '$data[pajak]', '$data[total_harga]', '$data[prc_admin]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

    return $this->db->query($sql);
}


    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_po_reg
        SET 
            
            no_po_reg = '$data[no_po_reg]',
            tgl_po_reg = '$data[tgl_po_reg]',
            id_supplier = '$data[id_supplier]',
            id_prc_master_barang = '$data[id_prc_master_barang]',
            jumlah = '$data[jumlah]',
            harga_perunit = '$data[harga_perunit]',
            total_value = '$data[total_value]',
            metode = '$data[metode]',
            shipment = '$data[shipment]',
            pic1 = '$data[pic1]',
            pic2 = '$data[pic2]',
            no_ppb = '$data[no_ppb]',
            harga_netto = '$data[harga_netto]',
            pajak = '$data[pajak]',
            total_harga = '$data[total_harga]',
            prc_admin = '$data[prc_admin]',
            updated_at = NOW(),   
            updated_by = '$id_user' 
        WHERE id_prc_po_reg = '$data[id_prc_po_reg]'";
        
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM tb_prc_po_reg
        WHERE id_prc_po_reg='$data[id_prc_po_reg]'
        ";
        return $this->db->query($sql);
    }
    public function cek_no_po($no_po_import)
    {
        $sql = "
            SELECT COUNT(a.no_po_import) count_sj FROM tb_prc_po_import a
            WHERE a.no_po_import = '$no_po_import' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}