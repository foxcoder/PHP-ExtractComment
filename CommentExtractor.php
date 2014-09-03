<?php



/**
 * check if String start with some string
 * @param unknown $Haystack
 * @param unknown $Needle
 * @return boolean
 */
function startsWith($Haystack, $Needle) {
	// Recommended version, using strpos
	return strpos ( $Haystack, $Needle ) === 0;
}

/**
 * extrace comment from text email boday
 * @param unknown $str
 * @return string
 */
function extractCommmentFromTextEmailBody($str) {
	$str_result = "";
	
	$tok = strtok ( $str, "\n" );
	$str_lines = array ();
	
	while ( $tok !== false ) {
		$l="$tok\n";
		array_push ($str_lines,$l);
		
		$tok = strtok ( "\n" );
	}
	
	$array_len = count ( $str_lines );	
	for($x = 0; $x < $array_len; $x ++) {
		$line = $str_lines [$x];
		/*
		if (startsWith ( $line, "From:" )) {
			if ((($x + 1) < $array_len) && startsWith ( $str_lines [$x + 1], "Sent:" )) {
				
				break;
			}
		}*/
		
		if (preg_match("^[-]+$", $line)){
			break;
		}
		
		$str_result = $str_result . $line;
		
	}
	
	return $str_result;
}

/**
 * get task id from email subject
 * @param unknown $subject
 */
function extractTaskIdFromEmailSubject($str){
	$tok = strtok ( $str, " \t\n" );
	$str_lines = array ();
	
	while ( $tok !== false ) {
		$l="$tok\n";
		array_push ($str_lines,$l);
	
		$tok = strtok ( " \t\n" );
	}
	
	$array_len = count ( $str_lines );
	for($x = 0; $x < $array_len; $x ++) {
		$line = $str_lines [$x];
		if (startsWith ( $line, "TK-" )) {
			echo "task id-->$line";
			return $line;
		}
		
	}
	
	return NIL;
	
}


