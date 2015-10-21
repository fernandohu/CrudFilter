<?php
namespace fhu\CrudFilter\Model\BindType;

abstract class AbstractBindType
{
    const TYPE_DIRECT = 1;
    const TYPE_PDO    = 2;
    const TYPE_MYSQLI = 3;

    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public abstract function getSql($name, $value);

    /**
     * @param string $name
     * @param string $value
     * @param string $type
     * @return string
     */
    public abstract function getBind($name, $value, $type);

    /**
     * @param array $params
     * @return array
     */
    public static function postProcessor(array $params)
    {
        $result = [];

        foreach ($params as $param) {
            $key = key($param);
            $value = current($param);

            if (is_null($value))
                continue;

            $result[$key] = $value;
        }

        return $result;
    }
}