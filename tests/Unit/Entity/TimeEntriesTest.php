<?php

use App\Entity\TimeEntries;
use PHPUnit\Framework\TestCase;

class TimeEntriesTest extends TestCase
{
    public function testTimeEntriesCreation()
    {
        $timeEntry = new TimeEntries();
        $this->assertInstanceOf(TimeEntries::class, $timeEntry);
    }

    public function testSetStart()
    {
        $timeEntry = new TimeEntries();
        $dateTime = new \DateTime('2023-10-01 10:00:00');
        $timeEntry->setStart($dateTime);
        $this->assertEquals($dateTime, $timeEntry->getStart());
    }

    public function testSetDuration()
    {
        $timeEntry = new TimeEntries();
        $dateTime = new \DateInterval('PT2H30M');
        $timeEntry->setDuration($dateTime);
        $this->assertEquals($dateTime, $timeEntry->getDuration());
    }

    public function testSetEndDate()
    {
        $timeEntry = new TimeEntries();
        $dateTime = new \DateTime('2023-10-01 12:30:00');
        $timeEntry->setEndDate($dateTime);
        $this->assertEquals($dateTime, $timeEntry->getEndDate());
    }

    public function testSetDescription()
    {
        $timeEntry = new TimeEntries();
        $description = "Test description";
        $timeEntry->setDescription($description);
        $this->assertEquals($description, $timeEntry->getDescription());
    }

    public function testSetProject()
    {
        $timeEntry = new TimeEntries();
        $project = new \App\Entity\Project();
        $timeEntry->setProject($project);
        $this->assertEquals($project, $timeEntry->getProject());
    }
    
    public function testSetEmployee()
    {
        $timeEntry = new TimeEntries();
        $employee = new \App\Entity\Employee();
        $timeEntry->setEmployee($employee);
        $this->assertEquals($employee, $timeEntry->getEmployee());
    }
}