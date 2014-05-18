<?php
namespace Landmarx\Loader;

use Landmarx\Interfaces\FactoryInterface;
use Landmarx\Interfaces\LandmarkInterface;
use Landmarx\Interfaces\LoaderInterface;

class ArrayLoader implements LoaderInterface
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function load($data)
    {
        if (!$this->supports($data)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported data. Expected an array but got ',
                    is_object($data) ? get_class($data) : gettype($data)
                )
            );
        }

        return $this->fromArray($data);
    }

    public function supports($data)
    {
        return is_array($data);
    }

    /**
     * @param array       $data
     * @param string|null $name
     *
     * @return LandmarkInterface
     */
    private function fromArray(array $data, $name = null)
    {
        $name = isset($data['name']) ? $data['name'] : $name;

        if (isset($data['children'])) {
            $children = $data['children'];
            unset($data['children']);
        } else {
            $children = array();
        }

        $landmark = $this->factory->createLandmark($name, $data);

        foreach ($children as $name => $child) {
            $landmark->addChild($this->fromArray($child, $name));
        }

        return $landmark;
    }
}
