#!/usr/bin/php
<?php
$rundir = dirname(readlink($argv[0]));
require_once ($rundir . '/rds_config.php');

if (isset($argv['1']) && $argv['1'] == 'autoconf') {
	echo 'yes' . "\n";
} else if (isset($argv['1']) && $argv['1']== 'config') {
	
	echo <<<EOM
graph_title AWS RDS DB Connections
graph_args --base 1000 -l 0
graph_vlabel DB Connections
graph_category AWS_RDS
graph_info This graph shows the number of connections in the RDS.
aws_rds_connection.label number
aws_rds_connection.draw LINE2
aws_rds_connection.info The current number of connections.

EOM;
	
} else {

	$result = $client->getMetricStatistics(array(
		'Namespace'  => 'AWS/RDS',
		'MetricName' => 'DatabaseConnections',
		'Dimensions' => $dimensions,
		'StartTime'  => strtotime('-5 min'),
		'EndTime'    => strtotime('now'),
		'Period'     => 300,
		'Statistics' => array('Maximum'),
	));
	foreach ($result['Datapoints'] as $val) {
		echo 'aws_rds_connection.value ' . $val['Maximum'] . "\n";
	}

}
