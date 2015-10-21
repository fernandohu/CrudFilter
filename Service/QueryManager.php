<?php
namespace fhu\CrudFilter\Service;

use fhu\CrudFilter\Model\BindType\AbstractBindType;
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

        $filter = $this->getFilter();

        /**
         * @var Item $item
         */
        foreach ($filter->getFields() as $item)  {
            if (is_null($item->getConfig()->getValue())) {
                continue;
            }

            if ($sql != '') {
                $sql .= ' AND';
            }
            
            $sql .= ' ' . $item->assembleSql($filter->getBindType());
        }

        return $sql;
    }

    public function bind()
    {
        $params = [];

        $bindType = $this->getFilter()->getBindType();

        /**
         * @var Item $item
         */
        foreach ($this->filter->getFields() as $item)  {
            if (is_null($item->getConfig()->getValue())) {
                continue;
            }

            $queryStrategy = $item->getQueryStrategy();

            $params[] = $bindType->getBind($item->getConfig()->getDbField(), $queryStrategy->getValue(), $item->getConfig()->getDbType());
        }

        $className = get_class($bindType);
        if (method_exists($className, 'postProcessor')) {
            return $className::{'postProcessor'}($params);
        } else {
            return AbstractBindType::postProcessor($params);
        }
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