<?php
$user = shell_exec("awk -F: '/1000/{print $1}' /etc/passwd");
$home = shell_exec("awk -F: '/1000/{print $6}' /etc/passwd");
$home = trim($home);
$behind = trim(shell_exec("sudo git -C ".$home."/BirdNET-Pi fetch > /dev/null 2>&1 && git -C ".$home."/BirdNET-Pi status | sed -n '2 p' | cut -d ' ' -f 7"));
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<br>
<br>
<div class="systemcontrols">
  <form action="" method="GET">
    <button type="submit" name="submit" value="sudo reboot" onclick="return confirm('Are you sure you want to reboot?')">Reboot</button>
  </form>
  <form action="" method="GET">
    <button type="submit" name="submit" value="update_birdnet.sh" onclick="return confirm('Are you sure you want to update?')">Update <?php if($behind != "0" && $behind != "with"){?><div class="updatenumber"><?php echo $behind; ?></div><?php } ?></button>
  </form>
  <form action="" method="GET">
    <button type="submit" name="submit" value="sudo shutdown now" onclick="return confirm('Are you sure you want to shutdown?')">Shutdown</button>
  </form>
  <form action="" method="GET">
    <button type="submit" name="submit" value="sudo clear_all_data.sh" onclick="return confirm('Clear ALL Data? Note that this cannot be undone and will take up to 90 seconds.')">Clear ALL data</button>
  </form> 
</div>
