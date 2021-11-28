<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Requisition Management Portal </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <?php echo link_tag('assets/css/bootstrap.min.css') ?>
    <?php echo link_tag('assets/css/datepicker3.css') ?>
    <?php echo link_tag('assets/css/styles.css') ?>
    <?php echo link_tag('assets/css/font-awesome.min.css') ?>
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>
    <?php include APPPATH . 'views/includes/sidebar.php'; ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Requisition</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">
                    <div class="panel-heading">Requisition</div>
                    <div class="panel-body">
                        <!--success message -->
                        <!-- <?php if ($this->session->flashdata('success')) { ?>
<p style="color:green"><?php echo $this->session->flashdata('success'); ?></p>	
<?php } ?> -->
                        <div class="col-md-12">
                        
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>User ID</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Date</th>
                                            <th>PO_Num</th>
                                            <th>Status</th>
                                            <th>Report Print</th>
                                            <th>Upload</th>

                                        </tr>
                                    </thead>
                                    <?php


                                        if (isset($details)):
                                            $cnt = 1;
                                            foreach ($details as $row) :
                                    ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row->user_id; ?></td>
                                                        <td><?php echo $row->item_name; ?></td>
                                                        <td><?php echo $row->description; ?></td>
                                                        <td><?php echo $row->quantity; ?></td>
                                                        <td><?php echo $row->req_date ?></td>
                                                        <td><?php echo $row->po_num;?></td>
                                                        <td>
                                                            <?php echo form_open_multipart('cpurequ/update', ['name' => 'updaterequisition'], ['poid' => $row->po_num]);
                                                            
                                                            $options = array("Submitted" => "Submitted", "Pending" => "Pending", "Accepted" => "Accepted", "Declined" => "Declined");
                                                            echo form_dropDown('statusUpdate', $options, $row->req_status, array('value' => set_value('statusUpdate')));
                                                            
                                                                ?>
                                                        </td>

                                                        <?php 
                                                        
                                                        $concat = $row->po_num . "%20" .$row->req_status;?>
                                                        <td style="text-align:center" ><i class="fa fa-file-pdf-o" ></i><?php echo anchor("cpurequ/printing/$concat",'<strong>  Print</strong>'); ?></td>
                                                        <?php 
                                                            if(isset( $printingFile)):
                                                                ?>
                                                            <div onload="window.print()">
                                                            <embed src="assets/Uploads/<?{$printingFile;}?>" type="application/pdf" >
                                                            </div>

                                                        <?php
                                                            endif;
                                                        ?>
                                                        <td>

                                                            <div class="form-group">

                                                                <input type="file" name="fileUpload" class="form-control-file" id="fileUpload">
                                                                <?php echo form_submit(['name' => 'Submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Upload']) ?>
                                                                
                                                            </div>


                                                        </td>
                                                        <?php echo form_close(); ?>



                                                    </tr>
                                                <?php
                                                $cnt = $cnt + 1;
                                            endforeach;
                                        else :
                                                ?>
                                                <tr>
                                                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                                                </tr>
                                            <?php endif;?>

                                        
                                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
            </div><!-- /.col-->
            <?php include APPPATH . 'views/includes/footer.php'; ?>
        </div><!-- /.row -->
    </div>
    <!--main-->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

</body>