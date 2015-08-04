<?php
$rundir = dirname(readlink($argv[0]));
require_once ($rundir . '/aws.phar');

use Aws\CloudWatch\CloudWatchClient;

// AWS認証
$client = CloudWatchClient::factory(array(
	'key'    => 'KEY',
	'secret' => 'SECRET-KEY',
	'region' => 'REGION'
));

// 監視対象RDSインスタンス
$dimensions = array(
	array('Name' => 'DBInstanceIdentifier', 'Value' => 'InstanceID'),
);
