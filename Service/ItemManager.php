<?php
namespace fhu\CrudFilter\Service;

use fhu\CrudFilter\Filter;
use fhu\CrudFilter\Model\Item;

class ItemManager
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var Filter
     */
    protected $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $id
     * @return Item
     */
    public function add($label, $name, $id = '')
    {
        if ($id == '') {
            $id = $name;
        }

        $item = new Item($this->filter);
        $item->getConfig()
            ->setLabel($label)
            ->setName($name)
            ->setId($id);

        $this->items[$name] = $item;

        return $item;
    }

    /**
     * @param $name
     * @return Item|null
     */
    public function get($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }

        return null;
    }

    /**
     * @param $name
     */
    public function remove($name)
    {
        unset($this->items[$name]);
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }
}