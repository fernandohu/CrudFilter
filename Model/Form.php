<?php
namespace fhu\CrudFilter\Model;

class Form
{
    /**
     * @var string
     */
    protected $formAction;

    /**
     * @var string
     */
    protected $formMethod = 'GET';

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
}