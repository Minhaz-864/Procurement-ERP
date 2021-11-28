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

    <?php
    if (isset($printingFile)) :

    ?>
        <div>
            <?php
            if (isset($printingFile)) :
                foreach ($printingFile as $row) :
                   
                // $file = "./assets/Uploads/{$row}";
                // $filename = $row;
                // header('Content-type: application/pdf');
                // header('Content-Disposition: inline; filename="' . $filename . '"');
                // header('Content-Transfer-Encoding: binary');
                // header('Content-Length: ' . filesize($file));
                // header('Accept-Ranges: bytes');
                // $myfile = fopen("./assets/Uploads/{$row}", "a") or die("Unable to open file!");
                
                
                
                

            ?>
            
            <label><?php header('Content-Type:application/pdf');
                            header("Content-Disposition: inline; filename=\"{$row}\"");
                            readfile("./assets/Uploads/{$row}");
            ?></label>        
        </div>
        <?php
                endforeach;
            endif;
        else :
            ?>
<p>Something Wrong with file reading.</p>
<?php
        endif;
?>



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