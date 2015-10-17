<?php
namespace fhu\CrudFilter\Field;

class Select extends AbstractSelect
{
    /**
     * @param array $params
     * @return string
     */
    public function render(array $params)
    {
        $obj = $this->item->config;

        $value = $obj->getValue();

        $params['name']  = $obj->getName();
        $params['value'] = $value;
        $params['id'] = $obj->getId();

        $paramsHtml = $this->renderParams($params);

        $html = '<select class="form-control" ' . $paramsHtml . '>';

        $options = $this->getList();

        if (!$this->isShowDefault()) {
            unset($options[$this->default]);
        }

        foreach ($options as $text => $key) {

            if ($value == $key) {
                $selected = ' selected="selected"';
            } else {
                $selected = '';
            }

            $html .= '
            <option value="' . htmlspecialchars($key) . '"' . $selected . '>' . $text . '</option>
';
        }

        $html .= '
</select>
';

        return $html;
    }
}