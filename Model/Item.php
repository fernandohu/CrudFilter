<?php
namespace fhu\CrudFilter\Model;

use fhu\CrudFilter\Model\Field\AbstractField;
use fhu\CrudFilter\Model\BindType\AbstractBindType;
use fhu\CrudFilter\Filter;
use fhu\CrudFilter\Model\Sql\AbstractSql;
use fhu\CrudFilter\Model\Sql\Equals;
use fhu\CrudFilter\Model\Field\Text;

class Item
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var AbstractField
     */
    protected $fieldStrategy;

    /**
     * @var AbstractSql
     */
    protected $queryStrategy;

    /**
     * @var Filter
     */
    protected $filter;

    public function __construct(Filter $filter)
    {
        $this->config = new Config($filter);
        $this->filter = $filter;
    }

    /**
     * @param array $params
     * @return string
     */
    public function render(array $params)
    {
        return $this->getFieldStrategy()->render($params);
    }

    /**
     * @param AbstractBindType $bindType
     * @return string
     */
    public function assembleSql(AbstractBindType $bindType)
    {
        $queryStrategy = $this->getQueryStrategy();
        $queryStrategy->setBindType($bindType);

        return $queryStrategy->assemble();
    }

    /**
     * @return AbstractSql
     */
    public function getQueryStrategy()
    {
        if (!$this->queryStrategy instanceof AbstractSql) {
            $this->queryStrategy = new Equals();
            $this->queryStrategy->setItem($this);
        }

        return $this->queryStrategy;
    }

    /**
     * @param AbstractSql $queryStrategy
     * @return Item
     */
    public function setQueryStrategy($queryStrategy)
    {
        $this->queryStrategy = $queryStrategy;
        $this->queryStrategy->setItem($this);

        return $this;
    }

    /**
     * @return AbstractField
     */
    public function getFieldStrategy()
    {
        if (!$this->fieldStrategy instanceof AbstractField) {
            $this->fieldStrategy = new Text();
            $this->fieldStrategy->setItem($this);
        }

        return $this->fieldStrategy;
    }

    /**
     * @param AbstractField $fieldStrategy
     * @return Item
     */
    public function setFieldStrategy($fieldStrategy)
    {
        $this->fieldStrategy = $fieldStrategy;
        $this->fieldStrategy->setItem($this);

        return $this;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }
}