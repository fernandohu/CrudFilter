<?php
namespace fhu\CrudFilter\Model\BindType;

class Phalcon extends AbstractBindType
{
    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public function getSql($name, $value)
    {
        return ":{$name}:";
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $type
     * @return string
     */
    public function getBind($name, $value, $type)
    {
        return [
            $name => $value
        ];
    }

}