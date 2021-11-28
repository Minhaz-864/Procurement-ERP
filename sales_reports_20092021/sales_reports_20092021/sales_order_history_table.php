<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer sales_order_history_table">
        <thead>
            <tr class="headings">
                <th class="column-title">DATE</th>
                <th class="column-title">SALES ORDER#</th>
                <th class="column-title">CUSTOMER NAME</th>
                <th class="column-title">REFERENCE#</th>
                <th class="column-title">EXPECTED SHIPMENT DATE</th>
                <th class="column-title">STATUS</th>
                <th class="column-title text-align-center">AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>

        <tbody>   
            <?php
            if (!empty($sale_order_history_report)) {
                $grand_total_amount = 0;
                foreach ($sale_order_history_report as $sales_orders) {
                    $sale_order_date = !empty($sales_orders->sale_order_date) ? display_date_format($sales_orders->sale_order_date) : '';
                    $shipment_date = !empty($sales_orders->shipment_date) ? display_date_format($sales_orders->shipment_date) : '';
                    $order_status = !empty($sales_orders->status) ? intval($sales_orders->status) : 0;
                    $order_status_string = ($order_status) ? get_array_value_using_key(get_order_status_array(), $order_status) : '';
                    $total_amount = !empty($sales_orders->total_amount) ? doubleval($sales_orders->total_amount) : 0;
                    $grand_total_amount += $total_amount;
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= $sale_order_date; ?></td>
                        <td class=""><?= !empty($sales_orders->sale_order_number) ? get_sale_order_number_with_prefix($sales_orders->sale_order_number) : ''; ?></td>
                        <td class=""><?= !empty($sales_orders->full_contact_name) ? $sales_orders->full_contact_name : ''; ?></td>
                        <td class=""><?= !empty($sales_orders->reference) ? $sales_orders->reference : ''; ?></td>
                        <td class=""><?= $shipment_date; ?></td>
                        <td class=""><?= ucfirst($order_status_string); ?></td>
                        <td class="text-align-right"><?= get_floating_point_number($total_amount); ?></td>
                    </tr>
                <?php }
                ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                </tr>
            <?php }
            ?>

        </tbody>
    </table>
</div>