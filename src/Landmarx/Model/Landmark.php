<?php
namespace Landmarx\Model;

use Landmarx\Interfaces\LandmarkInterface;

class Landmark implements LandmarkInterface
{
    /**
     * Landmark Factory
     * @var Landmarx\Interfaces\FactoryInterface
     */
    protected $factory;
    
    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Description
     * @var string
     */
    protected $description;
    
    /**
     * Landmark type
     * @var Landmarx\Model\LandmarkType
     */
    protected $type;
    
    /**
     * Is landmark public
     * @var boolean
     */
    protected $public;
    
    /**
     * Landmark parent
     * @var Landmarx\Model\Landmark
     */
    protected $parent;
    
    /**
     * Latitude
     * @var float 
     */
    protected $latitude;
    
    /**
     * Longitude
     * @var float 
     */
    protected $longitude;
    
    /**
     * Children
     * @var array 
     */
    protected $children;
    
    /**
     * Attributes
     * @var array
     */
    protected $attributes;
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setType(Type $type)
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getPublic()
    {
        return $this->public;
    }
    
    /**
     * @{inheritdoc}
     */
    public function isPublic($public = null)
    {
        if (null !== $public) {
            $this->public = $public;
            
            return $this;
        }
        
        return (boolean) $this->public;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setLatiitude($latitude)
    {
        $this->latitude = $latitude;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setLongtitude($longitude)
    {
        $this->longitude = $longitude;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setChildren(array $children)
    {
        $this->children = $children;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function hasChildren()
    {
        return (count($this->children) > 1);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getChild(Landmark $child)
    {
        return (in_array($child, $this->children) ?: $this->children[$child]);
    }
    
    /**
     * @{inheritdoc}
     */
    public function addChild(Landmark $child)
    {
        $this->children[] = $child;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function removeChild(Landmark $child)
    {
        unset($this->children[$child]);
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function hasAttributes()
    {
        return (count($this->attributes) > 1);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getAttribute(Landmark $attribute)
    {
        return (in_array($attribute, $this->attributes) ?: $this->attributes[$attribute]);
    }
    
    /**
     * @{inheritdoc}
     */
    public function addAttribute(Landmark $attribute)
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function removeAttribute(Landmark $attribute)
    {
        unset($this->attributes[$attribute]);
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * @{inheritdoc}
     */
    public function setParent(Landmark $parent)
    {
        $this->parent = $parent;
        
        return $this;
    }
    
    /**
     * @{inheritdoc}
     */
    public function count()
    {
        return count($this->children);
    }

    /**
     * @{inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->children);
    }

   /**
     * @{inheritdoc}
     */
    public function offsetExists($name)
    {
        return isset($this->children[$name]);
    }

    /**
     * @{inheritdoc}
     */
    public function offsetGet($name)
    {
        return $this->getChild($name);
    }

    /**
     * @{inheritdoc}
     */
    public function offsetSet($name, $value)
    {
        return $this->addChild($name)->setName($value);
    }

    /**
     * @{inheritdoc}
     */
    public function offsetUnset($name)
    {
        $this->removeChild($name);
    }
}
