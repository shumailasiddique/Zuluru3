<?php
namespace App\Test\Factory;

use Cake\Chronos\Date;
use CakephpFixtureFactories\Factory\BaseFactory;
use Faker\Generator;

class PersonFactory extends BaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return "People";
    }

    /**
     * Defines the default values of you factory. Useful for
     * not nullable fields.
     * Use the patchData method to set the field values.
     * You may use methods of the factory here
     * @return void
     */
    protected function setDefaultTemplate()
    {
        $this->setDefaultData(function(Generator $faker) {
            return [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->title,
                'roster_designation' => 'foo',

                // The modified field is not nullable and required in the DB
                'modified' => Date::now(),
            ];
        });
    }
}