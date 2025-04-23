<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
#[ApiResource]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    /**
     * @var Collection<int, TimeEntries>
     */
    #[ORM\OneToMany(targetEntity: TimeEntries::class, mappedBy: 'employee', orphanRemoval: true)]
    private Collection $timeEntries;

    public function __construct()
    {
        $this->timeEntries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, TimeEntries>
     */
    public function getTimeEntries(): Collection
    {
        return $this->timeEntries;
    }

    public function addTimeEntry(TimeEntries $timeEntry): static
    {
        if (!$this->timeEntries->contains($timeEntry)) {
            $this->timeEntries->add($timeEntry);
            $timeEntry->setEmployee($this);
        }

        return $this;
    }

    public function removeTimeEntry(TimeEntries $timeEntry): static
    {
        if ($this->timeEntries->removeElement($timeEntry)) {
            // set the owning side to null (unless already changed)
            if ($timeEntry->getEmployee() === $this) {
                $timeEntry->setEmployee(null);
            }
        }

        return $this;
    }
}
