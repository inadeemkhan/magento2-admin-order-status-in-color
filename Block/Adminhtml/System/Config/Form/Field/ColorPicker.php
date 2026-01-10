<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\View\Element\AbstractBlock;

/**
 * Class ColorPicker
 *
 * Renders a color picker input for system configuration grid
 */
class ColorPicker extends AbstractBlock
{
    /**
     * Render HTML for color picker input
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        $columnName = $this->getColumnName();
        $inputName  = $this->getInputName();

        // Underscore.js safe value binding to prevent "undefined" errors
        $valueBinding = '<%- typeof ' . $columnName . ' !== \'undefined\' ? ' . $columnName . ' : \'\' %>';

        return sprintf(
            '<input type="text" name="%s" value="%s" class="input-text admin__control-text colorpicker-input" style="width:100px;"/>',
            $inputName,
            $valueBinding
        );
    }
}