<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\Data\Form\Element\AbstractElement;
use DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field\StatusSelect;
use DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field\ColorPicker;

class StatusColors extends AbstractFieldArray
{
    /**
     * @var StatusSelect|null
     */
    protected ?StatusSelect $statusRenderer = null;

    /**
     * @var ColorPicker|null
     */
    protected ?ColorPicker $colorRenderer = null;

    /**
     * Prepare dynamic rows
     *
     * @return void
     */
    protected function _prepareToRender(): void
    {
        $this->addColumn(
            'status',
            [
                'label'    => __('Order Status'),
                'renderer' => $this->getStatusRenderer(),
            ]
        );

        $this->addColumn(
            'bg_color',
            [
                'label'    => __('Background Color'),
                'renderer' => $this->getColorRenderer(),
            ]
        );

        $this->addColumn(
            'text_color',
            [
                'label'    => __('Text Color'),
                'renderer' => $this->getColorRenderer(),
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Status Color');
    }

    /**
     * Get order status dropdown renderer
     *
     * @return StatusSelect
     */
    protected function getStatusRenderer(): StatusSelect
    {
        if ($this->statusRenderer === null) {
            $this->statusRenderer = $this->getLayout()->createBlock(
                StatusSelect::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->statusRenderer;
    }

    /**
     * Get color picker renderer
     *
     * @return ColorPicker
     */
    protected function getColorRenderer(): ColorPicker
    {
        if ($this->colorRenderer === null) {
            $this->colorRenderer = $this->getLayout()->createBlock(
                ColorPicker::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->colorRenderer;
    }

    /**
     * Append JS for color picker initialization
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $html = parent::_getElementHtml($element);

        $html .= <<<HTML
                <script type="text/javascript">
                require([
                    "jquery",
                    "jquery/colorpicker/js/colorpicker",
                    "domReady!"
                ], function ($) {
                    "use strict";

                    $("body").on("focus", ".colorpicker-input", function () {
                        var \$el = $(this);

                        if (!\$el.hasClass("cp-initialized")) {
                            \$el.ColorPicker({
                                onChange: function (hsb, hex) {
                                    \$el.val("#" + hex).trigger("change");
                                },
                                onBeforeShow: function () {
                                    $(this).ColorPickerSetColor(this.value);
                                }
                            }).addClass("cp-initialized");
                        }
                    });
                });
                </script>
                HTML;

        return $html;
    }
}