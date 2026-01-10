define([
    'Magento_Ui/js/grid/columns/select'
], function (Column) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'DevScripts_OrderStatusColor/ui/grid/cells/status'
        },

        /**
         * Get CSS class for order status
         *
         * @param {Object} row
         * @returns {String}
         */
        getStatusClass: function (row) {
            if (!row || !row.status) {
                return '';
            }

            return 'status-' + String(row.status).toLowerCase();
        }
    });
});