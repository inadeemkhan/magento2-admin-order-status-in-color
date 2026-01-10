<?php
namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

class ColorPicker extends \Magento\Framework\View\Element\AbstractBlock {
    protected function _toHtml() {
        return '<input type="text" name="' . $this->getInputName() . '" ' .
               'value="<%- ' . $this->getColumnName() . ' %>" ' .
               'class="input-text admin__control-text colorpicker-input" style="width:100px;"/>';
    }
}