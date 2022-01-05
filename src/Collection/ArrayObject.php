<?php

/**
 * Wrapper class around the array object for the array API standard.
 *
 * The standard compliant class is only a wrapper class. It is *not* a subclass of array
 *
 * @package Tetration\Numbers\Collection
 * @author Achraf Soltani
 * @version $Revision: 1.3 $
 * @access public
 * @see http://www.example.com/pear
 */
class ArrayObject implements ArrayAccess
{
    private array $container = array();

    public function __construct(array $data)
    {
        $this->container = $data;
    }

    public function offsetSet($offset, $value) : void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) : bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)  : void
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) : mixed
    {
        return $this->container[$offset] ?? null;
    }

    public function &__get ($key)
    {
        return $this->data[$key];
    }

    public function __ToString()
    {
        return '';
    }
}