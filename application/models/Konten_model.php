<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Konten_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Konten_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public $table = 'konten';
  public $id = 'konten.id';
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
  public function get()
  {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getById($id)
  {
    $this->db->from($this->table);
    $this->db->where($this->id, $id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Konten_model.php */
/* Location: ./application/models/Konten_model.php */