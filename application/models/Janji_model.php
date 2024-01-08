<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Janji_model
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

class Janji_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public $table = 'janji';
  public $id = 'janji.id';
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
  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
  public function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }
  public function countRows()
  {
    return $this->db->count_all($this->table);
  }

  // ------------------------------------------------------------------------

}

/* End of file Janji_model.php */
/* Location: ./application/models/Janji_model.php */