<?php
namespace App;

/**
 * The Student class keeps track of the following pieces of data for ABC COLLEGE: the name of the student,
 * the id number of the student, five marks score, total score, average score, remark, result and grade.
 * All of this information is entirely private to this class.
 * Clients can only access the information by using the various methods defined in this class
 * @author (Osayawe Ogbemudia Terry)
 * @version (1.0 02-04-2018)
 */
class Student
{
    
    /**
     * The ID of the student
     * @var $id
     */
    private $id;
    private $name, $result, $remark, $grade, $avg, $total;
    private $sub1, $sub2, $sub3, $sub4, $sub5;
    
    /**Create a new Students object with the specified name and id
     * @param $name, the name of this student as a string
     * @param $id, the id number of this student as int
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    
    /**
     * get the name of the student
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * get the id of the student
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * set the mark scored by a student for each subject
     * @param float $sub1
     * @param float $sub2
     * @param float $sub3
     * @param float $sub4
     * @param float $sub5
     */
    public function setMarks(float $sub1, float $sub2, float $sub3, float $sub4, float $sub5)
    {
        $this->sub1 = $sub1;
        $this->sub2 = $sub2;
        $this->sub3 = $sub3;
        $this->sub4 = $sub4;
        $this->sub5 = $sub5;
    }
    
    /**
     * set and return total score
     * @return float
     */
    public function totalSore(): float
    {
        return $this->total = $this->sub1 + $this->sub2 + $this->sub3 + $this->sub4 + $this->sub5;
    }
    
    /**
     * set and return average score
     * @return float
     */
    public function averageScore(): float
    {
        return $this->avg = $this->total / 5;
    }
    
    /**
     * set and return the grade for this student
     * @return string
     */
    public function grade(): string
    {
        if($this->avg > 70 && $this->avg <= 100) return $this->grade = 'A';
        if($this->avg > 60 && $this->avg <= 69.9) return $this->grade = 'B';
        if($this->avg > 50 && $this->avg <= 59.9) return $this->grade = 'C';
        if($this->avg > 40 && $this->avg <= 49.9) return $this->grade = 'D';
        if($this->avg > 0 && $this->avg <= 39.9) return $this->grade = 'F';
        
        return $this->grade = 'unknown';
    }
    
    /**
     * set and return the remark for this student
     * @return string
     */
    public function remark(): string
    {
        switch ($this->grade){
            case 'A':
                $this->remark = 'Excellent';
                break;
            case 'B':
                $this->remark = 'Very Good';
                break;
            case 'C':
                $this->remark = 'Good';
                break;
            case 'D':
                $this->remark = 'Fair';
                break;
            default:
                $this->remark = 'Very Poor';
        }
        
        return $this->remark;
    }
    
    /**
     * set and return the final result, if student score less than 40 for any subject
     * final result will be fail
     * @return string
     */
    public function finalResult(): string
    {
        if($this->sub1 < 40 || $this->sub2 < 40 || $this->sub3 < 40 || $this->sub4 < 40 || $this->sub5 < 40){
            $this->result = 'Fail';
        }else{
            $this->result = 'Pass';
        }
        return $this->result;
    }
}