<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problem Statements</title>
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
                <li class="active">Problem Statements</li>
            </ol>
        </div>
        <!--/.row-->




        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">
                    <div class="panel-heading">Problem Statements</div>
                    <div class="panel-body">

                        <?php if ($this->session->flashdata('success')) { ?>
                            <p style="color:green"><?php echo $this->session->flashdata('success'); ?></p>
                        <?php } ?>
                        <div class="col-md-12">

                            <div class="table-responsive">
                            <?php echo form_open('probstate/manage',['name' => 'manageproblem'])?>
                                <?php echo form_submit(['name' => 'pending', 'id' => 'pending', 'class' => 'btn btn-primary', 'value' => 'pending']) ?>
                                <?php echo form_submit(['name' => 'solved', 'id' => 'solved', 'class' => 'btn btn-primary', 'value' => 'solved']) ?>                                
                                <?php echo form_close(); ?>
                                <table class="table table-bordered mg-b-0">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>User Name</th>
                                            <th>Room</th>
                                            <th>PC Number</th>
                                            <th>Problem</th>
                                            <th>Acknowledge Date</th>
                                            <th>Solved</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (count($problemdetails)) :
                                        $cnt = 1;
                                        foreach ($problemdetails as $row) :
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->FullName; ?></td>
                                                    <td><?php echo $row->room; ?></td>
                                                    <td><?php echo $row->pc_num; ?></td>
                                                    <td><?php echo $row->problem; ?></td>
                                                    <td><?php echo $row->prob_date; ?></td>
                                                <td>
                                                    <?php 
                                                        echo form_open('probstate/update',['name' => 'manageproblem']);
                                                         echo form_hidden('ID',$row->ID);
                                                         echo form_submit(['name' => 'Submit', 'id' => 'Submit', 'class' => 'btn btn-success', 'value' => 'Solved']) ;
                                                         echo form_close();
                                                    ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            $cnt = $cnt + 1;
                                        endforeach;
                                        else :
                                         ?>
                                                    <tr>
                                                        <td colspan="5" style="color:red; text-align:center">No Record found</td>
                                                    </tr>
                                                <?php endif; ?>

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
    <!--/.main-->

    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/easypiechart-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

</body>

</html>