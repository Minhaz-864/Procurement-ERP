<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Portal || Add Problem Statement</title>
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
                <li class="active">Problem Statement</li>
            </ol>
        </div>
        <!--/.row-->




        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">
                    <div class="panel-heading">Problem Statement</div>

                    <!--success message -->
                    <?php if ($this->session->flashdata('success')) { ?>
                        <p style="color:green">
                            <?php
                            echo $this->session->flashdata('success');

                            ?>
                        </p>
                    <?php } ?>

                    <!--error message -->
                    <?php if ($this->session->flashdata('error')) { ?>
                        <p style="color:red"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>

                    <div class="panel-body">

                        <div class="col-md-12">

                            <?php echo form_open('probstate/add', ['name' => 'addproblem']); ?>

                            <?php  //echo $this->session->userdata('fname'); 
                            //echo $currentDate = date("Y/m/d");
                            //print_r($this->session->all_userdata());
                            //echo $this->session->userdata('role'); 
                            
                            ?>
                            <div class="form-group">
                                <label>User Name</label>
                                <?php echo form_input(['name' => 'uname', 'id' => 'uname', 'class' => 'form-control', 'placeholder' => $this->session->userdata('fname'), 'disabled' => 'disabled', 'value' => set_value($this->session->userdata('fname'))]); ?>
                                <?php echo form_error('uname', '<div style="color:red">', '<div>'); ?>

                            </div>
                            <div class="form-group">
                                <label style="color:#000">Room</label>
                                <?php 
                                $options = array("--"=>'Select',107 => "107", 108 => "108", 109 => "109", 303 => "303", 304 => "304", 403 => "403", 405 => "405");
                                echo form_dropDown('room', $options, '', array('value' => set_value('room')));
                                ?>

                            </div>
                            <div class="form-group">
                                <label style="color:#000">PC Number</label>
                                <?php echo form_input(['name' => 'pc_num', 'id' => 'pc_num', 'class' => 'form-control', 'value' => set_value('pc_num')]) ?>
                                <?php echo form_error('pc_num', '<div style="color:red">', '<div>') ?>

                            </div>
                            <div class="form-group">
                                <label style="color:#000">Problem Statement</label>
                                <?php echo form_input(['name' => 'statement', 'id' => 'statement', 'class' => 'form-control', 'value' => set_value('statement')]) ?>
                                <?php echo form_error('statement', '<div style="color:red">', '<div>') ?>

                            </div>
                            <div class="form-group">
                                <label>Date of Acknowledgement</label>
                                <?php echo form_input(['name' => 'probdate', 'id' => 'probdate', 'class' => 'form-control', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => date("y-m-d"), 'value' => date("y-m-d")]); ?>
                                <?php echo form_error('probdate', '<div style="color:red">', '<div>'); ?>

                            </div>
              

                            <div class="form-group has-success">

                                <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add']) ?>

                            </div>


                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
        <?php include APPPATH . 'views/includes/footer.php'; ?>
    </div><!-- /.row -->
    <!--/.main-->

    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
            $("#probdate").datepicker();
            autoclose: true;
        });
    </script>

</body>

</html>