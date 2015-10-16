<?php
namespace fhu\CrudFilter\Query;

use fhu\CrudFilter\BindType\AbstractBindType;
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
            
            $sql .= ' ' . $item->assembleSql($this->getFilter()->getBindType());
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
        foreach ($this->filter->getItems() as $item)  {
            $queryStrategy = $item->getQueryStrategy();

            $params[] = $bindType->getBind($item->config->getDbField(), $queryStrategy->getValue(), $item->config->getDbType());
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