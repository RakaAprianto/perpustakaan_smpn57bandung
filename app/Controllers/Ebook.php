<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelEbook;
use App\Models\ModelPenulis;
use App\Models\ModelPenerbit;


class EBook extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelEbook = new ModelEbook;
        $this->ModelKategori = new ModelKategori;
        $this->ModelPenulis = new ModelPenulis;
        $this->ModelPenerbit = new ModelPenerbit;
    }
    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'E-Book',
            'page' => 'ebook/v_index',
            'ebook' => $this->ModelEbook->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'ebook',
            'judul' => 'Add E-Book',
            'page' => 'ebook/v_adddata',
            'kategori' => $this->ModelKategori->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanData()
    {
        if (
            $this->validate([
                'isbn' => [
                    'label' => 'ISBN',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'judul_ebook' => [
                    'label' => 'Judul Buku',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'id_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'id_penulis' => [
                    'label' => 'Penulis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'id_penerbit' => [
                    'label' => 'Penerbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'tahun' => [
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'bahasa' => [
                    'label' => 'Bahas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'halaman' => [
                    'label' => 'Jumlah Halaman',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
                'cover' => [
                    'label' => 'Cover Buku',
                    'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi!',
                        'max_size' => '{field} Max 2048 Kb!',
                        'mime_in' => '{field} Format Harus JPG,PNG,JPEG!',
                    ]
                ],
                'ebooks' => [
                    'label' => 'Upload E-Book',
                    'rules' => 'uploaded[ebooks]|max_size[ebooks,2048]|ext_in[ebooks,pdf]',
                    'errors' => [
                        'uploaded' => '{field} Wajib Diisi!',
                        'max_size' => '{field} Max 2048 Kb!',
                        'ext_in' => '{field} Format Harus PDF!',
                    ]
                ],
                'deskripsi' => [
                    'label' => 'Deskripsi/Sinopsis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi!',
                    ]
                ],
            ])
        ) {
            //Jika Lolos Validasi
            $cover = $this->request->getFile('cover');
            $nama_file = $cover->getRandomName();
            $ebook = $this->request->getFile('ebooks');
            $ebooks_file = $ebook->getRandomName();
            $data = [
                'judul_ebook' => $this->request->getPost('judul_ebook'),
                'isbn' => $this->request->getPost('isbn'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_penulis' => $this->request->getPost('id_penulis'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'halaman' => $this->request->getPost('halaman'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'cover' => $nama_file,
                'ebooks' => $ebooks_file,
            ];
            //Memindahkan file foto ke folder foto
            $cover->move('cover', $nama_file);
            $ebook->move('ebooks', $ebooks_file);
            $this->ModelEbook->AddData($data);
            session()->setFlashdata('pesan', 'Data Berhasil DiTambahkan! ');
            return redirect()->to(base_url('Ebook/AddData'));
        } else {
            //Jika Tidak Lolos Validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ebook/AddData'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteData($id_ebook)
    {
        $ebook = $this->ModelEbook->DetailData($id_ebook);
        if ($ebook['cover'] <> '') {
            unlink('cover/' . $ebook['cover']);
        }
        $ebook = $this->ModelEbook->DetailData($id_ebook);
        if ($ebook['ebooks'] <> '') {
            unlink('ebooks/' . $ebook['ebooks']);
        }
        $data = [
            'id_ebook' => $id_ebook
        ];
        $this->ModelEbook->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus! ');
        return redirect()->to(base_url('Ebook'));
    }
}
