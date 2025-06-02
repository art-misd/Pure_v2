<!DOCTYPE html>
<head>
<title>Pure Tweaks</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" href="style.css">
<script src="javascript.js"></script>
<?php
$update = 0;
$raatData = '';
include 'variables.php';
include 'raatConfig.php';
$checked = array();
$audioDataDisplay='none';
$rebootButtonDisplay='none';
foreach(range(0, 1) as $rating){
	$checked[$rating] = null;
	if(isset($_POST['rating'])){
		if(is_array($_POST['rating']) && in_array($rating, $_POST['rating']) ){
			$checked[$rating] = 'checked';
			if($rating==0){
				$rebootButtonDisplay='table-cell';
			};
			if($rating==1){
				$audioDataDisplay='table-cell';
			};
		};
	} else if (isset($_POST['empty'])){

	} else {
		if($valuesArray[$rating]==true){
			$checked[$rating] = 'checked';
			if($rating==0){
				$rebootButtonDisplay='table-cell';
			};
			if($rating==1){
				$audioDataDisplay='table-cell';
			};
		} else {
			$checked[$rating] = null;
		};
	};
};
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/var/www/plugins.php");?>
</head>



<body bgcolor="#565656" onload='pageLoad()'>
<div id='clickDisabler'>
</div>
<div id='fullContainer'>
	<div id='middleContainer'>
		<div id='preloadBack' >
			<div id='preload' >
			</div>
		</div>
		<table id='mainContent' cellspacing="0" cellpadding="0">
			<tr id='optionsTop' >
				<td id='audioTabInactive' >
					<span>
						<?php
						 $server = $_SERVER['HTTP_HOST'];
						 echo "&emsp;<a href=http://" ;
						 echo $server ;
						 echo "/tabs.php>Return</a>";
						?>
					</span>
				</td>
				<td>

				</td>
				<td>
				</td>
				<td  id='superuserTab' class="active">
					<span>Tweaks</span>
				</td>
			</tr>
			<tr>
				<td colspan=4 id='contentCell' >
					<div id='superuserSel'>
						<div class='row'>
						</div>
						<div class='row'>
							<div id='output'>
								<span class="title">Plugin selection:</span>
								<div>
									<form method="post" action="" onchange="showResult()">
										<div class="row">
											<label>
												<input type="hidden" name="empty" value="1"/>
												<input type="checkbox" name="rating[]" value="0" <?php echo $checked[0]; ?>>
												Reset button
											</label>
											<label>
												<input type="checkbox" name="rating[]" value="1" <?php echo $checked[1]; ?>>
												Audio bitrate
											</label>
										</div>
										<div class="row">
											<input type="submit" id="editPluginsText" name="editPlugins" value="Edit plugins" class="selButtonText"/>
										</div>
									</form>
								</div>
              </div>
              <div id='raatconfig'>
                <span class="title">Raat config:</span>
                <div>
									<form method="post" action="submitRaat.php">
                    <div class="row">
                      <span>Dsd mode: </span>
                      <label class="dsdswitch">
                        <input type="hidden" name="empty" value="1"/>
                        <input type="radio" id="dop" name="dsdmode" value="DoP" <?php echo $checked[0]; ?>><label class="dsdlable" for="dop">DoP</label>
                        <span>/</span>
												<input type="radio" id="native" name="dsdmode" value="Native" <?php echo $checked[1]; ?>><label class="dsdlable" for="native">Native</label>
                      </label>
											<label>
												<input type="checkbox" id="raatvolume" name="rvolume" value="1" <?php echo $checked[1]; ?>>
												Volume control
											</label>
										</div>
										<div class="row">
											<input type="button" onclick="submitRaat()" value="Edit Raat" class="selButtonText"/>
										</div>
									</form>
                </div>
              </div>
						</div>
						<div class='row'>
							<div id='ipSet'>
								<span class="title">Static IP:</span>
								<div>
                  <div class='row'>
  							    <div class='cell'>			
                    	<span class='warningText'>If you set the wrong address, you can fix it manually in sd card in the 'interfaces' file!</span>
  									</div>
                  </div>
									<form method="post" action="" onkeydown="return event.key != 'Enter';">
                    <div>
                      <!--Frames for static address (IP/Mask/Gateway)-->
											<div class="row">
								                <div class="cellLabel">IP: </div>
								                <div class="cellField"><input type="text" id="ip1" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="ip2" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="ip3" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="ip4" name="address[]" maxlength="3"/></div>
								            </div>
								            <div class="row">
								                <div class="cellLabel">Mask: </div>
								                <div class="cellField"><input type="text" id="mask1" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="mask2" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="mask3" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="mask4" name="address[]" maxlength="3"/></div>
								            </div>
								            <div class="row">
								                <div class="cellLabel">Gateway: </div>
								                <div class="cellField"><input type="text" id="gateway1" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="gateway2" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="gateway3" name="address[]" maxlength="3"/></div>
								                <div class="cellText">.</div>
								                <div class="cellField"><input type="text" id="gateway4" name="address[]" maxlength="3"/></div>
								            </div>
								            <div class="row">
								            	<div class="cell"></div>
								                <div class="cell"><input type="submit" id="removeIP" name="removeIP" value="Remove" class="selButtonText"/></div>
								                <div class="cell"><input type="submit" id="editIP" name="editIP" value="Save" class="selButtonText"/></div>
								                <div class="cell"><input type="submit" id="rebootIP" name="rebootIP" value="Reboot" class="selButtonText"/></div>
								            </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class='row'>
							<div id='editInternalSettings' >
								<span class="warn title">Attention!</font></span>
								<span>This command will erase all data on eMMC!</span>
								<form method="post">
									<div class='buttonSpacer'><input type="submit" name="eraseEmmc" id="eraseEmmc" value="Erase eMMC" /><br></div>
								</form>

							</div>
						</div>
						<div class='row'>

						</div>
					</div>
					<div id='sign'>
						<div></div><span>Pure</span>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

</body>
<script>
function showResult()
{

//document.getElementByName("resetButton");

}
</script>

<?php
	if($_POST['editPlugins']){
		//$values = array();
		foreach(range(0, 1) as $rating){
			if( isset($_POST['rating']) && is_array($_POST['rating']) && in_array($rating, $_POST['rating']) ){
				$valuesArray[$rating] = true;
			} else {
				$valuesArray[$rating] = false;
			};
		};
		$var_str = var_export($valuesArray, true);
		$var = "<?php\n\n\$valuesArray = $var_str;\n\n?>";
		file_put_contents('variables.php', $var);
	} else if($_POST['eraseEmmc']){
		$EMMC = `ls /dev/mmcblk1` ;
		$ROOT = `grep mmcblk0 /proc/cmdline` ;
		if (empty($EMMC)) {
		echo '<br><font color = "white">You don`t have built-in eMMC memory.</font>' ;
		} else {
			{`echo 1 > /sys/class/gpio/gpio113/value ;
			dd if=/dev/zero of=/dev/mmcblk1 bs=1M count=10 ;
			sync && reboot ;
			`;};
			echo '<script type="text/javascript">updatePage();</script>';
			echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 15000);</script>';
		};
  }

	if (isset($_POST['removeIP'])) {
		$orderedItems = "auto lo\niface lo inet loopback\n\nauto eth0\n\n###### for DHCP ############\niface eth0 inet manual\n    pre-up /sbin/udhcpc -t 10 -q\n\n###### for static ip #######\n#iface eth0 inet static\n" . PHP_EOL;
    $orderedItems .= "#    address 192.168.1.22\n#     netmask 255.255.255.0\n#     gateway 192.168.1.1\n#"; //     dns 0.0.0.0";
    $fp = fopen('/boot/interfaces', 'w');
		fwrite($fp, $orderedItems);
		fclose($fp);
    } else if (isset($_POST['editIP'])) {
    	$orderedItems = "auto lo\niface lo inet loopback\n\nauto eth0\n\n###### for DHCP ############\n#iface eth0 inet manual\n#    pre-up /sbin/udhcpc -t 10 -q\n\n###### for static ip #######\niface eth0 inet static\n" . PHP_EOL;
			$address = $_POST['address'];
			for ($i = 0; $i < count($address); $i++) {
				$ant = $address[$i];
				if ($ant == ''){
					$ant = 0;
				}
				if ($i == 0){
					$orderedItems .= "    address ";
				} else if ($i == 4){
					$orderedItems .= "    netmask ";
				} else if ($i == 8){
					$orderedItems .= "    gateway ";
				} 
				//else if($i == 12){
					// $orderedItems .= "    dns ";
				// }
				if (($i+1) % 4 == 0) {
					$orderedItems .= "$ant\n";
				} else {
					$orderedItems .= "$ant.";
				}
			} 
			$fp = fopen('/boot/interfaces', 'w');
			fwrite($fp, $orderedItems);
			fclose($fp);
		}  else if (isset($_POST['rebootIP'])) { 
			
			echo '<script type="text/javascript">updatePage();</script>';
			echo '<script type="text/javascript">setTimeout(function() {getUpdateOutput(); }, 12000);</script>';
	  	exec ('/opt/reboot.sh' . '>/dev/null &');
		}
?>

<?php
  $text = file_get_contents('/boot/interfaces');
	$text = explode("\n",$text);
	$output = array();
	foreach($text as $line){  
	  $output[] = $line;
	}
?>

<script type="text/javascript">
    var data = '<?php echo(json_encode($output)); ?>';
    var nameArr = data.replace(/['"]+/g, '').split(',');
    for (var i = 0; i < nameArr.length; i++) {
    	var b = [];
    	var myVar;
    	var app = null;
    	if (nameArr[i].includes("address")){
    		b = nameArr[i].split(/[ ]+/).pop().split('.').map(function(item) {
			    return parseInt(item, 10);
			});
			app ="ip"
    	} else if (nameArr[i].includes("netmask")){
    		b = nameArr[i].split(/[ ]+/).pop().split('.').map(function(item) {
			    return parseInt(item, 10);
			});
			app ="mask"
    	} else if (nameArr[i].includes("gateway")){
    		b = nameArr[i].split(/[ ]+/).pop().split('.').map(function(item) {
			    return parseInt(item, 10);
			});
			app ="gateway"
    	}
    	if (app != null){
    		if (nameArr[i].startsWith('#')){
    			for (var k = 0; k < 4; k++) {
					myVar = app + (k+1).toString();
					document.getElementById(myVar).value="";
				}
    		} else {
    			for (var k = 0; k < 4; k++) {
					myVar = app + (k+1).toString();
					document.getElementById(myVar).value=b[k];
				}
    		}
    		
    	}
    	

	}
</script>

<script type="text/javascript">
  var parsedRaatData;
  function getRaatData(){
    var raatRawData = '<?= json_encode($raatData, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE); ?>';
    var raatCleanData = raatRawData;
    parsedRaatData = JSON.parse(raatCleanData.substring(1, raatCleanData.length-1));
    var dsdMode = parsedRaatData.output.dsd_mode;
    var volumeMode = parsedRaatData.volume.type;
    if (dsdMode=="native"){
      document.getElementById('native').checked = true;
    } else if (dsdMode=="dop"){
      document.getElementById('dop').checked = true;
    }
    if (volumeMode=="software"){
      document.getElementById('raatvolume').checked = true;
    } else if(volumeMode=="null"){
      document.getElementById('raatvolume').checked = false;
    }
    document.addEventListener('input',(e)=>{
      if(e.target.getAttribute('name')=="dsdmode"){
        if (e.target.value=="Native"){
          parsedRaatData.output.dsd_mode = "native";
        } else if (e.target.value=="DoP"){
          parsedRaatData.output.dsd_mode = "dop";
        }
        // console.log(e.target.value);
        // console.log(parsedRaatData);
        // document.cookie = 'raatData=' + parsedRaatData;
      }
      if(e.target.getAttribute('name')=="rvolume"){
        if (e.target.checked){
          parsedRaatData.volume.type = "software";
        } else {
          parsedRaatData.volume.type = "null";
        } 
        // document.cookie = 'raatData=' + parsedRaatData;
        // console.log(parsedRaatData);
      }
    })
    // $.each(words, function(key, value) {
    // console.log('stuff : ' + key + ", " + value);
    // });
  };
  window.onload = function() {
    getRaatData();
  };

  function submitRaat() {
    // var formData = new FormData();
    // formData.append('jsonData', JSON.stringify(parsedRaatData));

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Open a POST request to submit.php
    xhr.open('POST', 'submitRaat.php', true);

    // Set the appropriate headers
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Define what happens on successful data submission
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            // Handle success
        } else {
            console.error(xhr.responseText);
            // Handle error
        }
    };

    // Define what happens in case of an error
    xhr.onerror = function () {
        console.error('Request failed.');
    };

    // Send the form data
    xhr.send(JSON.stringify(parsedRaatData, null, 4));

  };
</script>
