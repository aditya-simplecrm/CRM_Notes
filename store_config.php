<?php
		// store data in config file

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