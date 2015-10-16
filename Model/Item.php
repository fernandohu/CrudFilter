<?php
namespace fhu\CrudFilter\Model;

use fhu\CrudFilter\Field\AbstractField;
use fhu\CrudFilter\BindType\AbstractBindType;
use fhu\CrudFilter\Query\AbstractQuery;
use fhu\CrudFilter\Query\Equals;
use fhu\CrudFilter\Field\Text;

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

    public function __construct()
    {
        $this->config = new Config();
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
     * @return AbstractQuery
     */
    public function getQueryStrategy()
    {
        if (!$this->queryStrategy instanceof AbstractQuery) {
            $this->queryStrategy = new Equals();
        }

        $this->queryStrategy->setItem($this);

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

        $this->fieldStrategy->setItem($this);

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