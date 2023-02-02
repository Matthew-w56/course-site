<?php
/*
Error codes:
1:   passwords do not match
2:   password is not long enough
4:   password does not contain a number
8:   password does not contain a special character (?.,#$@!*)
16:  no email entered
32:  email is not valid
64:  no password entered
*/

function build_error_prompt($erc, $messages) {
	$e_prompt = '';
	if ($erc > 0) {
		$max = sizeof($messages) - 1;
		for ($i = $max; $i >= 0; $i--) {
			if ($erc >= (2 ** $i)) {
				$erc -= (2 ** $i);
				$e_prompt .= '<li>'.$messages[$i].'</li>';
			}
		}
	}
	return $e_prompt;
}
?>