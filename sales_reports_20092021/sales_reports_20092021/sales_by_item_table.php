<div class="table-responsive width-100">
    <table class="table table-striped jambo_table cursor-pointer sales_by_item_table">
        <thead>
            <tr class="headings">
                <th class="column-title">ITEM NAME</th>
                <th class="column-title">QUANTITY SOLD#</th>
                <th class="column-title text-align-right">AMOUNT<?= get_currency_symbol(true) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($sales_by_item_report)) {
                $grand_total_amount = 0;
                $grand_total_quantity = 0;
                foreach ($sales_by_item_report as $sales_by_item) {
                    $sum_of_quantity = !empty($sales_by_item->sum_of_quantity) ? doubleval($sales_by_item->sum_of_quantity) : 0;
                    $sum_of_selling_price = !empty($sales_by_item->sum_of_selling_price) ? doubleval($sales_by_item->sum_of_selling_price) : 0;
                    $grand_total_quantity += $sum_of_quantity;
                    $grand_total_amount += $sum_of_selling_price;
                    ?>
                    <tr class="clickable-row even pointer" data-id="" data-href="">
                        <td class=""><?= (!empty($sales_by_item->item_name)) ? $sales_by_item->item_name : ''; ?></td>
                        <td class=""><?= $sum_of_quantity; ?></td>
                        <td class="text-align-right"><?= get_floating_point_number($sum_of_selling_price); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td class=""><strong><?= $grand_total_quantity; ?></strong></td>
                    <td class="text-align-right"><strong><?= get_amount_with_currency_symbol($grand_total_amount); ?></strong></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>