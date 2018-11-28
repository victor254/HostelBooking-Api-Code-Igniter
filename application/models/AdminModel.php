<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/21/2018
 * Time: 3:02 PM
 */
class AdminModel extends CI_Model
{
    protected $staff_table = "staff";
    protected $hostel_table = "hostel";

    public function __construct()
    {
        $this->load->library("bcrypt");
        $this->load->database();
    }

    /**
     * @param $staff
     * @return array
     */
    public function checkLogin($staff)
    {
        if ($staff instanceof StaffModel) {
            $this->db->where("staff_email", $staff->staff_email);
            $query = $this->db->get($this->staff_table);
            if (count($query->result()) == 1) {
                foreach ($query->result() as $row) {
//               	if($this->bcrypt->check_password($row->staff_password,$this->bcrypt->hash_password("shithappens"))){
//                		return TRUE;
//					}
                    $response = array("status" => TRUE, "data" => $query->result());
                    return $response;
                }
            } else {
                $response = array("status" => FALSE, "data" => array());
                return $response;
            }
        }
        $response = array("status" => FALSE, " data" => array());
        return $response;
    }

    /**
     * @param $staff
     * @return bool
     */
    public function createUser($staff)
    {
        if ($staff instanceof StaffModel) {
            $this->db->set("staff_id", $staff->staff_id);
            $this->db->set("staff_email", $staff->staff_email);
            $this->db->set("staff_password", $staff->staff_password);
            $this->db->set("dpt_no", $staff->dpt_no);
            $this->db->set("staff_role", $staff->staff_role);
            $this->db->set("staff_name", $staff->staff_name);
            $this->db->set("staff_avatar", $staff->staff_avatar);

            $this->db->insert($this->staff_table);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    /**
     * @param $staff
     * @return bool
     */
    public function updateUser($staff)
    {
        if ($staff instanceof StaffModel) {
            $this->db->set("staff_id", $staff->staff_id);
            $this->db->set("staff_email", $staff->staff_email);
            $this->db->set("staff_password", $staff->staff_password);
            $this->db->set("dpt_no", $staff->dpt_no);
            $this->db->set("staff_role", $staff->staff_role);
            $this->db->where("staff_id", $staff->staff_id);
            $this->db->update($this->staff_table);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * @return mixed
     */
    public function fetchHostelsAll()
    {
        $query = $this->db->get("hostel", 20, 0);
        return $query->result();
    }

    /**
     * @param array $query
     * @return mixed
     */
    public function fetchHostel($query = array())
    {
        $ouput = $this->get_where(HostelModel::$TABLE_NAME, $query, 20, 0);
        return $ouput->result();
    }

    /**
     * @return mixed
     */
    public function listStaff()
    {
        $query = $this->db->get($this->staff_table, 20, 0);
        return $query->result();
    }

    /**
     * @param array $query
     * @return bool
     */
    public function deleteHostel($query = array())
    {
        $this->db->delete("hostel", $query);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
