<?php
namespace fhu\CrudFilter\Layout;

use fhu\CrudFilter\Filter;

abstract class AbstractLayout
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var string
     */
    protected $title = 'Filter';

    /**
     * @var string
     */
    protected $submitCaption = 'Submit';

    /**
     * @var string
     */
    protected $legend;

    /**
     * @var bool
     */
    protected $enableMinimizeButton = false;

    /**
     * @var string
     */
    protected $minimizeHint = '';

    /**
     * @var string
     */
    protected $minimizeJs = '';

    public abstract function render();

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param Filter $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return string
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param $legend
     * @return $this
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubmitCaption()
    {
        return $this->submitCaption;
    }

    /**
     * @param $submitCaption
     * @return $this
     */
    public function setSubmitCaption($submitCaption)
    {
        $this->submitCaption = $submitCaption;

        return $this;
    }

    /**
     * @return boolean
     *
     */
    public function isEnableMinimizeButton()
    {
        return $this->enableMinimizeButton;
    }

    /**
     * @param boolean $enableMinimizeButton
     * @return $this
     */
    public function setEnableMinimizeButton($enableMinimizeButton)
    {
        $this->enableMinimizeButton = $enableMinimizeButton;

        return $this;
    }

    /**
     * @return string
     */
    public function getMinimizeHint()
    {
        return $this->minimizeHint;
    }

    /**
     * @param string $minimizeHint
     */
    public function setMinimizeHint($minimizeHint)
    {
        $this->minimizeHint = $minimizeHint;
    }

    /**
     * @return string
     */
    public function getMinimizeJs()
    {
        return $this->minimizeJs;
    }

    /**
     * @param string $minimizeJs
     */
    public function setMinimizeJs($minimizeJs)
    {
        $this->minimizeJs = $minimizeJs;
    }

    public function getMaximizeJs()
    {
        $id = $this->getFilter()->getId();
        $js = 'document.getElementById(\'' . $id . '\').style.display = \'block\';';

        return $js;
    }
}