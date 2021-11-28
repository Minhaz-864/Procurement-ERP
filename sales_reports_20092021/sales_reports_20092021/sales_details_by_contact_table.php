<?php
//get_print_r($sales_by_contact_report);
?>
<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer sales_details_by_contact_table">
        <thead>
            <tr class="headings">
                <th class="column-title">DATE</th>
                <th class="column-title">INVOICE#</th>
                <th class="column-title text-align-right">AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($sales_by_contact_report)) {
                $grand_total_amount = 0;
                foreach ($sales_by_contact_report as $sales_by_contact) {
                    $sale_order_date = !empty($sales_by_contact->sale_order_date) ? display_date_format($sales_by_contact->sale_order_date) : '';
                    $total_amount = !empty($sales_by_contact->total_amount) ? doubleval($sales_by_contact->total_amount) : 0;
                    $grand_total_amount += $total_amount;
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= $sale_order_date; ?></td>
                        <td class=""><?= !empty($sales_by_contact->sale_order_number) ? get_sale_order_number_with_prefix($sales_by_contact->sale_order_number) : '' ?></td>
                        <td class="text-align-right"><?= get_floating_point_number($total_amount); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td class="text-align-right"><strong><?= ''; ?></strong></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>