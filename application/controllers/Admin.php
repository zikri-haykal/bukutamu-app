<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Bukutamu_model');
    $this->load->model('Janji_model');
    $this->load->model('Konten_model');
    $this->load->model('Acara_model');
    $this->load->model('Saran_model');
    $this->load->model('User_model');
    $this->load->model('Tamuacara_model');
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['harian'] = $this->Bukutamu_model->get();
    $data['barisAcara'] = $this->Acara_model->countRows();
    $data['barisBuku'] = $this->Bukutamu_model->countRows();
    $data['barisJanji'] = $this->Janji_model->countRows();
    $data['barisUser'] = $this->User_model->countRows();
    $this->load->view('layout/header', $data);
    $this->load->view('admin/indexAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function buku()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['harian'] = $this->Bukutamu_model->get();
    $this->load->view('layout/header', $data);
    $this->load->view('admin/bukuAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function deleteBuku($id)
  {
    $this->Bukutamu_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    redirect('admin/buku');
  }
  public function acara()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['acara'] = $this->Acara_model->get();
    $this->form_validation->set_rules('nama_acara', 'Nama Acara', 'required', [
      'required' => "Kolom Nama Acara harus diisi"
    ]);
    $this->form_validation->set_rules('tempat', 'Tempat', 'required', [
      'required' => "Kolom Nama Tempat harus diisi"
    ]);
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
      'required' => "Kolom Tanggal harus diisi"
    ]);
    $this->form_validation->set_rules('waktu', 'Waktu', 'required', [
      'required' => "Kolom Waktu harus diisi"
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('layout/header', $data);
      $this->load->view('admin/acaraAdmin', $data);
      $this->load->view('layout/footer');
    } else {
      $data = [
        'nama_acara' => $this->input->post('nama_acara'),
        'tempat' => $this->input->post('tempat'),
        'tanggal' => $this->input->post('tanggal'),
        'waktu' => $this->input->post('waktu'),
      ];
      $this->Acara_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> diisi.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('admin/acara');
    }
  }
  public function updateAcara($id)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['acara'] = $this->Acara_model->getById($id);

    if ($this->input->post()) {
      $this->form_validation->set_rules('nama_acara', 'Nama Acara', 'required', [
        'required' => "Kolom Nama Acara harus diisi"
      ]);
      $this->form_validation->set_rules('tempat', 'Tempat', 'required', [
        'required' => "Kolom Nama Tempat harus diisi"
      ]);
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
        'required' => "Kolom Tanggal harus diisi"
      ]);
      $this->form_validation->set_rules('waktu', 'Waktu', 'required', [
        'required' => "Kolom Waktu harus diisi"
      ]);

      if ($this->form_validation->run() == true) {
        $data = [
          'nama_acara' => $this->input->post('nama_acara'),
          'tempat' => $this->input->post('tempat'),
          'tanggal' => $this->input->post('tanggal'),
          'waktu' => $this->input->post('waktu'),
          'status' => $this->input->post('status'),
        ];
        $id = $this->input->post('id');
        $this->Acara_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/acara');
      }
    }
    $this->load->view('layout/header', $data);
    $this->load->view('admin/updateAcaraAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function deleteAcara($id)
  {
    $this->Acara_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    redirect('admin/acara');
  }
  public function janji()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['janji'] = $this->Janji_model->get();
    $this->load->view('layout/header', $data);
    $this->load->view('admin/janjiAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function updateJanji($id)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['janji'] = $this->Janji_model->getById($id);

    if ($this->input->post()) {
      $this->form_validation->set_rules('nama', 'Nama', 'required', [
        'required' => "Kolom Nama harus diisi"
      ]);
      $this->form_validation->set_rules('tentang', 'Tentang', 'required', [
        'required' => "Kolom Tentang harus diisi"
      ]);
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
        'required' => "Kolom Tanggal harus diisi"
      ]);
      $this->form_validation->set_rules('waktu', 'Waktu', 'required', [
        'required' => "Kolom Waktu harus diisi"
      ]);
      $this->form_validation->set_rules('status', 'Status', 'required', [
        'required' => "Kolom Status harus diisi"
      ]);

      if ($this->form_validation->run() == true) {
        $data = [
          'nama' => $this->input->post('nama'),
          'tentang' => $this->input->post('tentang'),
          'tanggal' => $this->input->post('tanggal'),
          'waktu' => $this->input->post('waktu'),
          'status' => $this->input->post('status'),
        ];

        $id = $this->input->post('id');
        $this->Janji_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/janji');
      }
    }
    $this->load->view('layout/header', $data);
    $this->load->view('admin/updateJanjiAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function holder()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['holder'] = $this->User_model->get();
    $this->load->view('layout/header', $data);
    $this->load->view('admin/holderAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function updateHolder($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['holder'] = $this->User_model->getById($id);

    if ($this->input->post()) {
      $this->form_validation->set_rules('nama', 'Nama', 'required', [
        'required' => "Kolom Nama harus diisi"
      ]);
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
        'required' => "Kolom Email harus diisi",
        'valid_email' => "Format Email tidak valid"
      ]);
      $this->form_validation->set_rules('date_created', 'Tanggal Dibuat', 'required', [
        'required' => "Kolom Tanggal Dibuat harus diisi"
      ]);
      $this->form_validation->set_rules('role', 'Role', 'required', [
        'required' => "Kolom Role harus diisi"
      ]);

      if ($this->form_validation->run() == true) {
        $data = [
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'date_created' => $this->input->post('date_created'),
          'role' => $this->input->post('role'),
        ];

        $id = $this->input->post('id');
        $this->User_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('admin/holder');
      }
    }

    $this->load->view('layout/header', $data);
    $this->load->view('admin/updateHolderAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function deleteHolder($id)
  {
    $this->User_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    redirect('admin/holder');
  }
  public function konten()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['konten'] = $this->Konten_model->getById(1);
    $data['saran'] = $this->Saran_model->get();
    $this->load->view('layout/header', $data);
    $this->load->view('admin/kontenAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function isiAcara($nama_acara)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['acara'] = $this->Tamuacara_model->get();
    $data['nama_acara'] = $nama_acara;

    $this->load->view('layout/header', $data);
    $this->load->view('admin/isiAcaraAdmin', $data);
    $this->load->view('layout/footer');
  }
  public function updateKonten()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    if ($this->input->post()) {
      $this->form_validation->set_rules('nama_kantor', 'Nama', 'required', [
        'required' => "Kolom Ini harus diisi"
      ]);
      $this->form_validation->set_rules('alamat_kantor', 'Alamat', 'required', [
        'required' => "Kolom Ini harus diisi",
      ]);
      $this->form_validation->set_rules('no_hp', 'NO HP', 'required', [
        'required' => "Kolom Ini harus diisi"
      ]);
      $this->form_validation->set_rules('fax', 'Fax', 'required', [
        'required' => "Kolom ini harus diisi"
      ]);
      $this->form_validation->set_rules('tentang', 'Tentang', 'required', [
        'required' => "Kolom Ini harus diisi"
      ]);
      $this->form_validation->set_rules('about', 'About', 'required', [
        'required' => "Kolom ini harus diisi"
      ]);

      if ($this->form_validation->run() == true) {
        $data = [
          'nama_kantor' => $this->input->post('nama_kantor'),
          'alamat_kantor' => $this->input->post('alamat_kantor'),
          'about' => $this->input->post('about'),
          'no_hp' => $this->input->post('no_hp'),
          'fax' => $this->input->post('fax'),
          'tentang' => $this->input->post('tentang'),
        ];

        $id = $this->input->post('id');
        $this->Konten_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('admin/konten');
      }
    }
    $this->load->view('layout/header', $data);
    $this->load->view('admin/ubahKonten', $data);
    $this->load->view('layout/footer');
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */