<?php

namespace Landmarx\Renderer;

use Landmarx\LandmarkInterface;

/**
 * Renders Landmark tree as unordered list
 */
class ListRenderer extends Renderer implements RendererInterface
{
    protected $defaultOptions;

    /**
     * @param array            $defaultOptions
     * @param string           $charset
     */
    public function __construct(array $defaultOptions = array(), $charset = null)
    {
        $this->defaultOptions = $defaultOptions;

        parent::__construct($charset);
    }

    public function render(LandmarkInterface $landmark, array $options = array())
    {
        $options = array_merge($this->defaultOptions, $options);

        $html = $this->renderList($landmark, $options);

        return $html;
    }

    protected function renderList(LandmarkInterface $landmark, array $options)
    {
        if (!$landmark->hasChildren()) {
            return '';
        }

        $html = $this->format(
            '<ul>',
            'ul', $landmark->getLevel(),
            $options
        );
        $html .= $this->renderChildren($landmark, $options);
        $html .= $this->format('</ul>', 'ul', $landmark->getLevel(), $options);

        return $html;
    }

    protected function renderChildren(LandmarkInterface $landmark, array $options)
    {
        $html = '';
        foreach ($landmark->getChildren() as $child) {
            $html .= $this->renderLandmark($child, $options);
        }

        return $html;
    }

    protected function renderLandmark(LandmarkInterface $landmark, array $options)
    {
        // if we don't have access or this landmark is marked to not be shown
        if (!$landmark->isPublic()) {
            return '';
        }

        

        // opening li tag
        $html = $this->format('<li>', 'li', $landmark->getLevel(), $options);
//        $html .= $this->renderLink($landmark, $options);
        $html .= $landmark->getName();
        
        // renders the embedded ul
        $html .= $this->renderList($landmark, $options);

        // closing li tag
        $html .= $this->format('</li>', 'li', $landmark->getLevel(), $options);

        return $html;
    }

    protected function format($html, $type, $level, array $options)
    {
        if ($options['compressed']) {
            return $html;
        }

        switch ($type) {
            case 'ul':
            case 'link':
                $spacing = $level * 4;
                break;

            case 'li':
                $spacing = $level * 4 - 2;
                break;
        }

        return str_repeat(' ', $spacing).$html."\n";
    }
}
