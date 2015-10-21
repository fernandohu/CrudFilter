<?php
namespace fhu\CrudFilter\Model\Sql;

class Like extends AbstractSql
{
    /**
     * @return string
     */
    public function assemble()
    {
        $dbField = $this->item->getConfig()->getDbField();
        $value = '%' . $this->item->getConfig()->getValue() . '%';

        $bindValue = $this->getBindType()->getSql($dbField, $value);

        $sql = "{$dbField} LIKE {$bindValue}";

        return $sql;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return '%' . $this->item->getConfig()->getValue() . '%';
    }
}