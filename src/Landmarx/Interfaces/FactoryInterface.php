<?php
namespace Landmarx\Interfaces;

interface FactoryInterface
{
    /**
     * Create Landmark
     * @param string $name name
     * @param array $options options
     */
    public function createLandmark($name, array $options = array());
}
