<?php
namespace fhu\CrudFilter\Model;

use fhu\CrudFilter\Layout\AbstractField;
use fhu\CrudFilter\Query\AbstractQuery;
use fhu\CrudFilter\Query\Equals;
use fhu\CrudFilter\Query\Text;

class Item
{
    /**
     * @var Config
     */
    public $config;

    /**
     * @var AbstractField
     */
    protected $fieldStrategy;

    /**
     * @var AbstractQuery
     */
    protected $queryStrategy;

    /**
     * @param array $params
     * @return string
     */
    public function render(array $params)
    {
        $this->getFieldStrategy()->setItem($this);
        return $this->getFieldStrategy()->render($params);
    }

    /**
     * @return string
     */
    public function assembleSql()
    {
        $this->getQueryStrategy()->setItem($this);
        return $this->getQueryStrategy()->assemble();
    }

    /**
     * @return AbstractQuery
     */
    public function getQueryStrategy()
    {
        if (!$this->queryStrategy instanceof AbstractQuery) {
            $this->queryStrategy = new Equals();
        }

        return $this->queryStrategy;
    }

    /**
     * @param AbstractQuery $queryStrategy
     * @return Item
     */
    public function setQueryStrategy($queryStrategy)
    {
        $this->queryStrategy = $queryStrategy;

        return $this;
    }

    /**
     * @return AbstractField
     */
    public function getFieldStrategy()
    {
        if (!$this->fieldStrategy instanceof AbstractField) {
            $this->fieldStrategy = new Text();
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

        return $this;
    }
}