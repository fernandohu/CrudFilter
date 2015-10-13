<?php
namespace fhu\CrudFilter\Model;

class Items
{
    /**
     * @var Item[]
     */
    protected $items;

    /**
     * @param string $label
     * @param string $value
     * @param string $name
     * @param string $id
     * @return Item
     */
    public function add($label, $value, $name, $id = '')
    {
        if ($id == '') {
            $id = $name;
        }

        $item = new Item();
        $item->config->setLabel($label);
        $item->config->setValue($value);
        $item->config->setName($name);
        $item->config->setId($id);

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
}