<?php
namespace Landmarx\Tests\Loader;

use Landmarx\Loader\ArrayLoader;
use Landmarx\LandmarkFactory;

class ArrayLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadWithoutChildren()
    {
        $array = array(
            'name' => 'some lake',
            'description' => 'some lake somewhere.',
            'public' => true,
            'latitude' => '70.88',
            'longitude' => '-41.21'
        );

        $loader = new ArrayLoader(new LandmarkFactory());
        $landmark = $loader->load($array);

        $this->assertEquals('some lake', $landmark->getName());
        $this->assertEquals('some lake somewhere.', $landmark->getDescription());
        $this->assertTrue($landmark->isPublic());
        $this->assertEquals('70.88', $landmark->getLatitude());
        $this->assertEquals('-41.21', $landmark->getLongitude());
        $this->assertEmpty($landmark->getAttributes());
        $this->assertEmpty($landmark->getChildren());
    }

    public function testLoadWithChildren()
    {
        $array = array(
            'name' => 'some mountain range',
            'children' => array(
                'some mountain' => array(
                    'name' => 'some mountain',
                ),
                array(
                    'name' => 'some mountain peak'
                )
            ),
        );

        $loader = new ArrayLoader(new LandmarkFactory());
        $landmark = $loader->load($array);

        $this->assertEquals('some mountain range', $landmark->getName());
        $this->assertEmpty($landmark->getAttributes());
        $this->assertCount(2, $landmark);
        $this->assertTrue(isset($landmark['some mountain peak']));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLoadInvalidData()
    {
        $loader = new ArrayLoader(new LandmarkFactory());

        $loader->load(new \stdClass());
    }

    /**
     * @dataProvider provideSupportingData
     */
    public function testSupports($data, $expected)
    {
        $loader = new ArrayLoader(new LandmarkFactory());

        $this->assertSame($expected, $loader->supports($data));
    }

    public function provideSupportingData()
    {
        return array(
            array(array(), true),
            array(null, false),
            array('foobar', false),
            array(new \stdClass(), false),
            array(53, false),
            array(true, false),
        );
    }
}
