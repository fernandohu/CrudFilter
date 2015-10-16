<?php
namespace fhu\CrudFilter\BindType;

class MysqlEscape extends AbstractBindType
{
    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public function getSql($name, $value)
    {
        $value = mysql_escape_string($value);

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
        return false;
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