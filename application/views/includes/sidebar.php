<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <?php
            $fname = $this->session->userdata('fname');
            ?>

            <div class="profile-usertitle-name"><?php echo $fname; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">

        <?php if ($this->session->userdata('role')=='admin') : ?>


            <li class="active"><a href="<?php echo site_url('Dashboard'); ?>"><em class="fa fa-pie-chart">&nbsp;</em> Dashboard</a></li>



            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="fa fa-money" href="<?php echo site_url('Expenses/add'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Add PO Expenses
                        </a></li>
                    <li><a class="fa fa-credit-card" href="<?php echo site_url('Expenses/manage'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Manage PO Expence
                        </a></li>

                </ul>

            </li>



            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                    <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="<?php echo site_url('Reports/datewiserport'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Day Wise Report
                        </a></li>
                    <li><a class="" href="<?php echo site_url('Reports/monthwiserport'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Month Wise Report
                        </a></li>
                    <li><a class="" href="<?php echo site_url('Reports/yearwiserport'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Year Wise Report
                        </a></li>

                </ul>
            </li>

            <!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-navicon">&nbsp;</em>Requisition <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="<?php echo site_url('requisition/add'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Requisition
                    </a></li>
                    <li><a class="" href="<?php echo site_url('requisition/manage'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Requisition
                    </a></li>
                    
                </ul>

            </li> -->


            <li class="active"><a href="<?php echo site_url('cpurequ/manage'); ?>"><em class="fa fa-superpowers">&nbsp;</em>CPU Requisition Manage </a></li>
            <li class="" color= "#5F9EA0"><a href="<?php echo site_url('accReq/manage'); ?>"><em class="fa fa-spinner">&nbsp;</em>Access Requests Manage</a></li>
            <li class="active"><a href="<?php echo site_url('probstate/manage'); ?>"><em class="fa fa-wpexplorer">&nbsp;</em>Problem Statements</a></li>
<!--THIS SECTION IS ACCESSIBLE FOR THE TEACHER AND THE STUDENTS. WHERE THEY CAN PUT IN A REQUISITION AND PROBLEM STATEMENT -->
        <?php elseif ($this->session->userdata('role')=='teacher' || $this->session->userdata('role')=='student') : ?>

            <li class="parent active"><a data-toggle="collapse" href="#sub-item-3">
                    <em class="fa fa-navicon">&nbsp;</em>Requisition <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="<?php echo site_url('requisition/add'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Add Requisition
                        </a></li>
                    <li><a class="" href="<?php echo site_url('requisition/manage'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Manage Requisition
                        </a></li>

                </ul>

            </li>
            <li class=""><a href="<?php echo site_url('probstate/add'); ?>"><em class="fa fa-wpexplorer">&nbsp;</em>Problem Statements</a></li>
<!-- THIS PART IS ONLY ACCESSIBLE BY FINANCE ADMIN, COST ISSUES ARE HANDLED HERE. MANAGING COST AND ADDING COSTS-->
        <?php elseif ($this->session->userdata('role')=='finance'):?>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="fa fa-money" href="<?php echo site_url('Expenses/add'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Add PO Expenses
                        </a></li>
                    <li><a class="fa fa-credit-card" href="<?php echo site_url('Expenses/manage'); ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Manage PO Expence
                        </a></li>

                </ul>

            </li>
        <?php endif; ?>

        <li><a href="<?php echo site_url('Profile'); ?>"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
        <li><a href="<?php echo site_url('Changepassword'); ?>"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        <li><a href="<?php echo site_url('Logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

    </ul>
</div>