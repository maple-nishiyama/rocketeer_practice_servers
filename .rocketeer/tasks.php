<?php
use Rocketeer\Facades\Rocketeer;

Rocketeer::addTaskListeners('deploy', 'before-symlink', function ($task) {
	$output = $task->runForCurrentRelease("app/Console/cake test app Model/AppModel");
	return $task->checkStatus('Test failed', $output, 'Tests passed successfully.');
});

