<div class="component">
    <div class="header">
        Ethernet eth0
        <?php if ($system->network->eth0->speed) echo $system->network->eth0->speed . ' MBIT'; ?>
    </div>
        <?php if($system->network->eth0->state == 'up'): ?>
        <div class="state green">
        <?php else: ?>
        <div class="state gray">
        <?php endif; ?>
        
        <?php 
        $mb = $system->network->eth0->total / 1048576;
        echo $mb > 1024 ? number_format($mb/1024, 1) . ' GB' : number_format($mb, 1) . ' MB';
        ?>
        
        <?php if(isset($system->network->eth0->ip)): ?>
        <small <?php echo $system->network->eth0->state == "up" ? 'class="green"' : 'class="red"'; ?>><?php echo $system->network->eth0->ip; ?> </small>
        <?php endif; ?>
        <small <?php echo isset($system->os->ip) ? 'class="green"' : 'class="red"'; ?>><?php echo isset($system->os->ip) ? $system->os->ip : 'N/A'; ?> </small>
    </div><br><br><br>
    <div class="information">
        <ul>
            <li>
                <small>Sent</small>
                <?php 
                $mb = $system->network->eth0->sent / 1048576;
                echo $mb > 1024 ? round($mb/1024, 1) . ' GB' : round($mb, 1) . ' MB';
                ?>
            </li>
            <li>
                <small>Received</small>
                <?php 
                $mb = $system->network->eth0->received / 1048576;
                echo $mb > 1024 ? round($mb/1024, 1) . ' GB' : round($mb, 1) . ' MB';
                ?>
            </li>
            <li>
                <small>Errors</small>
                <?php echo $system->network->eth0->errors; ?>
            </li>
        </ul>
    </div>
</div>