<?php
namespace fhu\CrudFilter\Model;

class Config
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $dbField;

    /**
     * @var string
     */
    protected $help;

    /**
     * @var string
     */
    protected $placeHolder = '';

    /**
     * @var int
     */
    protected $columnSize = 6;

    /**
     * @var int
     */
    protected $labelSize = 3;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Config
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Config
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Config
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Config
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDbField()
    {
        return $this->dbField;
    }

    /**
     * @param string $dbField
     * @return Config
     */
    public function setDbField($dbField)
    {
        $this->dbField = $dbField;

        return $this;
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @param string $help
     * @return Config
     */
    public function setHelp($help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * @return int
     */
    public function getColumnSize()
    {
        return $this->columnSize;
    }

    /**
     * @param int $columnSize
     * @return Config
     */
    public function setColumnSize($columnSize)
    {
        $this->columnSize = $columnSize;

        return $this;
    }

    /**
     * @return int
     */
    public function getLabelSize()
    {
        return $this->labelSize;
    }

    /**
     * @param int $labelSize
     * @return Config
     */
    public function setLabelSize($labelSize)
    {
        $this->labelSize = $labelSize;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceHolder()
    {
        return $this->placeHolder;
    }

    /**
     * @param string $placeHolder
     * @return Config
     */
    public function setPlaceHolder($placeHolder)
    {
        $this->placeHolder = $placeHolder;

        return $this;
    }
}