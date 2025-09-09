<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelKelas;

class DashboardAnggota extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
        $this->ModelKelas = new ModelKelas;
    }

    public function index()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Profile Anggota',
            'page' => 'v_dashboard_anggota',
            'anggota' => $this->ModelAnggota->ProfileAnggota($id_anggota),
        ];
        return view('v_template_anggota', $data);
    }

    public function EditProfil()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Edit Profile Anggota',
            'page' => 'v_edit_profile_anggota',
            'anggota' => $this->ModelAnggota->ProfileAnggota($id_anggota),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_anggota', $data);
    }

    public function UpdateProfile()
    {
        $id_anggota = session()->get('id_anggota');
        if (
            $this->validate([
                'id_kelas' => [
                    'label' => 'Kelas',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Belum Dipilih!',
                    ]
                ],
                'nis' => [
                    'label' => 'NIS',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Kosong!',
                    ]
                ],
                'nama_siswa' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Masih Kosong!',
                    ]
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Masih Kosong!',
                    ]
                ],
                'no_hp' => [
                    'label' => 'NO Handphone',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Masih Kosong!',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Masih Kosong!',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'erros' => [
                        'required' => '{field} Masih Kosong!',
                    ]
                ],
                'foto' => [
                    'label' => 'Foto Anggota',
                    'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'max_size' => '{field} Max 1024 Kb!',
                        'mime_in' => '{field} Format Harus JPG,PNG,JPEG!',
                    ]
                ],
            ])
        ) {
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                //Jika t
                $data = [
                    'id_anggota' => $id_anggota,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'password' => $this->request->getPost('password'),
                    'alamat' => $this->request->getPost('alamat'),
                    'verifikasi' => '1',
                ];
                $this->ModelAnggota->EditData($data);
            } else {
                //Hapus Poto Lama
                $anggota = $this->ModelAnggota->DetailData($id_anggota);
                if ($anggota['foto'] <> '') {
                    unlink('foto/' . $anggota['foto']);
                }
                //Jika Ganti Foto
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_anggota' => $id_anggota,
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'password' => $this->request->getPost('password'),
                    'alamat' => $this->request->getPost('alamat'),
                    'verifikasi' => '1',
                    'foto' => $nama_file,
                ];
                $foto->move('foto', $nama_file);
                $this->ModelAnggota->EditData($data);
            }
            session()->setFlashdata('pesan', 'Data Anggota Berhasil Diupdate !');
            return redirect()->to(base_url('DashboardAnggota/EditProfil'));
        } else {
            //Jika Tidak Lolos Validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('DashboardAnggota/EditProfil'));
        }
    }
}
