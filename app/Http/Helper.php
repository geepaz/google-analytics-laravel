<?php

	function checkPermission($permissions){
		$userAccess = getMyPermission(auth()->user()->role);
		foreach ($permissions as $key => $value) {
			if($value == $userAccess){
				return true;
			}
		}
		return false;
	}

	function getMyPermission($role)
	{
		switch ($role) {
			case 'admin':
				return 'admin';
				break;
			default:
				return 'user';
				break;
		}
	}

	function text_limit($x, $length) {
		if (strlen($x) <= $length) {
			return $x;
		}
		else {
			$y = substr($x, 0, $length) . '...';
			return $y;
		}
	}
	
	
	function round_figure($float) {
    return number_format(round($float, 2), 2);
	}