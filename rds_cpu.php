#!/usr/bin/php
<?php
$rundir = realpath(dirname($argv[0]));
require_once ($rundir . '/rds_config.php');

if (isset($argv['1']) && $argv['1'] == 'autoconf') {
	echo 'yes' . "\n";
} else if (isset($argv['1']) && $argv['1']== 'config') {
	
	echo <<<EOM
graph_title AWS RDS CPU Utilization
graph_args --base 1000 -l 0
graph_vlabel CPU Utilization
graph_category AWS_RDS
graph_info This graph shows the CPU utilization in the system.
aws_rds_cpu.label usage
aws_rds_cpu.draw LINE2
aws_rds_cpu.info The current CPU utilization.

EOM;
	
} else {

	$result = $client->getMetricStatistics(array(
		'Namespace'  => 'AWS/RDS',
		'MetricName' => 'CPUUtilization',
		'Dimensions' => $dimensions,
		'StartTime'  => strtotime('-5 min'),
		'EndTime'    => strtotime('now'),
		'Period'     => 300,
		'Statistics' => array('Maximum'),
	));
	foreach ($result['Datapoints'] as $val) {
		echo 'aws_rds_cpu.value ' . $val['Maximum'] . "\n";
	}

}