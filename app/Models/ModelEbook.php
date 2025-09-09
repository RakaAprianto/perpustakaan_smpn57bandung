<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEbook extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_ebook.id_penulis', 'left')
            ->orderBy('id_ebook', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_ebook)
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_ebook.id_penulis', 'left')
            ->where('id_ebook', $id_ebook)
            ->get()->getRowArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_ebook')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ebook')
            ->where('id_ebook', $data['id_ebook'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_ebook')
            ->where('id_ebook', $data['id_ebook'])
            ->update($data);
    }

    public function EbookBaru()
    {
        return $this->db->table('tbl_ebook')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_ebook.id_kategori', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_ebook.id_penerbit', 'left')
            ->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_ebook.id_penulis', 'left')
            ->orderBy('id_ebook', 'DESC')
            ->limit(6)
            ->get()->getResultArray();
    }
}
