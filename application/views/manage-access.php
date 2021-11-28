<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Access Management Portal </title>
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
                <li class="active">Access Management</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">
                    <div class="panel-heading">Access Management</div>
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
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Role</th>
                                            <th>Reg Date</th>
                                            <th>Approval</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <?php


                                    if (isset($userdetails)) :
                                        $cnt = 1;
                                        foreach ($userdetails as $row) :
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->FullName; ?></td>
                                                    <td><?php echo $row->Email; ?></td>
                                                    <td><?php echo $row->MobileNumber; ?></td>
                                                    <td style="text-align:center"><?php
                                                        echo form_open('accReq/update', ['name' => 'updateinfo'], ['uname' => $row->FullName]);

                                                        $options = array('None'=>'Select',"admin" => "Admin", "teacher" => "Teacher", "finance" => "Finance", "student" => "Student", "emplpoyee" => "Employee");
                                                        echo form_dropDown('infoUpdate', $options, '', array('value' => set_value('infoUpdate')));

                                                        ?></td>
                                                    <td><?php echo $row->RegDate ?></td>
                                                    <td style="text-align:center"><?php
                                                        $optionsApprove = array('0'=>'Select', 1 => "Approve", 0 => "Decline");
                                                        echo form_dropDown('approve', $optionsApprove, '', array('value' => set_value('approve')));
                                                         ?></td>

                                                    <td>
                                                        <?php echo form_submit(['name' => 'Submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Update']) ?>
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