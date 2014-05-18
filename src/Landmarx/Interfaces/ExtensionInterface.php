<?php
namespace Landmarx\Interfaces;

use Landmarx\Interfaces\LandmarkInterface;

interface ExtensionInterface
{
    /**
     * Builds the full option array used to configure the landmark.
     *
     * @param array $options The options processed by the previous extensions
     *
     * @return array
     */
    public function buildOptions(array $options);

    /**
     * Configures the landmark with the passed options
     *
     * @param LandmarkInterface $landmark
     * @param array         $options
     */
    public function buildLandmark(LandmarkInterface $landmark, array $options);
}
