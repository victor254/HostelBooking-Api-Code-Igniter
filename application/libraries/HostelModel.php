<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 10/23/2018
 * Time: 12:06 AM
 */
class HostelModel
{
    public static  $TABLE_NAME = "hostel";
    public static $MALE_GENDER ="Male";
    public static $FEMALE_GENDER ="Female";

    public $name;
    public $floor_count;
    public $gender;
    public $room_count;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFloorCount()
    {
        return $this->floor_count;
    }

    /**
     * @param mixed $floor_count
     */
    public function setFloorCount($floor_count)
    {
        $this->floor_count = $floor_count;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getRoomCount()
    {
        return $this->room_count;
    }

    /**
     * @param mixed $room_count
     */
    public function setRoomCount($room_count)
    {
        $this->room_count = $room_count;
    }


}