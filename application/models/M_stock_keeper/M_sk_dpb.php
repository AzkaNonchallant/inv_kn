<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sk_dpb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get_filter_brng()
    {
        $sql = "SELECT DISTINCT id_prc_master_barang FROM tb_prc_ppb ORDER BY id_accounting_ppb ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_master_barang()
    {
        $sql = "SELECT * FROM tb_prc_master_barang ORDER BY nama_barang ASC";
        return $this->db->query($sql)->result_array();
    } 

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_ppb_tf 
        SET
            no_ppb_accounting = '$data[no_ppb_accounting]', 
            departement = '$data[departement]', 
            form_ppb = '$data[form_ppb]', 
            jenis_ppb = '$data[jenis_ppb]', 
            tgl_ppb = '$data[tgl_ppb]', 
            tgl_pakai = '$data[tgl_pakai]', 
            ket = '$data[ket]', 
            nama_admin = '$data[nama_admin]', 
            nama_spv = '$data[nama_spv]', 
            nama_manager = '$data[nama_manager]', 
            nama_direktur = '$data[nama_direktur]', 
            updated_at = NOW(), 
            updated_by = '$id_user' 
        WHERE no_ppb_accounting = '$data[no_ppb_accounting]'";

        // Logging query untuk debugging
        log_message('debug', 'Query update: ' . $this->db->last_query());
        
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_ppb_tf( 
        no_ppb_accounting, departement, form_ppb,
        jenis_ppb, tgl_ppb,tgl_pakai, ket, nama_admin,
        nama_spv, nama_manager, nama_pm, nama_direktur,
        created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[no_ppb_accounting]',
        '$data[departement]', 
        '$data[form_ppb]', 
        '$data[jenis_ppb]',
        '$data[tgl_ppb]', 
        '$data[tgl_pakai]',
        '$data[ket]', 
        '$data[nama_admin]', 
        '$data[nama_spv]', 
        '$data[nama_manager]',
        '$data[nama_pm]',
        '$data[nama_direktur]',
        NOW(),'$id_user','0000-00-00','','0')
        ";
        return $this->db->query($sql);
    }

    public function add_permintaan_barang($data)
{
    $id_user = $this->id_user();
    $sql = "
    INSERT INTO tb_prc_ppb(id_prc_master_barang, no_ppb_accounting, jumlah, created_at, created_by, updated_at, updated_by, is_deleted) 
    VALUES ('$data[id_prc_master_barang]', '$data[no_ppb_accounting]', '$data[jumlah]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')
    ";
    return $this->db->query($sql);
}



    public function get_barang_detail($kode_barang)
    {
        $this->db->select('nama_barang, spek, unit, jumlah');
        $this->db->from('tb_prc_master_barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get()->row_array();
    }

    public function get($id = null)
    {
        $sql = "
        SELECT a.*
        FROM tb_prc_dpb a
        
        WHERE a.is_deleted = 0 
        
        ORDER BY a.id_prc_dpb ASC";
        return $this->db->query($sql);

    }

    public function cek_kode_barang($kode_barang)
    {
        $this->db->select('COUNT(*) AS count_sj');
        $this->db->from('tb_prc_master_barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get();
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql1 = "
            DELETE FROM tb_prc_ppb_tf 
            WHERE no_ppb_accounting='$data[no_ppb_accounting]'
        ";
        $sql = "
           DELETE FROM tb_prc_ppb
            WHERE no_ppb_accounting='$data[no_ppb_accounting]'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }


    public function ambil_labelp($no_ppb_accounting)
    {
        $sql = "
        SELECT a.*,b.nama_barang, b.spek, b.satuan, c.ket, c.nama_spv, c.nama_manager, c.nama_pm, c.nama_admin, c.tgl_pakai, c.no_ppb_accounting, c.jenis_ppb, c.form_ppb
        FROM tb_prc_ppb a
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_tf c ON a.no_ppb_accounting = c.no_ppb_accounting
        WHERE a.is_deleted = 0 AND a.no_ppb_accounting = '$no_ppb_accounting' ORDER BY a.id_accounting_ppb ASC";
        return $this->db->query($sql);
    }
    public function ambil_label($no_dpb)
    {
        $sql = "   
        SELECT a.*,d.nama_barang, d.spek, d.satuan, d.kode_barang, c.ket, c.nama_spv, c.nama_manager, 
        c.nama_pm, c.tgl_ppb, c.nama_admin, c.jenis_ppb, c.form_ppb, b.id_prc_master_barang, e.nama_po_supplier
        FROM tb_prc_dpb a
        LEFT JOIN tb_prc_ppb b ON a.no_ppb_accounting = b.no_ppb_accounting
        LEFT JOIN tb_prc_master_barang d ON b.id_prc_master_barang = d.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_tf c ON a.no_ppb_accounting = c.no_ppb_accounting
        LEFT JOIN tb_prc_ppb_supplier e ON d.id_prc_ppb_supplier = e.id_prc_ppb_supplier
        WHERE a.is_deleted = 0 AND a.no_dpb = '$no_dpb'  ORDER BY a.id_prc_dpb ASC";
        return $this->db->query($sql); 
    }

    public function data_ppb_barang($no_ppb_accounting)
    {
        $sql = "
            SELECT a.*, b.nama_barang, b.kode_barang, b.spek, b.satuan, c.nama_po_supplier
            FROM tb_prc_ppb a
            LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
            LEFT JOIN tb_prc_ppb_supplier c ON b.id_prc_ppb_supplier = c.id_prc_ppb_supplier
            WHERE a.no_ppb_accounting = '$no_ppb_accounting' ORDER BY a.id_accounting_ppb ASC";
        return $this->db->query($sql);
    }

    public function updateStatus($data) {
        return $this->db->insert('tb_prc_ppb', $data);
    }

    public function getUserApprovals($no_ppb_accounting) {
        return $this->db->get_where('tb_prc_ppb', ['no_ppb_accounting' => $no_ppb_accounting])->result_array();
    }

    public function getAllApprovals() {
        return $this->db->get('tb_prc_ppb')->result_array();
    }

    public function approve($no_ppb_accounting, $approval_level)
    {
        $data = [$approval_level => 'Approved'];

        $this->db->where('no_ppb_accounting', $no_ppb_accounting);
        // $sql = "
        // UPDATE `tb_prc_ppb_tf`
        // SET `acc_spv`='approved'
        // WHERE `id_accounting_ppb_tf`='$id_accounting_ppb_tf';
        // ";
        return $this->db->update('tb_prc_ppb_tf', $data);
    }
}
?>