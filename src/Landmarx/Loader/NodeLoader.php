<?php
namespace Landmarx\Loader;

use Landmarx\Interfaces\FactoryInterface;
use Landmarx\Interfaces\NodeInterface;
use Landmarx\Interfaces\LoaderInterface;

class NodeLoader implements LoaderInterface
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function load($data)
    {
        if (!$data instanceof NodeInterface) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported data. Expected Landmarx\NodeInterface but got ',
                    is_object($data) ? get_class($data) : gettype($data)
                )
            );
        }

        $landmark = $this->factory->createLandmark($data->getName(), $data->getOptions());

        foreach ($data->getChildren() as $childNode) {
            $landmark->addChild($this->load($childNode));
        }

        return $landmark;
    }

    public function supports($data)
    {
        return $data instanceof NodeInterface;
    }
}
