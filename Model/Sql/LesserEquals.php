<?php
namespace fhu\CrudFilter\Model\Sql;

class LesserEquals extends AbstractSql
{
    /**
     * @return string
     */
    public function assemble()
    {
        $dbField = $this->item->getConfig()->getDbField();
        $value = $this->item->getConfig()->getValue();

        $bindValue = $this->getBindType()->getSql($dbField, $value);

        $sql = "`$dbField` <= {$bindValue}";

        return $sql;
    }
}