<?php
namespace fhu\CrudFilter\Query;

class Like extends AbstractQuery
{
    /**
     * @return string
     */
    public function assemble()
    {
        $dbField = $this->item->config->getDbField();
        $value = '%' . $this->item->config->getValue() . '%';

        $bindValue = $this->getBindType()->getSql($dbField, $value);

        $sql = "{$dbField} LIKE {$bindValue}";

        return $sql;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return '%' . $this->item->config->getValue() . '%';
    }
}