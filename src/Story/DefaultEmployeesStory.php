<?php

namespace App\Story;

use App\Factory\EmployeeFactory;
use Zenstruck\Foundry\Story;

final class DefaultEmployeesStory extends Story
{
    public function build(): void
    {
        $this->add(
            'employee1',
            EmployeeFactory::new()
        );

        // $this->add(
        //     'employee2',
        //     EmployeeFactory::new()
        //         ->setFirstName('John')
        //         ->setLastName('Doe')
        // );


        // $this->add(
        //     'employee3',
        //     EmployeeFactory::new()
        //         ->setFirstName('Alice')
        //         ->setLastName('Johnson')
        // );
    }
}
