<?php
use PHPUnit\Framework\TestCase;
use App\Entity\Project; // Adjust the namespace to match the actual location of the Project class
use App\Entity\Employee; // Adjust the namespace to match the actual location of the Employee class
use App\Entity\TimeEntries;

class ProjectTest extends TestCase
{
    public function testProjectCreation()
    {
        $project = new Project();
        $project->setName("Project Name");
        $project->setDescription("Project Description");
        $this->assertEquals("Project Name", $project->getName());
        $this->assertEquals("Project Description", $project->getDescription());
    }
    
    public function testSetName()
    {
        $project = new Project("Project Name", "Project Description");
        $project->setName("New Project Name");
        $this->assertEquals("New Project Name", $project->getName());
    }
    
    public function testSetDescription()
    {
        $project = new Project("Project Name", "Project Description");
        $project->setDescription("New Project Description");
        $this->assertEquals("New Project Description", $project->getDescription());
    }

    public function testAddProject()
    {
        $project = new Project("Project Name", "Project Description");
        $timeEntry = new TimeEntries("John", "Doe");
        $project->addTimeEntry($timeEntry);
        $this->assertCount(1, $project->getTimeEntries());
        $this->assertTrue($project->getTimeEntries()->contains($timeEntry));
    }

    public function testGetTimeEntries()
    {
        $project = new Project("Project Name", "Project Description");
        $timeEntry1 = new TimeEntries("John", "Doe");
        $timeEntry2 = new TimeEntries("Jane", "Smith");
        $project->addTimeEntry($timeEntry1);
        $project->addTimeEntry($timeEntry2);
        
        $this->assertCount(2, $project->getTimeEntries());
        $this->assertTrue($project->getTimeEntries()->contains($timeEntry1));
        $this->assertTrue($project->getTimeEntries()->contains($timeEntry2));
    }

    public function testRemoveTimeEntry()
    {
        $project = new Project("Project Name", "Project Description");
        $timeEntry = new TimeEntries("John", "Doe");
        $project->addTimeEntry($timeEntry);
        $project->removeTimeEntry($timeEntry);
        
        $this->assertCount(0, $project->getTimeEntries());
        $this->assertFalse($project->getTimeEntries()->contains($timeEntry));
    }    
}