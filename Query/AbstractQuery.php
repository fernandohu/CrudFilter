<?php
namespace fhu\CrudFilter\Query;

use fhu\CrudFilter\Model\Item;

abstract class AbstractQuery
{
    /**
     * @var Item
     */
    protected $item;

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
     * @return string
     */
    public abstract function assemble();
}