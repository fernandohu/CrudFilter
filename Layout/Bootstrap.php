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
        $html = $this->panelBegin();

        /**
         * @var Item $item
         */
        foreach ($this->filter->getFields() as $item) {
            $html .= $this->renderItem($item);
        }

        $labelSize = isset($item) ? $item->getConfig()->getLabelSize() : 1;
        $columnSize = isset($item) ? $item->getConfig()->getColumnSize() : 1;

        $html .= $this->panelEnd($labelSize, $columnSize);

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
        $id    = $item->getConfig()->getId();
        $label = $item->getConfig()->getLabel();

        if (empty($id)) {
            throw new IdNotFoundException();
        }

        if (empty($label)) {
            throw new LabelNotFoundException();
        }

        $params = [
            'placeholder' => $item->getConfig()->getPlaceHolder(),
            'class' => 'form-control input-md',
        ];

        $help = '';
        if ($item->getConfig()->getHelp() != '') {
            $help = '
            <span class="help-block">' . $item->getConfig()->getHelp() . '</span>
';
        }

        $labelSize = $item->getConfig()->getLabelSize();
        $columnSize = $item->getConfig()->getColumnSize();

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

    protected function panelBegin()
    {
        $id             = $this->filter->getId();
        $title          = $this->getTitle();
        $legend         = $this->getLegend();
        $minimizeButton = $this->isEnableMinimizeButton();
        $minimizeHint   = $this->getMinimizeHint();
        $formAction     = $this->getFilter()->getForm()->getFormAction();
        $formMethod     = $this->getFilter()->getForm()->getFormMethod();
        $display        = $this->getDisplay();

        $html = '
<div class="panel panel-default" id="' . $id . '" style="display:' . $display . '">
    <div class="panel-heading">
';

        if ($minimizeButton) {
            $minimizeLink = $this->getMinimizeJs(true);
            $html .= '
        <div style="float:right; cursor:pointer;" class="glyphicon glyphicon-resize-small" onclick="' . $minimizeLink . '" title="' . htmlspecialchars($minimizeHint) . '"></div>
';
        }

        $html .= '
        <h3 class="panel-title">' . $title . '</h3>
      </div>
    <div class="panel-body">
        <form class="form-horizontal" method="' . $formMethod . '" action="' . htmlspecialchars($formAction) . '">
            <fieldset>
';

        if ($legend != '') {
            $html .= "
                <legend>$legend</legend>
            ";
        }

        return $html;
    }

    protected function panelEnd($labelSize, $columnSize)
    {
        $submitCaption = $this->getSubmitCaption();

        $html = '

            <div class="form-group">
              <label class="col-md-' . $labelSize . ' control-label" for="singlebutton"></label>
              <div class="col-md-' . $columnSize . '">
                <button id="submitbutton" class="btn btn-primary">' . $submitCaption . '</button>
                <button class="btn btn-danger" type="reset">Reset</button>
              </div>
            </div>

            </fieldset>
        </form>
    </div>
</div>
';
        return $html;
    }
}