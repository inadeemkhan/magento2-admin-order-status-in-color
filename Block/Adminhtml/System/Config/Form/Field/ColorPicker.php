<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\View\Element\AbstractBlock;

class ColorPicker extends AbstractBlock
{
    /**
     * Render color picker input HTML
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        return sprintf(
            '<input type="text" name="%s" value="<%%- %s %%>" ' .
            'class="input-text admin__control-text colorpicker-input" style="width:100px;" />',
            $this->getInputName(),
            $this->getColumnName()
        );
    }
}