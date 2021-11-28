<div class="col-xs-12 col-sm-12 col-md-12"> 
    <div class="col-xs-12 col-sm-12 col-md-8">
        <h4><strong><?= !empty($page_title) ? $page_title : '' ?></strong></h4>
    </div>    
    <div class="col-xs-12 col-sm-12 col-md-4">
        <h4>
            <a style="margin-right: 15px;" href="<?= base_url($this->admin . 'sales_orders'); ?>" data-id="0" class="cross-button pull-right cross-text cursor-pointer" data-toggle="tooltip" data-placement="bottom" title="Back" data-original-title="Back">&#10006;</a>
        </h4>
    </div>
</div>
<div class="row" style="padding-left: 10px;">      
    <?= !empty($date_search_filter) ? $date_search_filter : ''; ?>
    <?= !empty($order_status_filter) ? $order_status_filter : ''; ?>
    <?= !empty($contact_filter) ? $contact_filter : ''; ?>
    <?= !empty($show_report_button) ? $show_report_button : ''; ?>
</div>
<div class="col-xs-12 report_header_div">
    <?= !empty($report_header) ? $report_header : ''; ?>
</div>
<div class="col-xs-12 margin-bottom-10 sale_report_table_div">
    <?= !empty($report_table) ? $report_table : ''; ?>
</div>
<?php
echo !empty($content) ? $content : '';
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.selectpicker').selectpicker('refresh');

        var thisUrl = $(location).attr('href');

        $('.report-show-button').click(function () {
            var startDate = $('#filter_start_date').val();
            var endDate = $('#filter_end_date').val();
            var dateRangeText = $('#date_range_text').val();
            var status = $('#status').val();
            var contactId = $('#contact_id').val();
            if (startDate != '' && endDate != '' && status != '') {
                $.ajax({
                    type: "POST",
                    url: thisUrl,
                    data: {'start_date': startDate, 'end_date': endDate, 'status': status, 'contact_id': contactId, 'date_range_text': dateRangeText},
                    success: function (data) {
                        $('.report_header_div').html(data['reportHeaderHtml']);
                        $('.sale_report_table_div').html(data['reportTableHtml']);
                    },
                    error: function () {

                    }
                });
            } else {
                alert("Please Check input fields");
                return false;
            }


        });
    });
</script>