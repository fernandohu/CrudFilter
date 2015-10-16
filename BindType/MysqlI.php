<?php
namespace fhu\CrudFilter\BindType;

use fhu\CrudFilter\Model\Config;

class MysqlI extends AbstractBindType
{
    /**
     * @param string $name
     * @param string $value
     * @return string
     */
    public function getSql($name, $value)
    {
        return "?";
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $type
     * @return string
     */
    public function getBind($name, $value, $type)
    {
        switch ($type) {
            case Config::DB_TYPE_DOUBLE:
                $shortType = 'd';
                break;
            case Config::DB_TYPE_INTEGER:
                $shortType = 'i';
                break;
            case Config::DB_TYPE_BLOB:
                $shortType = 'b';
                break;
            case Config::DB_TYPE_STRING:
            default:
                $shortType = 's';
                break;
        }

        return [
            $shortType => $value
        ];
    }

    /**
     * @param array $params
     * @return array
     */
    public static function postProcessor(array $params)
    {
        $result = ['types' => '', 'vars' => []];

        foreach ($params as $param) {
            $type = key($param);
            $value = current($param);

            $result['types'] .= $type;
            $result['vars'][] = $value;
        }

        return $result;
    }
}