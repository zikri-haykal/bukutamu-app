<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Tamu
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

class Tamu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Bukutamu_model');
    $this->load->model('Janji_model');
    $this->load->model('Acara_model');
    $this->load->model('Konten_model');
    $this->load->model('Saran_model');
    $this->load->model('Tamuacara_model');

  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['konten'] = $this->Konten_model->getById(1);
    $this->load->view('layout/header', $data);
    $this->load->view('tamu/indexTamu', $data);
    $this->load->view('layout/footer');
  }
  public function insertSaran()
  {
    $data = [
      'email' => $this->input->post('email'),
      'isi' => $this->input->post('isi'),
    ];
    $this->Saran_model->insert($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terimakasih!</strong> atas saran anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    redirect('tamu');
  }
  public function harian()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['harian'] = $this->Bukutamu_model->get();
    $this->form_validation->set_rules('nama_pengunjung', 'Nama Pengunjung', 'required', [
      'required' => "Kolom Nama Pengunjung harus diisi"
    ]);
    $this->form_validation->set_rules('instansi', 'Instansi', 'required', [
      'required' => "Kolom Nama instansi harus diisi"
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'required', [
      'required' => "Kolom Alamat harus diisi"
    ]);
    $this->form_validation->set_rules('keperluan', 'keperluan', 'required', [
      'required' => "Kolom keperluan harus diisi"
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('layout/header', $data);
      $this->load->view('tamu/harianTamu', $data);
      $this->load->view('layout/footer');
    } else {
      $data = [
        'nama_pengunjung' => $this->input->post('nama_pengunjung'),
        'instansi' => $this->input->post('instansi'),
        'alamat' => $this->input->post('alamat'),
        'keperluan' => $this->input->post('keperluan'),
        'email' => $this->input->post('email'),
      ];
      $upload_image = $_FILES['paraf']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './paraf/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('paraf')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('paraf', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->Bukutamu_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> diisi.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('tamu/harian');
    }
  }
  public function deleteHarian($id)
  {
    $this->Bukutamu_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    redirect('tamu/harian');
  }

  public function updateharian($id)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //jika diinput
    if ($this->input->post()) {
      $this->form_validation->set_rules('nama_pengunjung', 'Nama Pengunjung', 'required', [
        'required' => "Kolom Nama Pengunjung harus diisi"
      ]);
      $this->form_validation->set_rules('instansi', 'Instansi', 'required', [
        'required' => "Kolom Nama instansi harus diisi"
      ]);
      $this->form_validation->set_rules('alamat', 'alamat', 'required', [
        'required' => "Kolom Alamat harus diisi"
      ]);
      $this->form_validation->set_rules('keperluan', 'keperluan', 'required', [
        'required' => "Kolom Keperluan harus diisi"
      ]);

      if ($this->form_validation->run() == true) {
        // Jika tak ada salah
        $data = [
          'nama_pengunjung' => $this->input->post('nama_pengunjung'),
          'instansi' => $this->input->post('instansi'),
          'alamat' => $this->input->post('alamat'),
          'keperluan' => $this->input->post('keperluan'),
          'email' => $this->input->post('email'),
        ];
        $upload_image = $_FILES['paraf']['name'];
        if ($upload_image) {
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = 2048;
          $config['upload_path'] = './paraf/';
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('paraf')) {
            $old_image = $data['harian']['paraf'];
            if ($old_image != 'default.jpg') {
              unlink(FCPATH . 'paraf/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('paraf', $new_image);
          } else {
            echo $this->upload->display_errors();
          }
        }

        $id = $this->input->post('id');
        $this->Bukutamu_model->update(['id' => $id], $data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> diupdate.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

        redirect('tamu/harian');
      }
    }
    //jika tak input
    $data['harian'] = $this->Bukutamu_model->getById($id);
    $this->load->view('layout/header', $data);
    $this->load->view('tamu/updateHarianTamu', $data);
    $this->load->view('layout/footer');
  }

  public function acara()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['acara'] = $this->Acara_model->get();
    $this->load->view('layout/header', $data);
    $this->load->view('tamu/acaraTamu', $data);
    $this->load->view('layout/footer');
  }
  public function isiAcara($nama_acara)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['acara'] = $this->Tamuacara_model->get();
    $data['nama_acara'] = $nama_acara;

    $this->load->view('layout/header', $data);
    $this->load->view('tamu/isiAcaraTamu', $data);
    $this->load->view('layout/footer');
  }
  public function insertIsiAcara()
  {
    $this->form_validation->set_rules('acara', 'Nama Acara', 'required', [
      'required' => "Kolom Nama Acara harus diisi"
    ]);
    $this->form_validation->set_rules('nama_tamu', 'Nama Tamu', 'required', [
      'required' => "Kolom Nama Tamu harus diisi"
    ]);
    $this->form_validation->set_rules('instansi', 'Instansi', 'required', [
      'required' => "Kolom Nama instansi harus diisi"
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required' => "Kolom Alamat harus diisi"
    ]);

    if ($this->form_validation->run() == false) {
      redirect('tamu/showFormIsiAcara/' . $this->input->post('nama_acara'));
    } else {
      $data = [
        'acara' => $this->input->post('acara'),
        'nama_tamu' => $this->input->post('nama_tamu'),
        'instansi' => $this->input->post('instansi'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
      ];
      $upload_image = $_FILES['paraf']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './paraf/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('paraf')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('paraf', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->Tamuacara_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> diisi.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      $nama_acara = $this->input->post('acara');
      redirect('tamu/isiAcara/' . $nama_acara);
    }
  }

  public function janji()
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['janji'] = $this->Janji_model->get();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('layout/header', $data);
    $this->load->view('tamu/janjiTamu', $data);
    $this->load->view('layout/footer');
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

      if ($this->form_validation->run() == true) {
        $data = [
          'nama' => $this->input->post('nama'),
          'tentang' => $this->input->post('tentang'),
          'tanggal' => $this->input->post('tanggal'),
          'waktu' => $this->input->post('waktu'),
          'email' => $this->input->post('email'),
        ];

        $this->Janji_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diinput.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('tamu/janji');
      }
    }
  }

  public function deleteJanji($id)
  {
    $this->Janji_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    redirect('tamu/janji');
  }
  public function updateJanji($id)
  {
    $data['konten'] = $this->Konten_model->getById(1);
    $data['janji'] = $this->Janji_model->getById($id);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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

      if ($this->form_validation->run() == true) {
        $data = [
          'nama' => $this->input->post('nama'),
          'tentang' => $this->input->post('tentang'),
          'tanggal' => $this->input->post('tanggal'),
          'waktu' => $this->input->post('waktu'),
        ];

        $id = $this->input->post('id');
        $this->Janji_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('tamu/janji');
      }
    }
    $this->load->view('layout/header', $data);
    $this->load->view('tamu/updateJanjiTamu', $data);
    $this->load->view('layout/footer');
  }


}


/* End of file Tamu.php */
/* Location: ./application/controllers/Tamu.php */