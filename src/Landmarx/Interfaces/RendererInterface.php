<?php
namespace Landmarx\Renderer;

use Landmarx\Interfaces\LandmarkInterface;

interface RendererInterface
{
    public function render(LandmarkInterface $landmark, array $options = array());
}
