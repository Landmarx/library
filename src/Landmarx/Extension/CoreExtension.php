<?php
namespace Landmarx\Extension;

use Landmarx\Interfaces\LandmarkInterface;
use Landmarx\Interfaces\ExtensionInterface;

/**
 * Core factory extension with the main logic
 */
class CoreExtension implements ExtensionInterface
{
    /**
     * Builds the full option array used to configure the landmark.
     *
     * @param array $options
     *
     * @return array
     */
    public function buildOptions(array $options)
    {
        return $options;
    }

    /**
     * Configures the newly created landmark with the passed options
     *
     * @param LandmarkInterface $landmark
     * @param array         $options
     */
    public function buildLandmark(LandmarkInterface $landmark, array $options)
    {
        $landmark->setAttributes($options);
    }
}
