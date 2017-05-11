<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

return array(
	// The database server name or IP address. Usually this is 'localhost' or '127.0.0.1'.
	'server' => getenv('DB_HOST') ?: 'aa1wfcw41q5qii2.cw1xhmvwsxme.us-west-2.rds.amazonaws.com:3306',

	// The name of the database to select.
	'database' => getenv('DB_NAME') ?: 'valhalla',

	// The database username to connect with.
	'user' => getenv('DB_USER') ?: 'valhalla',

	// The database password to connect with.
	'password' => getenv('DB_PASS') ?: 'valhalla',
	
	// The prefix to use when naming tables. This can be no more than 5 characters.
	'tablePrefix' => 'craft',
);
