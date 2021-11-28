<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer sales_by_contact_table">
        <thead>
            <tr class="headings">
                <th class="column-title">CUSTOMER NAME</th>
                <th class="column-title">INVOICE COUNT#</th>
                <th class="column-title text-align-right">TOTAL AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($sales_by_contact_report)) {
                $grand_total_order_count = 0;
                $grand_total_amount = 0;
                foreach ($sales_by_contact_report as $sales_by_contact) {
                    $sales_order_count = !empty($sales_by_contact->sales_order_count) ? intval($sales_by_contact->sales_order_count) : 0;
                    $sum_of_total_amount = !empty($sales_by_contact->sum_of_total_amount) ? doubleval($sales_by_contact->sum_of_total_amount) : 0;
                    $grand_total_order_count += $sales_order_count;
                    $grand_total_amount += $sum_of_total_amount;
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= !empty($sales_by_contact->full_contact_name) ? $sales_by_contact->full_contact_name : '' ?></td>
                        <td class=""><?= $sales_order_count; ?></td>
                        <td class="text-align-right"><?= get_floating_point_number($sum_of_total_amount); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td class=""><strong><?= $grand_total_order_count; ?></strong></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>