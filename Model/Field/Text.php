<?php
namespace fhu\CrudFilter\Model\Field;

class Text extends AbstractField
{
    /**
     * @param array $params
     * @return string
     */
    public function render(array $params)
    {
        $obj = $this->item->getConfig();

        $params['name']  = $obj->getName();
        $params['value'] = $obj->getValue();
        $params['id'] = $obj->getId();

        $paramsHtml = $this->renderParams($params);

        $html = '<input type="text" ' . $paramsHtml . ' />';

        return $html;
    }
}