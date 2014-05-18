<?php
namespace Landmarx\Tests;

use Landmarx\LandmarkFactory;

class LandmarkFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testExtensions()
    {

    }

    public function testCreateItem()
    {
        $factory = new LandmarkFactory();

        $landmark = $factory->createItem('test', array(
            'desc' => 'blah blah blah blah',
            'public' => true,
            'latitude' => '71.12',
            'longitude' => '-41.12'
        ));

        $this->assertInstanceOf('Landmarx\Interfaces\LandmarkInterface', $landmark);
        $this->assertEquals('test', $landmark->getName());
        $this->assertTrue($landmark->isPublic());
        $this->assertEquals('71.12', $landmark->getLatitude());
        $this->assertEquals('-41.12', $landmark->getLongitude());
    }
}
