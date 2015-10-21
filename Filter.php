<?php
namespace fhu\CrudFilter;

use fhu\CrudFilter\Model\BindType\Pdo;
use fhu\CrudFilter\Layout\AbstractLayout;
use fhu\CrudFilter\Layout\Bootstrap;
use fhu\CrudFilter\Model\Form;
use fhu\CrudFilter\Model\Item;
use fhu\CrudFilter\Service\ItemManager;
use fhu\CrudFilter\Model\BindType\AbstractBindType;
use fhu\CrudFilter\Service\QueryManager;

class Filter
{
    /**
     * @var ItemManager
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
     * @var AbstractBindType
     */
    protected $bindType;

    /**
     * @var Form
     */
    protected $form;

    /**
     * @var QueryManager
     */
    protected $queryManager;

    public function __construct()
    {
        $this->items = new ItemManager($this);
    }

    /**
     * @param string $label
     * @param string $name
     * @param string $id
     * @return Item
     */
    public function addField($label, $name, $id = '')
    {
        return $this->items->add($label, $name, $id);
    }

    /**
     * @param $name
     * @return Item|null
     */
    public function getField($name)
    {
        return $this->items->get($name);
    }

    /**
     * @param $name
     */
    public function removeField($name)
    {
        $this->items->remove($name);
    }

    /**
     * @return ItemManager
     */
    public function getFields()
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
     * This method will return the SQL used to filter a listing query.
     *
     * @return string
     */
    public function assembleSql()
    {
        return $this->getQueryManager()->assemble();
    }

    /**
     * This method will return an array with bind information that is prepared to be passed to
     * the chosen bind type.
     *
     * @return string
     */
    public function assembleBind()
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

    /**
     * @return Form
     */
    public function getForm()
    {
        if (!$this->form instanceof Form) {
            $this->form = new Form();
        }

        return $this->form;
    }

    /**
     * @param Form $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }
}