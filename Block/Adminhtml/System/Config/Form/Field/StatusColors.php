<?php
namespace DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class StatusColors extends AbstractFieldArray {
    protected $_statusRenderer;
    protected $_colorRenderer;

    protected function _prepareToRender() {
        $this->addColumn('status', ['label' => __('Order Status'), 'renderer' => $this->getStatusRenderer()]);
        $this->addColumn('bg_color', ['label' => __('Background Color'), 'renderer' => $this->getColorRenderer()]);
        $this->addColumn('text_color', ['label' => __('Text Color'), 'renderer' => $this->getColorRenderer()]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Status Color');
    }

    protected function getStatusRenderer() {
        if (!$this->_statusRenderer) {
            $this->_statusRenderer = $this->getLayout()->createBlock(
                \DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field\StatusSelect::class,
                '', ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->_statusRenderer;
    }

    protected function getColorRenderer() {
        if (!$this->_colorRenderer) {
            $this->_colorRenderer = $this->getLayout()->createBlock(
                \DevScripts\OrderStatusColor\Block\Adminhtml\System\Config\Form\Field\ColorPicker::class,
                '', ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->_colorRenderer;
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
        $html = parent::_getElementHtml($element);
        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/colorpicker/js/colorpicker", "domReady!"], function ($) {
                $("body").on("focus", ".colorpicker-input", function() {
                    var $el = $(this);
                    if (!$el.hasClass("cp-initialized")) {
                        $el.ColorPicker({
                            onChange: function (hsb, hex, rgb) { $el.val("#" + hex).trigger("change"); },
                            onBeforeShow: function () { $(this).ColorPickerSetColor(this.value); }
                        }).addClass("cp-initialized");
                    }
                });
            });
        </script>';
        return $html;
    }
}