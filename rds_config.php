<?php
require_once ($rundir . '/aws.phar');

// Capture nodename from filename
$filename = basename($_SERVER['PHP_SELF']);
preg_match('/^rds_.*_(.*)$/', $filename, $matches);
$nodename = $matches[1];

use Aws\CloudWatch\CloudWatchClient;

// AWS IAM Credentials
$client = CloudWatchClient::factory(array(
	'key'    => 'KEY',
	'secret' => 'SECRET-KEY',
	'region' => 'REGION'
));

// RDS dimension
$dimensions = array(
	array('Name' => 'DBInstanceIdentifier', 'Value' => $nodename),
);
