<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/21/2018
 * Time: 10:16 AM
 */

class ApiLibraries
{
    private $database;
    private $message = array();
    private $errorcount = 0;
    protected $student_table = "students";
    protected $booking_table = "bookings";
    private $booking_ref;

    private $modelbooking;
    private $modelrooms;
    private $modelsudent;

    public function __construct()
    {
        $this->modelbooking = new BookingTableModel();
        $this->modelrooms = new RoomModel();
        $this->modelsudent = new StudentsModel();
    }

    /**
     * @param mixed $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
        return $this;
    }

    /**
     * @param array $student
     * @param array $room
     * @return array
     */
    public function bookRoom()
    {
        //verify information
        if ($this->verifyDetails($this->modelsudent) == TRUE && $this->checkMultipleBookings(array("student_regno" => $this->modelsudent->getStudentRegNo())) == TRUE) {
            if ($this->book() == TRUE) {
                return array("status" => "success",
                    "message" => array(
                        "booking_ref" => $this->booking_ref,
                        "report_url" => urlencode("/downloads/lib/yfogdhdtykhlgdtooo.pdf")
                    )
                );
            } else {
                return array("status" => "success", "message" => $this->message);
            }
        } else {
            return array("status" => "success", "message" => $this->message);
        }
    }

    /**
     * @param array $details
     * @return bool
     */
    private function verifyDetails($details = array())
    {
        $return_value = FALSE;
        $query = $this->database->get_where($this->student_table, array("student_regno" => $this->modelsudent->getStudentRegno()), 1, 0);
        $result = $query->result();
        if (count($result) > 0) {
            $return_value = TRUE;
        } else {
            $this->setMessage("unable to verify your details");
        }
        return $return_value;
    }

    /**
     * @param array $details
     * @return bool
     */
    private function checkMultipleBookings($details = array())
    {
        $return_value = FALSE;
        $query = $this->database->get_where($this->booking_table, $details, 1, 0);
        $result = $query->result();
        if (count($result) == 0) {
            $return_value = TRUE;
        } else {
            $this->setMessage("multiple booking found, unable to process your request");
        }
        return $return_value;
    }

    private function book()
    {
        $return_value = FALSE;
        $this->booking_ref = $bookingno = strtoupper(substr($this->modelrooms->getRoomDetails(), 0, 4)) . "/" . substr($this->modelrooms->getRoomNo(), 0, 4) . "/" . substr($this->modelsudent->getStudentRegno(), strlen($this->modelsudent->getStudentRegno()) - 5, 5);

        $da = date_create(date("Y/m/d h:i:sa"), timezone_open("Africa/Dakar"));
        date_timezone_set($da, timezone_open("Africa/Nairobi"));
        $date = date_format($da, "Y-m-d h:i");

        $this->modelbooking->setStudentName($this->modelsudent->getStudentName());
        $this->modelbooking->setRoomNo($this->modelrooms->getRoomNo());
        $this->modelbooking->setBookingNo($this->booking_ref);
        $this->modelbooking->setStudentRegno($this->modelsudent->getStudentRegno());
        $this->modelbooking->setHostelName($this->modelrooms->getRoomDetails());
        $this->modelbooking->setBookingDate($date);
        $this->modelbooking->setStatus(BookingTableModel::$PENDING);

        $this->database->set("booking_no", $this->modelbooking->getBookingNo());
        $this->database->set("room_no", $this->modelbooking->getRoomNo());
        $this->database->set("student_name", $this->modelbooking->getStudentName());
        $this->database->set("student_regno", $this->modelbooking->getStudentRegno());
        $this->database->set("hostel_name", $this->modelbooking->getHostelName());
        $this->database->set("booking_date", $this->modelbooking->getBookingDate());
        $this->database->set("status", $this->modelbooking->getStatus());
        $this->database->insert($this->booking_table);

        if ($this->database->affected_rows() > 0) {
            $this->database->set("room_occupancy", "room_occupancy +1");
            $this->database->where("room_no", $this->modelrooms->getRoomNo());
            $this->database->like("room_details", $this->modelrooms->getRoomDetails());
            $this->database->update("rooms");
            if ($this->database->affected_rows() > 0) {
                $return_value = TRUE;
            } else {
                $this->setMessage("Unable to process your request please try again.");
            }
        }
        return $return_value;
    }

    private function setMessage($message)
    {
        $this->message[$this->errorcount] = $message;
        $this->errorcount += $this->errorcount + 1;
    }

    /**
     * @param BookingTableModel $modelbooking
     * @return ApiLibraries
     */
    public function setModelbooking($modelbooking)
    {
        $this->modelbooking = $modelbooking;
        return $this;
    }

    /**
     * @param RoomModel $modelrooms
     * @return ApiLibraries
     */
    public function setModelrooms($modelrooms)
    {
        $this->modelrooms = $modelrooms;
        return $this;
    }

    /**
     * @param StudentsModel $modelsudent
     * @return ApiLibraries
     */
    public function setModelsudent($modelsudent)
    {
        $this->modelsudent = $modelsudent;
        return $this;
    }

}