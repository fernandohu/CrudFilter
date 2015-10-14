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
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"># Filtros #</h3>
      </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <fieldset>
';

        if ($legend != '') {
            $html .= "
                <legend>$legend</legend>
            ";
        }

        /**
         * @var Item $item
         */
        foreach ($this->filter->getItems() as $item) {
            $html .= $this->renderItem($item);
        }

        $labelSize = $item->config->getLabelSize();
        $columnSize = $item->config->getColumnSize();

        $html .= '

            <div class="form-group">
              <label class="col-md-' . $labelSize . ' control-label" for="singlebutton"></label>
              <div class="col-md-' . $columnSize . '">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary"># Submit #</button>
              </div>
            </div>

            </fieldset>
        </form>
    </div>
</div>
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
            'placeholder' => $item->config->getPlaceHolder(),
            'class' => 'form-control input-md',
        ];

        $help = '';
        if ($item->config->getHelp() != '') {
            $help = '
            <span class="help-block">' . $item->config->getHelp() . '</span>
';
        }

        $labelSize = $item->config->getLabelSize();
        $columnSize = $item->config->getColumnSize();

        $html = '
                    <div class="form-group">
                        <label class="col-md-' . $labelSize . ' control-label" for="' . $id . '">' . $label . '</label>
                        <div class="col-md-' . $columnSize . '">
                            ' . $item->render($params) . $help . '
                        </div>
                    </div>
';
        return $html;
    }
}