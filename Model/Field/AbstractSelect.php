<?php
namespace fhu\CrudFilter\Model\Field;

abstract class AbstractSelect extends AbstractField
{
    /**
     * @var array
     */
    protected $list = [];

    /**
     * @var string
     */
    protected $default = 'All';

    /**
     * @var bool
     */
    protected $showDefault = true;

    /**
     * @param array $options
     */
    public function __construct(array $options, $showDefault = true)
    {
        $this->list = $options;
        $this->showDefault = $showDefault;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return boolean
     */
    public function isShowDefault()
    {
        return $this->showDefault;
    }

    /**
     * @param boolean $showDefault
     */
    public function setShowDefault($showDefault)
    {
        $this->showDefault = $showDefault;
    }
}