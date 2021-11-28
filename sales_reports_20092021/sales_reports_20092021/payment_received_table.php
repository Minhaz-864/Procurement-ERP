<style>
    .payment_received_table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        padding: 6px;
    }
</style>
<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer payment_received_table">
        <thead>
            <tr class="headings">
                <th class="column-title">PAYMENT#</th>
                <th class="column-title">DATE</th>
                <th class="column-title">REFERENCE#</th>
                <th class="column-title">CUSTOMER NAME</th>
                <th class="column-title">PAYMENT METHOD</th>
                <th class="column-title">NOTES</th>
                <th class="column-title">INVOICE#</th>
                <th class="column-title text-align-center">AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sales_orders_obj = new Sales_orders_Model();
            if (!empty($payment_received_report)) {
                $grand_total_amount = 0;
                $count = 1;
                foreach ($payment_received_report as $payment_received) {
                    $payment_date = !empty($payment_received->payment_date) ? display_date_format($payment_received->payment_date) : '';
                    $payment_mode_string = !empty($payment_received->payment_mode) ? get_array_value_using_key(get_payment_mode_array(), intval($payment_received->payment_mode)) : '';
                    $sales_order_json = $payment_received->sales_order_json;
                    $sales_order_json = is_json($sales_order_json);
                    if ($sales_order_json) {
                        $sales_order_json = json_decode($payment_received->sales_order_json);
                        $sales_orders_id = intval($sales_order_json->sales_orders_id);
                        $amount = doubleval($sales_order_json->amount);
                    } else {
                        $sales_orders_id = 0;
                        $amount = 0;
                    }
                    $grand_total_amount += $amount;
                    $sales_order = $sales_orders_obj->get_by_id($sales_orders_id);
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= $count++; ?></td>
                        <td class=""><?= $payment_date; ?></td>
                        <td class=""><?= !empty($payment_received->reference) ? $payment_received->reference : '' ?></td>
                        <td class=""><?= !empty($payment_received->full_contact_name) ? $payment_received->full_contact_name : '' ?></td>
                        <td class=""><?= ucfirst($payment_mode_string); ?></td>
                        <td class=""><?= !empty($payment_received->notes) ? $payment_received->notes : '' ?></td>
                        <td class=""><?= !empty($sales_order->sale_order_number) ? get_sale_order_number_with_prefix($sales_order->sale_order_number) : '' ?></td>
                        <td class="text-align-right"><?= get_floating_point_number(doubleval($amount)); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>