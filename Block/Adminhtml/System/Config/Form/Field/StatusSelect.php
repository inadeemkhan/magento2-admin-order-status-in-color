<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Sales\Model\Order\Config as OrderConfig;
use Magento\Sales\Model\Order\Invoice;

/**
 * Class StatusSelect
 *
 * Renders a select input for order statuses and invoice/shipment states
 */
class StatusSelect extends AbstractBlock
{
    protected OrderConfig $_orderConfig;
    protected Invoice $_invoice;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param OrderConfig $orderConfig
     * @param Invoice $invoice
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        OrderConfig $orderConfig,
        Invoice $invoice,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_orderConfig = $orderConfig;
        $this->_invoice = $invoice;
    }

    /**
     * Render the HTML select with both order statuses and invoice states
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        $name       = $this->getInputName();
        $columnName = $this->getColumnName();

        $html = '<select name="' . $name . '" class="select admin__control-select">';

        // Order Statuses
        $html .= '<optgroup label="Order Statuses">';
        foreach ($this->_orderConfig->getStatuses() as $value => $label) {
            $selected = '<%- typeof ' . $columnName . ' !== "undefined" && ' . $columnName
                        . ' == "' . $value . '" ? "selected" : "" %>';
            $html .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
        $html .= '</optgroup>';

        // Invoice / Shipment States
        $html .= '<optgroup label="Invoice/Shipment States">';
        foreach ($this->_invoice->getStates() as $value => $label) {
            $selected = '<%- typeof ' . $columnName . ' !== "undefined" && ' . $columnName
                        . ' == "' . $value . '" ? "selected" : "" %>';
            $html .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
        $html .= '</optgroup>';

        $html .= '</select>';

        return $html;
    }
}