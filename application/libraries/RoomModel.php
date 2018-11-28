<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Harry&Victor
 * Date: 10/21/2018
 * Time: 12:55 AM
 */

class RoomModel
{
  private $room_ref;
  private $room_no;
  private $room_details;
  private $room_occupancy;
  private $room_size;
  private $room_category;
  private $floor_no;

    /**
     * @return mixed
     */
    public function getRoomRef()
    {
        return $this->room_ref;
    }

    /**
     * @param mixed $room_ref
     * @return RoomModel
     */
    public function setRoomRef($room_ref)
    {
        $this->room_ref = $room_ref;
        return $this;
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
     * @return RoomModel
     */
    public function setRoomNo($room_no)
    {
        $this->room_no = $room_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomDetails()
    {
        return $this->room_details;
    }

    /**
     * @param mixed $room_details
     * @return RoomModel
     */
    public function setRoomDetails($room_details)
    {
        $this->room_details = $room_details;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomOccupancy()
    {
        return $this->room_occupancy;
    }

    /**
     * @param mixed $room_occupancy
     * @return RoomModel
     */
    public function setRoomOccupancy($room_occupancy)
    {
        $this->room_occupancy = $room_occupancy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomSize()
    {
        return $this->room_size;
    }

    /**
     * @param mixed $room_size
     * @return RoomModel
     */
    public function setRoomSize($room_size)
    {
        $this->room_size = $room_size;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomCategory()
    {
        return $this->room_category;
    }

    /**
     * @param mixed $room_category
     * @return RoomModel
     */
    public function setRoomCategory($room_category)
    {
        $this->room_category = $room_category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFloorNo()
    {
        return $this->floor_no;
    }

    /**
     * @param mixed $floor_no
     * @return RoomModel
     */
    public function setFloorNo($floor_no)
    {
        $this->floor_no = $floor_no;
        return $this;
    }


}