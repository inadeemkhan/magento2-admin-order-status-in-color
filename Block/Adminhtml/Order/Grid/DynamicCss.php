<?php
namespace DevScripts\OrderStatusColor\Block\Adminhtml\Order\Grid;

use Magento\Backend\Block\Template;
use Magento\Framework\Serialize\Serializer\Json;

class DynamicCss extends Template
{
    protected $jsonSerializer;

    public function __construct(
        Template\Context $context,
        Json $jsonSerializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsonSerializer = $jsonSerializer;
    }

    public function getStatusColors()
    {
        $val = $this->_scopeConfig->getValue('order_status_color/status_colors/colors');
        if ($val) {
            try {
                return $this->jsonSerializer->unserialize($val);
            } catch (\Exception $e) {
                return [];
            }
        }
        return [];
    }

    public function isEnabled()
    {
        return $this->_scopeConfig->isSetFlag('order_status_color/general/enabled');
    }
}