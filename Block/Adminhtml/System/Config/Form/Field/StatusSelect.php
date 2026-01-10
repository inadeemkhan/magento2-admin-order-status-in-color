<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;
use Magento\Sales\Model\Order\Config as OrderConfig;

class StatusSelect extends AbstractBlock
{
    /**
     * @var OrderConfig
     */
    protected OrderConfig $orderConfig;

    /**
     * StatusSelect constructor.
     *
     * @param Context $context
     * @param OrderConfig $orderConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        OrderConfig $orderConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->orderConfig = $orderConfig;
    }

    /**
     * Render order status select field
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        $name = $this->getInputName();
        $columnName = $this->getColumnName();

        $html = sprintf(
            '<select name="%s" class="select admin__control-select">',
            $name
        );

        foreach ($this->orderConfig->getStatuses() as $value => $label) {
            $selected = sprintf(
                '<%%- %s == "%s" ? "selected" : "" %%>',
                $columnName,
                $value
            );

            $html .= sprintf(
                '<option value="%s" %s>%s</option>',
                $value,
                $selected,
                $label
            );
        }
        $html .= '</select>';
        return $html;
    }
}