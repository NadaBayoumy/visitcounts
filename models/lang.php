<?php
/**
 * Converts numbers in string from western to eastern Arabic numerals.
 *
 * @param  string $str Arbitrary text
 * @return string Text with western Arabic numerals converted into eastern Arabic numerals.
 */
function arabic_w2e($str) {
	$arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
	$arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	return str_replace($arabic_western, $arabic_eastern, $str);
}

/**
 * Converts numbers from eastern to western Arabic numerals.
 *
 * @param  string $str Arbitrary text
 * @return string Text with eastern Arabic numerals converted into western Arabic numerals.
 */
function arabic_e2w($str) {
	$arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
	$arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	return str_replace($arabic_eastern, $arabic_western, $str);
}


function showCounter($LANGUAGE,$Num){
	if($LANGUAGE === "ar")
	{
		ob_start();
		echo "عدد الزائرين ";
		echo arabic_w2e($Num); // Outputs: ١٢٣٤٥٦٧٨٩٠
		$output = ob_get_clean();
		var_dump($output);
	}
	else{
		ob_start();
		echo "Visits Number is ";
		echo arabic_e2w($Num); // Outputs: 1234567890
		$output = ob_get_clean();
		var_dump($output);
	}

}
