<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('system.php');
$system = new System;
?>
<html>
<head>
<title><?php echo $system->os->hostname;?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap-grid.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
    <div class="row">
        <h1>
        <?php echo $system->os->hostname;?>
        <div class="uptime">online for <?php echo $system->uptime->days; ?> days, <?php echo $system->uptime->hours; ?> hours, <?php echo $system->uptime->minutes; ?> minutes </div>
        </h1>
    </div>
    <div class="row">
        <?php
            include("widgets/cpu.php");
            include("widgets/memory.php");
            include("widgets/swap.php");
            include("widgets/disks.php");
            include("widgets/network.php");
        ?>
    </div>
</div>
</body>
</html>