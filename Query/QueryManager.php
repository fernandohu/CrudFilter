<?php
namespace fhu\CrudFilter\Query;

use fhu\CrudFilter\Filter;
use fhu\CrudFilter\Model\Item;

class QueryManager
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @return string
     */
    public function assemble()
    {
        $sql = '';

        /**
         * @var Item $item
         */
        foreach ($this->filter->getItems() as $item)  {
            if ($sql != '') {
                $sql .= ' AND';
            }
            
            $sql .= ' ' . $item->assembleSql();
        }

        return $sql;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param Filter $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }
}