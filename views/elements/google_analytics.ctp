<?php if (Configure::read('Config.google_analytics')) { ?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "<?php print Configure::read('Config.google_analytics') ?>";
urchinTracker();
</script>
<?php } ?>