<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Saran_model
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

class Saran_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public $table = 'saran';
  public $id = 'saran.id';
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
  public function get()
  {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  // ------------------------------------------------------------------------

}

/* End of file Saran_model.php */
/* Location: ./application/models/Saran_model.php */