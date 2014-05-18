<?php
namespace Landmarx\Interfaces;

/**
 * Node Interface
 */
interface NodeInterface
{
    /**
     * Get Name
     * 
     * @return string
     */
    public function getName();
    
    /**
     * Get Options
     * 
     * @return array
     */
    public function getAttributes();
    
    /**
     * Get Children
     * 
     * @return array
     */
    public function getChildren();
}
