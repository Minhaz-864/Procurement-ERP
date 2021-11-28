<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer payment_due_table">
        <thead>
            <tr class="headings">
                <th class="column-title">PAYMENT DUE#</th>
                <th class="column-title">ORDER DATE</th>
                <th class="column-title">CUSTOMER NAME</th>
                <th class="column-title">INVOICE#</th>
                <th class="column-title text-align-center">TOTAL AMOUNT<?= get_currency_symbol(true) ?></th>
                <th class="column-title text-align-center">DUE AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($payment_due_report)) {
                $grand_total_amount = 0;
                $grand_total_due_amount = 0;
                $count = 1;
                foreach ($payment_due_report as $payment_due) {
                    $sale_order_date = !empty($payment_due->sale_order_date) ? display_date_format($payment_due->sale_order_date) : '';
                    $total_amount = !empty($payment_due->total_amount) ? doubleval($payment_due->total_amount) : 0;
                    $due_amount = !empty($payment_due->due_amount) ? doubleval($payment_due->due_amount) : 0;
                    $grand_total_amount += $total_amount;
                    $grand_total_due_amount += $due_amount;
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= $count++; ?></td>
                        <td class=""><?= $sale_order_date; ?></td>
                        <td class=""><?= !empty($payment_due->full_contact_name) ? $payment_due->full_contact_name : '' ?></td>
                        <td class=""><?= !empty($payment_due->sale_order_number) ? get_sale_order_number_with_prefix($payment_due->sale_order_number) : '' ?></td>
                        <td class="text-align-right"><?= get_floating_point_number(doubleval($total_amount)); ?></td>
                        <td class="text-align-right"><?= get_floating_point_number(doubleval($due_amount)); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_due_amount); ?></strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>