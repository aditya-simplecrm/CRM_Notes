<?php
		// include('custom/include/mpdf60/mpdf.php');
		// $contents = file_get_contents ("custom/modules/scrm_Payment/receipt.html");
		// $mpdf=new mPDF();
		// $mpdf->WriteHTML($contents);
		// $mpdf->shrink_tables_to_fit = 1;
		// $mpdf->shrink_tables_to_fit = 1;
	 //    $mpdf->Output('receipt.pdf','D');
		ini_set('display_errors', 'On');
		global $sugar_config, $db;
		// print_r($db);
		echo $sugar_config['test'];
		
		require_once 'modules/Configurator/Configurator.php';
		
		$configurator = new Configurator();
		$configurator->loadConfig(); 	

		$configurator->config['test'] = 'aditya';

		$configurator->saveConfig(); // save changes

		echo '<br>'.$sugar_config['test'];
	
?>