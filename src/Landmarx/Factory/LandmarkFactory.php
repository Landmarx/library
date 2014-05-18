<?php
namespace Landmarx\Factory;

use Landmarx\Exntesion\CoreExtension;
use Landmarx\Interfaces\ExtensionInterface;
use Landmarx\Interfaces\FactoryInterface;
use Landmarx\Model\Landmark;

class LandmarkFactory implements FactoryInterface
{
    /**
     * @var array[]
     */
    private $extensions = array();

    /**
     * @var ExtensionInterface[]
     */
    private $sorted;

    public function __construct()
    {
        $this->addExtension(new CoreExtension(), -10);
    }

    /**
     * Create Landmark
     * 
     * @param type $name
     * @param array $options
     * @return \Landmarx\Model\Landmark
     */
    public function createLandmark($name, array $options = array())
    {
        foreach ($this->getExtensions() as $extension) {
            $options = $extension->buildOptions($options);
        }

        $landmark = new Landmark($name, $this);

        foreach ($this->getExtensions() as $extension) {
            $extension->buildItem($landmark, $options);
        }

        return $landmark;
    }

    /**
     * Adds a factory extension
     *
     * @param ExtensionInterface $extension
     * @param integer            $priority
     */
    public function addExtension(ExtensionInterface $extension, $priority = 0)
    {
        $this->extensions[$priority][] = $extension;
        $this->sorted = null;
    }

    /**
     * Builds the full option array used to configure the landmark.
     *
     * @param array $options
     *
     * @return array
     */
    protected function buildOptions(array $options)
    {
        return $options;
    }

    /**
     * Sorts the internal list of extensions by priority.
     *
     * @return ExtensionInterface[]
     */
    private function getExtensions()
    {
        if (null === $this->sorted) {
            krsort($this->extensions);
            $this->sorted = !empty($this->extensions) ?
                call_user_func_array('array_merge', $this->extensions) :
                array();
        }

        return $this->sorted;
    }
}
