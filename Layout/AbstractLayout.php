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
     * @var bool
     */
    protected $keepMinimized = false;

    /**
     * @var string
     */
    protected $minimizeJs = '';

    /**
     * @var string
     */
    protected $cookiePrefix = '';

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
     * @param bool $all
     * @return string
     */
    public function getMinimizeJs($all = false)
    {
        if ($all) {
            $id = $this->getFilter()->getId();

            $minimizeLink = 'javascript:document.getElementById(\'' . $id . '\').style.display = \'none\';';
            if ($this->isKeepMinimized()) {
                $minimizeLink .= '$.cookie(\'' . $this->cookiePrefix . $id . ':visible\', \'no\');';
            }

            return $minimizeLink . $this->minimizeJs;
        }

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

        if ($this->isKeepMinimized()) {
            $js .= '$.cookie(\'' . $this->cookiePrefix . $id . ':visible\', \'yes\');';
        }

        return $js;
    }

    /**
     * @return boolean
     */
    public function isKeepMinimized()
    {
        return $this->keepMinimized;
    }

    /**
     * Keep minimized between requests. Cookies will be used to transport information between
     * requests.
     *
     * @param boolean $keepMinimized
     * @param string $cookiePrefix
     */
    public function setKeepMinimized($keepMinimized, $cookiePrefix = 'crudfilter:')
    {
        $this->keepMinimized = $keepMinimized;
        $this->cookiePrefix = $cookiePrefix;
    }

    /**
     * Returns display 'none' of 'block' according to cookie value.
     *
     * @return string
     */
    public function getDisplay()
    {
        if ($this->isKeepMinimized()) {
            $id = $this->getFilter()->getId();
            $cookieName = $this->cookiePrefix . $id . ':visible';

            if (isset($_COOKIE[$cookieName])) {
                if ($_COOKIE[$cookieName] == 'yes') {
                    return 'block';
                }
            }

            return 'none';
        }

        return 'block';
    }
}