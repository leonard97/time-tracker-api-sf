<?php

namespace App\Tests;

use App\Entity\Employee;
use App\Entity\TimeEntries;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testEmployeeCreation()
    {
        $employee = new Employee();
        $this->assertInstanceOf(Employee::class, $employee);
    }

    public function testSetFirstName()
    {
        $employee = new Employee();
        $firstName = "John";
        $employee->setFirstName($firstName);
        $this->assertEquals($firstName, $employee->getFirstName());
    }

    public function testSetLastName()
    {
        $employee = new Employee();
        $lastName = "Doe";
        $employee->setLastName($lastName);
        $this->assertEquals($lastName, $employee->getLastName());
    }
    public function testAddTimeEntry()
    {
        $employee = new Employee();
        $timeEntry = new TimeEntries();
        $employee->addTimeEntry($timeEntry);
        $this->assertCount(1, $employee->getTimeEntries());
        $this->assertTrue($employee->getTimeEntries()->contains($timeEntry));
    }
}
