<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');

        // session login
        //if ($this->session->userdata('admin') != true) {
        // $url = base_url('Admin/f');
        // redirect($url);
        //}
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function f()
    {
        // $this->load->view('Admin/login');
        echo "cetak";
    }

    public function dashboard()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }




    // awal function siswa

    public function siswa()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa', $data);
        $this->load->view('template/footer');
    }

    public function siswa_tambah()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_tambah');
        $this->load->view('template/footer');
    }

    public function siswa_tambah_up()
    {
        $nisn = $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_siswa');
        $password = $this->input->post('password');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $agama = $this->input->post('agama');
        $kompetensi_keahlian = $this->input->post('kompetensi_keahlian');
        $alamat = $this->input->post('alamat');

        $data_tambah = array(
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'password' => sha1($password),
            'tgl_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'agama' => $agama,
            'kompetensi_keahlian' => $kompetensi_keahlian,
            'alamat' => $alamat
        );

        $this->M_admin->siswa_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa');
    }

    public function siswa_detail($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_detail', $data);
        $this->load->view('template/footer');
    }

    // akhir function siswa


    // awal function kelas

    public function kelas()
    {
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas', $data);
        $this->load->view('template/footer');
    }

    public function kelas_tambah()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas_tambah');
        $this->load->view('template/footer');
    }

    public function kelas_tambah_up()
    {
        $tingkatan = $this->input->post('tingkatan');
        $jurusan = $this->input->post('jurusan');
        $kode_kelas = $this->input->post('kode_kelas');
        $angkatan = $this->input->post('angkatan');

        $data_tambah = array(
            'tingkatan' => $tingkatan,
            'jurusan' => $jurusan,
            'kode_kelas' => $kode_kelas,
            'angkatan' => $angkatan
        );

        $this->M_admin->kelas_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Kelas Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/kelas');
    }


    public function kelas_hapus($id_kelas)
    {
        $id_kelas = array('id_kelas' => $id_kelas);

        $success = $this->M_admin->kelas_hapus($id_kelas);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/kelas');
    }

    public function kelas_edit($id_kelas)
    {
        $data['kelas_edit'] = $this->M_admin->kelas_edit($id_kelas);

        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas_edit', $data);
        $this->load->view('template/footer');
    }

    public function kelas_edit_up()
    {
        $id_kelas = $this->input->post('id_kelas');
        $tingkatan = $this->input->post('tingkatan');
        $jurusan = $this->input->post('jurusan');
        $kode_kelas = $this->input->post('kode_kelas');
        $angkatan = $this->input->post('angkatan');

        // echo $id_kelas . $tingkatan . $jurusan . $kode_kelas . $angkatan;

        $data_edit = array(
            'tingkatan' => $tingkatan,
            'jurusan' => $jurusan,
            'kode_kelas' => $kode_kelas,
            'angkatan' => $angkatan
        );

        $id_kelas = array('id_kelas' => $id_kelas);
        $this->M_admin->kelas_edit_up($data_edit, $id_kelas);

        $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit Kelas Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('Admin/kelas');
    }


    // akhir function kelas


    //
    public function pelanggaran()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/pelanggaran', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_tambah()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/pelanggaran_tambah');
        $this->load->view('template/footer');
    }

    public function prestasi()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/prestasi', $data);
        $this->load->view('template/footer');
    }

    // Password
    public function password()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/password');
        $this->load->view('template/footer');
    }

    // tekno awal



    public function siswa_edit_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nama_siswa = $this->input->post('nama_siswa');
        $nisn = $this->input->post('nisn');
        $kelas = $this->input->post('kelas');
        $kondisi_mpls = $this->input->post('kondisi_mpls');

        $kode_siswa = array('id_siswa' => $id_siswa);

        $data_edit = array(
            'nama_siswa' => $nama_siswa,
            'nisn' => $nisn,
            'kelas' => $kelas,
            'kondisi_mpls' => $kondisi_mpls
        );

        $this->M_admin->siswa_edit_up($data_edit, $kode_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit data berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa_detail/' . $id_siswa);
    }

    public function sertifikat_cetak($id_siswa)
    {
        $data['tampil'] = $this->M_admin->sertifikat_cetak($id_siswa);
        $this->load->view('siswa/sertifikat', $data);
    }
}
