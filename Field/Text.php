<?php
namespace fhu\CrudFilter\Field;

class Text extends AbstractField
{
    /**
     * @param array $params
     * @return string
     */
    public function render(array $params)
    {
        $obj = $this->item->config;

        $params['name']  = $obj->getName();
        $params['value'] = $obj->getValue();

        $paramsHtml = $this->renderParams($params);

        $html = '<input type="text" ' . $paramsHtml . ' />';

        return $html;
    }
}