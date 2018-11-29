<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Harry&Victor
 * Date: 10/21/2018
 * Time: 1:00 AM
 */

class StudentsModel
{
  private $student_regno;
  private $student_name;
  private $student_dob;
  private $std_gender;
  private $std_course;
  private $special_case;

    /**
     * @return mixed
     */
    public function getStudentRegno()
    {
        return $this->student_regno;
    }

    /**
     * @param mixed $student_regno
     * @return StudentsModel
     */
    public function setStudentRegno($student_regno)
    {
        $this->student_regno = $student_regno;
        return $this;
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
     * @return StudentsModel
     */
    public function setStudentName($student_name)
    {
        $this->student_name = $student_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentDob()
    {
        return $this->student_dob;
    }

    /**
     * @param mixed $student_dob
     * @return StudentsModel
     */
    public function setStudentDob($student_dob)
    {
        $this->student_dob = $student_dob;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentGender()
    {
        return $this->std_gender;
    }

    /**
     * @param mixed $student_gender
     * @return StudentsModel
     */
    public function setStudentGender($student_gender)
    {
        $this->std_gender = $student_gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentCourse()
    {
        return $this->std_course;
    }

    /**
     * @param mixed $student_course
     * @return StudentsModel
     */
    public function setStudentCourse($student_course)
    {
        $this->std_course = $student_course;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpecialCase()
    {
        return $this->special_case;
    }

    /**
     * @param mixed $special_case
     * @return StudentsModel
     */
    public function setSpecialCase($special_case)
    {
        $this->special_case = $special_case;
        return $this;
    }


}