<?php
namespace fhu\CrudFilter\Model\Sql;

use fhu\CrudFilter\Model\BindType\AbstractBindType;
use fhu\CrudFilter\Model\Item;

abstract class AbstractSql
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * @var AbstractBindType
     */
    protected $bindType;

    /**
     * @param Item $item
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @return AbstractBindType
     */
    public function getBindType()
    {
        return $this->bindType;
    }

    /**
     * @param AbstractBindType $bindType
     */
    public function setBindType($bindType)
    {
        $this->bindType = $bindType;
    }

    /**
     * @return string
     */
    public abstract function assemble();

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->getItem()->getConfig()->getValue();
    }
}