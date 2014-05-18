<?php
namespace Landmarx\Interfaces;

/**
 * Type Interface
 */
interface TypeInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * Get Name
     * 
     * @return string name
     */
    public function getName();
    
    /**
     * Set Name
     * 
     * @param string $name name
     * @return TypeInterface 
     */
    public function setName($name);
    
    /**
     * Get Description
     * 
     * @return LandmarkInterface
     */
    public function getDescription();
    
    /**
     * Set Description
     * 
     * @param string $description description
     * @return TypeInterface
     */
    public function setDescription($description);
    
    /**
     * Get Parent
     * 
     * @return TypeInterface
     */
    public function getParent();
    
    /**
     * Set Parent
     * 
     * @param TypeInterface $parent parent
     * @return TypeInterface
     */
    public function setParent(TypeInterface $parent = null);
    
    /**
     * Is Public
     * 
     * @param bool|null $public yes|no|null
     */
    public function isPublic($public = null);
}
