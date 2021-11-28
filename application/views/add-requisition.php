<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Btrac Report Portal || Add PO</title>
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
		<!--/.row-->




		<div class="row">
			<div class="col-lg-12">



				<div class="panel panel-default">
					<div class="panel-heading">Requisition</div>

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

							<?php echo form_open('requisition/add', ['name' => 'addrequisition']); ?>

							<?php  //echo $this->session->userdata('fname'); 
									//echo $currentDate = date("Y/m/d");
									//print_r($this->session->all_userdata());
									//echo $this->session->userdata('role');?>
							<div class="form-group">
								<label>User Name</label>
								<?php echo form_input(['name' => 'uname', 'id' => 'uname', 'class' => 'form-control', 'placeholder' =>$this->session->userdata('fname'), 'disabled'=>'disabled', 'value' => set_value($this->session->userdata('fname'))]); ?>
								<?php echo form_error('uname', '<div style="color:red">', '<div>'); ?>

							</div>
							<div class="form-group">
								<label style="color:#000">Item Name</label>
								<?php echo form_input(['name' => 'itemName', 'id' => 'itemName', 'class' => 'form-control', 'value' => set_value('itemName')]) ?>
								<?php echo form_error('itemName', '<div style="color:red">', '<div>') ?>

							</div>
							<div class="form-group">
								<label style="color:#000">Item Description</label>
								<?php echo form_input(['name' => 'itemDes', 'id' => 'itemDes', 'class' => 'form-control', 'value' => set_value('itemDes')]) ?>
								<?php echo form_error('itemDes', '<div style="color:red">', '<div>') ?>

							</div>
							<div class="form-group">
								<label style="color:#000">Quantity </label>
								<?php echo form_input(['name' => 'quan', 'id' => 'quan', 'class' => 'form-control', 'value' => set_value('quan')]) ?>
								<?php echo form_error('quan', '<div style="color:red">', '<div>') ?>

							</div>
							<div class="form-group">
								<label style="color:#000">Estimated Price </label>
								<?php echo form_input(['name' => 'estimate', 'id' => 'estimate', 'class' => 'form-control', 'value' => set_value('estimate')]) ?>
								<?php echo form_error('estimate', '<div style="color:red">', '<div>') ?>

							</div>


							<div class="form-group">
								<label>Date of Requisition</label>
								<?php echo form_input(['name' => 'requdate', 'id' => 'requdate', 'class' => 'form-control', 'data-date-format' => 'yyyy-mm-dd', 'value' => set_value('requdate')]); ?>
								<?php echo form_error('requdate', '<div style="color:red">', '<div>'); ?>

							</div>
							<div class="form-group">
								<label style="color:#000">PO Number</label>
								<?php echo form_input(['name' => 'po_num', 'id' => 'po_num', 'class' => 'form-control', 'value' => set_value('po_num')]) ?>
								<?php echo form_error('po_num', '<div style="color:red">', '<div>') ?>

							</div>

							<div class="form-group">
								<label style="color:#000">Requisition Status</label> </label>
								<?php echo form_input(['name' => 'status', 'id' => 'status', 'class' => 'form-control', 'disabled'=>'disabled', 'placeholder' => 'Submitted', 'value' => set_value(0)]) ?>
								<?php echo form_error('status', '<div style="color:red">', '<div>') ?>
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
			$("#requdate").datepicker();
			autoclose: true;
		});
	</script>

</body>

</html>