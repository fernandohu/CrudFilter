<?php
namespace fhu\CrudFilter;

use fhu\CrudFilter\BindType\Pdo;
use fhu\CrudFilter\Layout\AbstractLayout;
use fhu\CrudFilter\Layout\Bootstrap;
use fhu\CrudFilter\Model\Item;
use fhu\CrudFilter\Model\Items;
use fhu\CrudFilter\BindType\AbstractBindType;
use fhu\CrudFilter\Query\QueryManager;

class Filter
{
    /**
     * @var Items
     */
    protected $items;

    /**
     * @var AbstractLayout
     */
    protected $layoutStrategy;

    /**
     * @var bool
     */
    protected $autoRead = true;

    /**
     * @var string
     */
    protected $formAction;

    /**
     * @var string
     */
    protected $formMethod = 'GET';

    /**
     * @var AbstractBindType
     */
    protected $bindType;

    /**
     * @var QueryManager
     */
    protected $queryManager;

    public function __construct()
    {
        $this->items = new Items();
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $id
     * @return Item
     */
    public function add($label, $name, $id = '')
    {
        return $this->items->add($label, $name, $id);
    }

    /**
     * @param $name
     * @return Item|null
     */
    public function get($name)
    {
        return $this->items->get($name);
    }

    /**
     * @param $name
     */
    public function remove($name)
    {
        $this->items->remove($name);
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items->getItems();
    }

    /**
     * return string
     */
    public function render()
    {
        return $this->getLayoutStrategy()->render();
    }

    /**
     * @return string
     */
    public function assembleSql()
    {
        return $this->getQueryManager()->assemble();
    }

    /**
     * @return string
     */
    public function bind()
    {
        return $this->getQueryManager()->bind();
    }

    /**
     * @return AbstractLayout
     */
    public function getLayoutStrategy()
    {
        if (!$this->layoutStrategy instanceof AbstractLayout) {
            $this->layoutStrategy = new Bootstrap();
            $this->layoutStrategy->setFilter($this);
        }

        return $this->layoutStrategy;
    }

    /**
     * @param AbstractLayout $layoutStrategy
     */
    public function setLayoutStrategy($layoutStrategy)
    {
        $this->layoutStrategy = $layoutStrategy;
        $this->layoutStrategy->setFilter($this);
    }

    /**
     * @return QueryManager
     */
    public function getQueryManager()
    {
        if (!$this->queryManager instanceof QueryManager) {
            $this->queryManager = new QueryManager();
            $this->queryManager->setFilter($this);
        }

        return $this->queryManager;
    }

    /**
     * @param QueryManager $queryManager
     */
    public function setQueryManager($queryManager)
    {
        $this->queryManager = $queryManager;
        $this->queryManager->setFilter($this);
    }

    /**
     * @return boolean
     */
    public function isAutoRead()
    {
        return $this->autoRead;
    }

    /**
     * @param boolean $autoRead
     */
    public function setAutoRead($autoRead)
    {
        $this->autoRead = $autoRead;
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->formAction;
    }

    /**
     * @param string $formAction
     */
    public function setFormAction($formAction)
    {
        $this->formAction = $formAction;
    }

    /**
     * @return string
     */
    public function getFormMethod()
    {
        return $this->formMethod;
    }

    /**
     * @param string $formMethod
     */
    public function setFormMethod($formMethod)
    {
        $this->formMethod = $formMethod;
    }

    /**
     * @return AbstractBindType
     */
    public function getBindType()
    {
        if (!$this->bindType instanceof AbstractBindType) {
            $this->bindType = new Pdo();
        }

        return $this->bindType;
    }

    /**
     * @param AbstractBindType $bindType
     */
    public function setBindType($bindType)
    {
        $this->bindType = $bindType;
    }
}