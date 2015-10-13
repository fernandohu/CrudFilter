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
        $value = mysql_escape_string($this->item->config->getValue());

        $sql = "`$dbField` = '" . $value . "'";

        return $sql;
    }
}