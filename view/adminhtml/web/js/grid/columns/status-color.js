define([
    'Magento_Ui/js/grid/columns/select'
], function (Column) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'DevScripts_OrderStatusColor/ui/grid/cells/status',
            // Global map injected via DynamicCss block
            colorMap: window.orderStatusColorMap || {}
        },

        /**
         * Get the CSS class for the status badge
         *
         * @param {Object} row
         * @returns {String}
         */
        getStatusClass: function (row) {
            // Check order status first, then invoice/memo state, then shipment status
            var status = row.status || row.state || row.order_status || '';
            return 'status-' + status.toString().toLowerCase();
        },

        /**
         * Get the display label for the status badge
         *
         * @param {Object} row
         * @returns {String}
         */
        getCustomLabel: function (row) {
            var status = (row.status || row.state || row.order_status || '').toString().toLowerCase();

            // Use custom label if defined in admin config
            if (this.colorMap[status] && this.colorMap[status].custom_label) {
                return this.colorMap[status].custom_label;
            }

            return this.getLabel(row);
        }
    });
});