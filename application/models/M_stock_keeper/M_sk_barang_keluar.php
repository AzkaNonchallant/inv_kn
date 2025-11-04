<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sk_barang_keluar extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function id_user()
    {
        return $this->session->userdata("id_user");
    }

    /**
     * Mengambil data barang keluar.
     * @param int|null $id
     * @return CI_DB_result
     */
    public function get($id = null)
    {
        $this->db->select('a.*, b.nama_barang, b.spek, b.unit');
        $this->db->from('tb_sk_barang_keluar a');
        $this->db->join('tb_sk_masterbarang b', 'a.id_sk_barang = b.id_sk_barang', 'left');
        $this->db->where('a.is_deleted', 0);
        if ($id !== null) {
            $this->db->where('a.id_sk_barang_keluar', $id);
        }
        $this->db->order_by('a.tgl_keluar', 'ASC');
        return $this->db->get();
    }

    /**
     * Menambahkan data barang keluar.
     * @param array $data
     * @return bool
     */
    public function add($data)
    {
        $data_insert = [
            'id_sk_barang' => $data['id_sk_barang'],
            'tgl_keluar'   => $data['tgl_keluar'],
            'jumlah_keluar'       => $data['jumlah_keluar'],
            'op_sk'        => $data['op_sk'],
            'created_at'   => date('Y-m-d H:i:s'),
            'created_by'   => $this->id_user(),
            'updated_at'   => '0000-00-00 00:00:00',
            'updated_by'   => '',
            'is_deleted'   => 0
        ];

        return $this->db->insert('tb_sk_barang_keluar', $data_insert);
    }

    /**
     * Memperbarui data barang keluar.
     * @param array $data
     * @return bool
     */
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_sk_barang_keluar 
        SET tgl_keluar = '$data[tgl_keluar]', 
            id_sk_barang = '$data[id_sk_barang]', 
            jumlah_keluar = '$data[jumlah_keluar]', 
            op_sk = '$data[op_sk]', 
            updated_at = NOW(), 
            updated_by = '$id_user' 
        WHERE id_sk_barang_keluar = '$data[id_sk_barang_keluar]'";

        // Logging query untuk debugging
        log_message('debug', 'Query update: ' . $this->db->last_query());
        
        return $this->db->query($sql);
    }

    /**
     * Menghapus data barang keluar.
     * @param array $data
     * @return bool
     */
    public function delete($data)
    {
        return $this->db->delete('tb_sk_barang_keluar', ['id_sk_barang_keluar' => $data['id_sk_barang_keluar']]);
    }
}
