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
        $value = mysql_escape_string($this->item->config->getValue());

        $sql = "`$dbField` LIKE '%" . $value . "%'";

        return $sql;
    }
}