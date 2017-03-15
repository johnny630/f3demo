<p><?php echo \Base::instance()->format($_hello ,'johnny'); ?>, <?php echo $country; ?>!  <?php echo $village; ?></p>
<?php echo $LANGUAGE; ?>


<ul>
<?php foreach (($result?:[]) as $key=>$item): ?>
    <li><?php echo $key; ?> / <?php echo $item; ?></li>
<?php endforeach; ?>
</ul>