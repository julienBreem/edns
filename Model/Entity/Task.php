<?php

namespace edns\Model\Entity\Task;

/**
 * Class Task
 * @package edns\Model\Entity
 */
class Task
{

    /**
     * @var int
     */
    private $taskid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $details;

    /**
     * @var string
     */
    private $date;


    /**
     * @return mixed
     */
    public function __construct($count)  //provide the current id that should be provided depending on the amount of tasks already entered
    {
        $this->setTaskid($count);

    }


    public function getTaskid() : ?int
    {
        return $this->taskid;
    }

    /**
     * @param mixed $taskid
     */
    public function setTaskid($taskid) : void
    {
        $this->taskid = $taskid;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) : void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDetails() : string
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details) : void
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getDate() : string
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date) : void
    {
        $this->date = $date;
    }




}