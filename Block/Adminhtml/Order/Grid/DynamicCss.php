<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\Order\Grid;

use Magento\Backend\Block\Template;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Exception\LocalizedException;

class DynamicCss extends Template
{
    /**
     * @var Json
     */
    protected Json $jsonSerializer;

    /**
     * DynamicCss constructor.
     *
     * @param Template\Context $context
     * @param Json $jsonSerializer
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Json $jsonSerializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsonSerializer = $jsonSerializer;
    }

    /**
     * Get order status color configuration
     *
     * @return array
     */
    public function getStatusColors(): array
    {
        $value = (string)$this->_scopeConfig->getValue(
            'order_status_color/status_colors/colors'
        );

        if ($value === '') {
            return [];
        }

        try {
            return (array)$this->jsonSerializer->unserialize($value);
        } catch (LocalizedException $e) {
            return [];
        }
    }

    /**
     * Check whether module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->_scopeConfig->isSetFlag(
            'order_status_color/general/enabled'
        );
    }
}