<?php
namespace Landmarx\Model;

use Landmarx\Interfaces\TypeInterface;
use Landmarx\Interfaces\AntecedentInterface;

class Type implements TypeInterface, AntecedentInterface
{
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
     * Is type public
     * @var boolean
     */
    protected $public;
    
    /**
     * Type parent
     * @var Landmarx\Model\Type
     */
    protected $parent;
    
    /**
     * Children
     * @var array 
     */
    protected $children;
    
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
    public function hasChild(Type $child)
    {
        return in_array($child, $this->children);
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
