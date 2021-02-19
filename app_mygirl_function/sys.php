<?php
$start_time = microtime(TRUE);

$free = shell_exec('free');
$free = (string)trim($free);
$free_arr = explode("\n", $free);
$mem = explode(" ", $free_arr[1]);
$mem = array_filter($mem, function($value) { return ($value !== null && $value !== false && $value !== ''); }); // removes nulls from array
$mem = array_merge($mem); // puts arrays back to [0],[1],[2] after filter removes nulls

//print_r($mem); echo '<hr>';
$memtotal = round($mem[1] / 1000000,2);
$memused = round($mem[2] / 1000000,2);
$memfree = round($mem[3] / 1000000,2);

$membuffer = round($mem[5] / 1000000,2);
$memcached = round($mem[6] / 1000000,2);

$memusage = round(($memused - $memcached - $membuffer)/$memtotal*100,2);

$connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`; 
$totalconnections = `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`; 

$load = sys_getloadavg();
$cpuload = $load[0];

$diskfree = round(disk_free_space(".") / 1000000000);
$disktotal = round(disk_total_space(".") / 1000000000);
$diskused = round($disktotal - $diskfree);

$diskusage = round($diskused/$disktotal*100);

if ($memusage > 85 || $cpuload > 5 || $diskusage > 95) {
	$trafficlight = 'red';
} elseif ($memusage > 70 || $cpuload > 2 || $diskusage > 85) {
	$trafficlight = 'orange';
} else {
	$trafficlight = '#2F2';
}

$end_time = microtime(TRUE);
$time_taken = $end_time - $start_time;
$total_time = round($time_taken,4);
?>

<style>
.description { font-weight: bold; }
#trafficlight { float: right; margin-top: 30px; }
#details { font-size: 0.8em; }
hr {  border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0)); }
.big { font-size: 1.2em; }
.footer { font-size: 0.7em; font-color: #AAA; text-align: center; }
.footer a { font-color: #AAA; }
.footer a:visited { font-color: #AAA; }
</style>

<div style="width:90%;float:left;margin: 10px;">
<canvas id="trafficlight" width="100" height="100"></canvas>
    <script>
      var canvas = document.getElementById('trafficlight');
      var context = canvas.getContext('2d');
      var centerX = canvas.width / 2;
      var centerY = canvas.height / 2;
      var radius = 40;

      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = '<?php echo $trafficlight; ?>';
      context.fill();
      context.lineWidth = 5;
      context.strokeStyle = '#003300';
      context.stroke();
    </script>
<p><span class="description big">RAM Usage:</span> <span class="result big"><?php echo $memusage; ?>%</span></p>
<p><span class="description big">CPU Usage: </span> <span class="result big"><?php echo $cpuload; ?>%</span></p>
<p><span class="description">Hard Disk Usage: </span> <span class="result"><?php echo $diskusage; ?>%</span></p>
<p><span class="description">Established Connections: </span> <span class="result"><?php echo $connections; ?></span></p>
<p><span class="description">Total Connections: </span> <span class="result"><?php echo $totalconnections; ?></span></p>

<hr>
<p><span class="description">RAM Total:</span> <span class="result"><?php echo $memtotal; ?> GB</span></p>
<p><span class="description">RAM Free:</span> <span class="result"><?php echo $memfree; ?> GB</span></p>
<p><span class="description">RAM Used:</span> <span class="result"><?php echo $memused; ?> GB</span></p>
<p><span class="description">RAM Buffer:</span> <span class="result"><?php echo $membuffer; ?> GB</span></p>
<p><span class="description">RAM Cached:</span> <span class="result"><?php echo $memcached; ?> GB</span></p>
<hr>
<p><span class="description">Hard Disk Free:</span> <span class="result"><?php echo $diskfree; ?> GB</span></p>
<p><span class="description">Hard Disk Used:</span> <span class="result"><?php echo $diskused; ?> GB</span></p>
<p><span class="description">Hard Disk Total:</span> <span class="result"><?php echo $disktotal; ?> GB</span></p>
<hr>
	<div id="details">
		<p><span class="description">Server Name: </span> <span class="result"><?php echo $_SERVER['SERVER_NAME']; ?></span></p>
		<p><span class="description">Server Addr: </span> <span class="result"><?php echo $_SERVER['SERVER_ADDR']; ?></span></p>
		<p><span class="description">PHP Version: </span> <span class="result"><?php echo phpversion(); ?></span></p>
		<p><span class="description">Load Time: </span> <span class="result"><?php echo $total_time; ?> sec</span></p>
	</div>
</div>
