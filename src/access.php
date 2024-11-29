<?php
    // Detect if running on localhost
    $isLocalhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;

	//mysql access
    if ($isLocalhost) {
		global $_cfg;
			$_cfg = array(
			'mq.host' => 'localhost',
			'mq.user' => 'root',
			'mq.pass' => '',
			'mq.db'   => 'heroesdb',
			'mq.port' => '3306',
		);
    } else {
		global $_cfg;
			$_cfg = array(
			'mq.host' => 'sql311.infinityfree.com',
			'mq.user' => 'if0_37786384',
			'mq.pass' => 'Alamar85',
			'mq.db'   => 'if0_37786384_h3db',
			'mq.port' => '3306',
		);
    }
