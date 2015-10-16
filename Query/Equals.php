<?php
namespace fhu\CrudFilter\Query;

class Equals extends AbstractQuery
{
    /**
     * @return string
     */
    public function assemble()
    {
        $dbField = $this->item->config->getDbField();
        $value = $this->item->config->getValue();

        $bindValue = $this->getBindType()->getSql($dbField, $value);

        $sql = "$dbField = {$bindValue}";

        return $sql;
    }
}