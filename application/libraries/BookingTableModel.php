<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/21/2018
 * Time: 12:17 PM
 */

class BookingTableModel
{
  private $booking_no;
  private $student_name;
  private $student_regno;
  private $room_no;
  private $hostel_name;
  private $status;
  private $booking_date;
  public static $PENDING = 0;

    /**
     * @return mixed
     */
    public function getBookingNo()
    {
        return $this->booking_no;
    }

    /**
     * @param mixed $booking_no
     */
    public function setBookingNo($booking_no)
    {
        $this->booking_no = $booking_no;
    }

    /**
     * @return mixed
     */
    public function getStudentName()
    {
        return $this->student_name;
    }

    /**
     * @param mixed $student_name
     */
    public function setStudentName($student_name)
    {
        $this->student_name = $student_name;
    }

    /**
     * @return mixed
     */
    public function getStudentRegno()
    {
        return $this->student_regno;
    }

    /**
     * @param mixed $student_regno
     */
    public function setStudentRegno($student_regno)
    {
        $this->student_regno = $student_regno;
    }

    /**
     * @return mixed
     */
    public function getRoomNo()
    {
        return $this->room_no;
    }

    /**
     * @param mixed $room_no
     */
    public function setRoomNo($room_no)
    {
        $this->room_no = $room_no;
    }

    /**
     * @return mixed
     */
    public function getHostelName()
    {
        return $this->hostel_name;
    }

    /**
     * @param mixed $hostel_name
     */
    public function setHostelName($hostel_name)
    {
        $this->hostel_name = $hostel_name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getBookingDate()
    {
        return $this->booking_date;
    }

    /**
     * @param mixed $booking_date
     */
    public function setBookingDate($booking_date)
    {
        $this->booking_date = $booking_date;
    }


}