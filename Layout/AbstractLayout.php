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
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return string
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param string $legend
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSubmitCaption()
    {
        return $this->submitCaption;
    }

    /**
     * @param string $submitCaption
     */
    public function setSubmitCaption($submitCaption)
    {
        $this->submitCaption = $submitCaption;
    }
}