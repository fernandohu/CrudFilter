<?php
namespace fhu\CrudFilter\Field;

use fhu\CrudFilter\Model\Item;

abstract class AbstractField
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
     * @param $value
     * @return string
     */
    public function sanitize($value)
    {
        return htmlspecialchars($value);
    }

    /**
     * @param array $params
     * @return string
     */
    protected function renderParams(array $params)
    {
        $result = '';

        foreach ($params as $name => $value) {
            if ($result != '') {
                $result .= ' ';
            }

            $result .= $name . '="' . $this->sanitize($value) . '"';
        }

        return $result;
    }

    /**
     * @param array $params
     * @return string
     */
    public abstract function render(array $params);
}