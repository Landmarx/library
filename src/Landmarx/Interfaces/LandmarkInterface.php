<?php
namespace Landmarx\Interfaces;

/**
 * Landmark Interface
 */
interface LandmarkInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * Set Factory
     * 
     * @param FactoryInterface $factory landmark factory
     * @return LandmarkInterface
     */
    public function setFactory(FactoryInterface $factory);
    
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
     * @return LandmarkInterface 
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
     * @return LandmarkInterface
     */
    public function setDescription($description);
    
    /**
     * Get Latitude
     * 
     * @return float
     */
    public function getLatitude();
    
    /**
     * Set Latitude
     * 
     * @param float $latitude latitude
     * @return LandmarkInterface
     */
    public function setLatitude($latitude);
    
    /**
     * Get Longitude
     * 
     * @return float 
     */
    public function getLongitude();
    
    /**
     * Set Longitude
     * 
     * @param float $longitude longitude
     * @return LandmarkInterface
     */
    public function setLongitude($longitude);
    
    /**
     * Get Type
     * 
     * @return type
     */
    public function getType();
    
    /**
     * Set Type
     * 
     * @param type $type type
     * @return type
     */
    public function setType($type);
    
    /**
     * Get Attributes
     * 
     * @return array
     */
    public function getAttributes();
    
    /**
     * Set Attributes
     * 
     * @param array  $attributes attributes
     * @return LandmarkInterface
     */
    public function setAttributes(array $attributes);
    
    /**
     * Is Public
     * 
     * @param bool|null $public yes|no|null
     */
    public function isPublic($public = null);
    
    /**
     * Get Parent
     * 
     * @return LandmarkInterface
     */
    public function getParent();
    
    /**
     * Set Parent
     * 
     * @param LandmarkInterface $parent parent
     * @return LandmarkInterface
     */
    public function setParent(LandmarkInterface $parent = null);
}
