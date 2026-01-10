<?php
namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

class StatusSelect extends \Magento\Framework\View\Element\AbstractBlock {
    protected $_orderConfig;
    public function __construct(\Magento\Framework\View\Element\Context $context, \Magento\Sales\Model\Order\Config $orderConfig, array $data = []) {
        parent::__construct($context, $data);
        $this->_orderConfig = $orderConfig;
    }
    protected function _toHtml() {
        $name = $this->getInputName();
        $columnName = $this->getColumnName();
        $html = '<select name="' . $name . '" class="select admin__control-select">';
        foreach ($this->_orderConfig->getStatuses() as $value => $label) {
            $selected = '<%- ' . $columnName . ' == "' . $value . '" ? "selected" : "" %>';
            $html .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
        $html .= '</select>';
        return $html;
    }
}