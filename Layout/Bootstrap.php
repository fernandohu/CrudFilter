<?php
namespace fhu\CrudFilter\Layout;

use fhu\CrudFilter\Exception\IdNotFoundException;
use fhu\CrudFilter\Exception\LabelNotFoundException;
use fhu\CrudFilter\Model\Item;

class Bootstrap extends AbstractLayout
{
    /**
     * @return string
     */
    public function render()
    {
        $legend = $this->getLegend();

        $html = '
<form class="form-horizontal">
    <fieldset>
';

        if ($legend != '') {
            $html = "
        <legend>$legend</legend>
            ";
        }

        $html .= '
    <div class="form-group">
';

        /**
         * @var Item $item
         */
        foreach ($this->filter->getItems() as $item) {
            $html .= $this->renderItem($item);
        }

        $html .= '
    </div>
    </fieldset>
</form>
';

        return $html;
    }

    /**
     * @param Item $item
     * @return string
     * @throws IdNotFoundException
     * @throws LabelNotFoundException
     */
    protected function renderItem(Item $item)
    {
        $id = $item->config->getId();
        $label = $item->config->getLabel();

        if (empty($id)) {
            throw new IdNotFoundException();
        }

        if (empty($label)) {
            throw new LabelNotFoundException();
        }

        $params = [
            'placeholder' => 'placeholder',
            'class' => 'form-control input-md',
        ];

        $help = '';
        if ($item->config->getHelp() != '') {
            $help = '
            <span class="help-block">' . $item->config->getHelp() . '</span>
';
        }

        $html = '
        <label class="col-md-4 control-label" for="' . $id . '">' . $label . '</label>
        <div class="col-md-4">
            ' . $item->render($params) . $help . '
        </div>
';
        return $html;
    }
}