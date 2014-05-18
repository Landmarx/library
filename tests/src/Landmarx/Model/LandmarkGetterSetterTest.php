<?php
namespace Landmarx\Tests;

use Landmarx\Model\Landmark;
use Landmarx\Factory\LandmarkFactory;

class LandmarkItemGetterSetterTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateLandmarkItemWithEmptyParameter()
    {
        $landmark = $this->createLandmark();
        $this->assertTrue($landmark instanceof Landmark);
    }

    public function testName()
    {
        $landmark = $this->createLandmark();
        $landmark->setName('landmark name');
        $this->assertEquals('landmark name', $landmark->getName());
    }

    public function testDescription()
    {
        $landmark = $this->createLandmark();
        $landmark->setDescription('landmark description');
        $this->assertEquals('landmark description', $landmark->getDescription());
    }

    public function testPublic()
    {
        $landmark = $this->createLandmark();
        $this->assertEquals(true, $landmark->isPublic());
        $landmark->isPublic(false);
        $this->assertEquals(false, $landmark->isPublic());
    }

    public function testParent()
    {
        $landmark = $this->createLandmark();
        $child = $this->createLandmark('child landmark');
        $this->assertNull($child->getParent());
        $child->setParent($landmark);
        $this->assertEquals($landmark, $child->getParent());
    }

    public function testChildren()
    {
        $landmark = $this->createLandmark();
        $child = $this->createLandmark('child landmark');
        $landmark->setChildren(array($child));
        $this->assertEquals(array($child), $landmark->getChildren());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetExistingNameThrowsAnException()
    {
        $landmark = $this->createLandmark();
        $landmark->addChild('mountain a');
        $landmark->addChild('mountain b');
        $landmark->getChild('mountain b')->setName('mountain a');
    }

    public function testSetSameName()
    {
        $parent = $this->getMock('Landmarx\Interfaces\LandmarkInterface');
        $parent->expects($this->never())
            ->method('offsetExists');

        $landmark = $this->createLandmark('my name');
        $landmark->setParent($parent);
        $landmark->setName('my name');
        $this->assertEquals('my name', $landmark->getName());
    }

    public function testFactory()
    {
        $child1 = $this->getMock('Landmarx\Interfaces\LandmarkInterface');
        $factory = $this->getMock('Landmarx\Interfaces\LandmarkFactoryInterface');
        $factory->expects($this->once())
            ->method('createLandmark')
            ->will($this->returnValue($child1));

        $landmark = $this->createLandmark();
        $landmark->setFactory($factory);

        $landmark->addChild('child1');
    }

    /**
     * Create a new Landmark
     *
     * @param string $name
     *
     * @return \Landmarx\Model\Landmark
     */
    protected function createLandmark($name = 'test landmark')
    {
        $factory = new LandmarkFactory();

        return $factory->createItem($name);
    }
}
