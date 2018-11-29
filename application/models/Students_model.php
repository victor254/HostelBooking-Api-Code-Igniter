<?php
/**
 * Created by PhpStorm.
 * User: Harry&Victor
 * Date: 10/21/2018
 * Time: 12:48 AM
 */


class Students_model extends CI_Model
{
    protected $table = "students";

    public function __construct()
    {
        $this->load->database();
        $this->load->library("StudentsModel");
        $this->load->library("RoomModel");
        $this->load->library("BookingTableModel");
        $this->load->library("ApiLibraries");
    }

    /**
     * @param $studentid
     * @return array
     */
    public function fetchStudents($userquery = array())
    {
        $status = FALSE;
        $data = array(null);
        if ($userquery != null) {
            $this->db->like("student_name",trim($userquery["student_name"]));
            $query = $this->db->get($this->table, 10, 0);
            $this->db->order_by("student_name", "ASC");
            $rows = $query->result();
            if (count($rows) == 1) {
                $data = $rows;
                $status = TRUE;
            }
        } else {
            $query = $this->db->get($this->table, 10, 0);
            $this->db->order_by("student_name", "ASC");

            $rows = $query->result();
            if (count($rows) > 0) {
                $data = $rows;
                $status = TRUE;
            }
        }
        return $results = array("status" => $status, "data" => $data);
    }

    public function fetchAvailableRooms($userquery)
    {
        $data = array();
        if ($userquery == null) {
            $query = $this->db->get("rooms", 10, 0);
            $data = $query->result();
        } else {
            $this->db->like("room_details", $userquery['room_details']);
            $this->db->where("floor_no", $userquery['floor_no']);
            $this->db->where("room_occupancy","< room_size");
            $query = $this->db->get("rooms");
            $data = $query->result();

        }
        return $data;
    }

    public function reserveRoom($student, $room)
    {
        $library = new ApiLibraries();
        $library->setDatabase($this->db)
            ->setModelrooms($room)
            ->setModelsudent($student);

        if ($student != null && $room != null) {
            return $library->bookRoom($student, $room);
        }
    }

    public function fetchHostels()
    {
        $query = $this->db->get("hostel");
        return $query->result();
    }

}
