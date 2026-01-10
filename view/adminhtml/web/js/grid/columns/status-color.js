define([
    'Magento_Ui/js/grid/columns/select'
], function (Column) {
    'use strict';
    return Column.extend({
        defaults: {
            bodyTmpl: 'DevScripts_OrderStatusColor/ui/grid/cells/status'
        },
        getStatusClass: function (row) {
            return 'status-' + row.status.toLowerCase();
        }
    });
});