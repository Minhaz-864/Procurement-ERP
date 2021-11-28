<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo link_tag('assets/css/bootstrap.min.css') ?>
    <?php echo link_tag('assets/css/datepicker3.css') ?>
    <?php echo link_tag('assets/css/styles.css') ?>
    <?php echo link_tag('assets/css/font-awesome.min.css') ?>

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>


<body>
    <style>
        #main {
            margin-top: 50px;
            background-color: #000000;
            background-image: linear-gradient(315deg, #000000 0%, #ffffff 74%);

            height: auto;
        }

        #heading1 {
            text-align: right;
            margin-bottom: 20px;
            background-color: #000000;
            background-image: linear-gradient(315deg, green 0%, palevioletred 74%);
        }



        li {
            margin-bottom: 5px;
        }

        #lowerTable {
            margin-top: 250px;
        }
    </style>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-5 " id="main">
        <div class="row">
            <div id="header">

                <h2 id="heading1">Requisition Form</h2>
                <?php
                if (isset($printingDetails)) :
                    $cnt = 1;
                    $totalsexp = 0;
                    foreach ($printingDetails as $row) :
                ?>
                        <ol id="toknow">
                            <li>Requisition#: <?php echo $row->po_num ?></li>

                            <li>Requisition By: <?php echo $row->FullName ?></li>
                            </li>

                            <li>Email: <?php echo $row->Email ?></li>

                            <li>Phone: <?php echo $row->MobileNumber ?></li>

                            <li>Requisition Date: <?php echo $row->req_date ?></li>
                            <br>
                        </ol>
            </div>
            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table table-bordered mg-b-2">
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>Item Name </th>
                                <th>description </th>
                                <th>quantity</th>
                                <th>Item Price</th>
                                <th>estimate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $cnt ?></th>
                                <th><?php echo $row->item_name ?></th>
                                </th>
                                <th><?php echo $row->description ?> </th>
                                <th><?php echo $row->quantity ?></th>
                                <th><?php echo $row->estimate / $row->quantity ?></th>
                                <th><?php echo $ttlsl = $row->estimate ?></th>
                            </tr>
                        <?php
                        $totalsexp += $ttlsl;
                    endforeach;

                        ?>
                        <tr>
                            <th colspan="5" style="text-align:right">Grand Total</th>
                            <td><?php echo $totalsexp ?></td>
                        </tr>
                        </tbody>

                    </table>
                    <table class="table table-borderless" id="lowerTable">
                        <tbody>
                            <tr>
                                <td>Requisition By:</td>
                                <td> </td>
                                <td>Signature:</td>
                                <td> </td>
                                <td>Date:</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Approved By:</td>
                                <td> </td>
                                <td>Signature:</td>
                                <td> </td>
                                <td>Date:</td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


<?php endif; ?>

<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<script type="text/javascript">
    window.print();
</script>
</body>

</html>