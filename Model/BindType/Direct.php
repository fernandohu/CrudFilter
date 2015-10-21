<?php
namespace fhu\CrudFilter\Model\BindType;

class Direct extends AbstractBindType
{
    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public function getSql($name, $value)
    {
        return "'{$value}'";
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $type
     * @return string
     */
    public function getBind($name, $value, $type)
    {
        return [];
    }

    /**
     * @param array $params
     * @return array
     */
    public static function postProcessor(array $params)
    {
        return null;
    }
}