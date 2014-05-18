<?php
namespace Landmarx\Interfaces;

use Landmarx\Interfaces\LandmarkInterface;

interface LoaderInterface
{
    /**
     * Loads the data into a menu landmark
     *
     * @param mixed $data
     *
     * @return LandmarkInterface
     */
    public function load($data);

    /**
     * Checks whether the loader can load these data
     *
     * @param mixed $data
     *
     * @return boolean
     */
    public function supports($data);
}
