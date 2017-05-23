<?php

require_once('NetController.php');
$Uc = new NetController();
$user_data = $Uc->get_netdata();
foreach ($user_data as $index ) {
		
}

?>

<?php echo var_dump($user_data);?>