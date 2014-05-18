<?php
/**
 * Based on KnpMenu Tests
 * @author: bchoquet
 */

namespace Landmarx\Tests\Extension;


use Landmarx\Extension\CoreExtension;
use Landmarx\Factory\LandmarkFactory;
use Landmarx\Model\Landmark;

class CoreExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testBuildOptions()
    {
        $extension = $this->getExtension();
    }

    private function getExtension()
    {
        return new CoreExtension();
    }

    private function createLandmark($name)
    {
        $factory = new LandmarkFactory();
        $landmark = new Landmark($name, $factory);

        return $landmark;
    }
}
