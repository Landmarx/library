<?php
namespace Landmarx\Interfaces;

interface AntecedentInterface
{
    /**
     * Get children
     * 
     * @return array
     */
    public function getChildren();
    
    /**
     * Set children
     * 
     * @param array $children
     * @return AntecentInterface 
     */
    public function setChildren(array $children);
    
    /**
     * Has children
     * 
     * @return boolean
     */
    public function hasChildren();
    
    /**
     * Get child
     * 
     * @param AntecendentInterface $child
     * @return AntecentInterface
     */
    public function getChild($child);
    
    /**
     * Add child
     * 
     * @param AntecentInterface $child
     * @return AntecentInterface
     */
    public function addChild($child);
    
    /**
     * Has child
     * 
     * @param AntecentInterface $child
     * @return boolean
     */
    public function hasChild($child);
    
    /**
     * Remove child
     * 
     * @param AntecentInterface $child
     * @return boolean|AntecentInterface
     */
    public function removeChild($child);
}
