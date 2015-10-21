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
}