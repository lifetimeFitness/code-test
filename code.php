<?php
class Code {
	// Returns "Hello World!"
	static function helloWorld() {
		return "Hello World!";
	}
	// Take a single-spaced <sentence>, and capitalize every <n>th word starting with <offset>.
	static function capitalizeEveryNthWord($sentence, $offset, $n) {
		// ucfirst(strtolower($everyWordInSentence)) is intentionally avoided
		$delimiter  = " ";
		$words      = explode($delimiter, $sentence);
		$titleWord  = function ($word) { return strtoupper(substr($word, 0, 1)) . substr($word, 1, strlen($word)-1); };
		for($i = 0; $i < count($words); $i++){
			if($i >= $offset && $i % $n == 0 ){
				$words[$i] = $titleWord($words[$i]);	
			}
		}
		return implode($delimiter, $words);
	}
	
	// Determine if a number is prime
	static function isPrime($n) {
		$prime = ($n > 0 && $n != 1);
		for($i = 2; $i < $n; $i++){ 
			if($n % $i == 0){
				$prime = false;
			}
		}
		return $prime;

	}
	
	// Calculate the golden ratio.
	// Given two numbers a and b with a > b > 0, the ratio is b / a.
	// Let c = a + b, then the ratio c / b is closer to the golden ratio.
	// Let d = b + c, then the ratio d / c is closer to the golden ratio. 
	// Let e = c + d, then the ratio e / d is closer to the golden ratio.
	// If you continue this process, the result will trend towards the golden ratio.
	// BASIC RECURSIVE GOLDEN RATIO THEOREM
	static function goldenRatio($a, $b) {
		return (($a/$b) == ($a+$b)/$a) ? ($a+$b)/$a: Code::goldenRatio(($a+$b), $a);
	}

	// Give the nth Fibonacci number
	// Starting with 0, 1, 1, 2, ... a Fibonacci number is the sum of the previous two.
	// KNUTH (1963-1997)
	static function fibonacci($n) {
		if($n <= 0){
			return 0;
		}
		else if ($n <= 2){
			return 1;
		}
		else if($n % 2 == 0){
			$half  = $n/2;
			$f1    = Code::fibonacci($half);
			$f2    = Code::fibonacci($half-1);
			return $f1*($f1+(2*$f2));
		}
		$nHalf = ($n-1) / 2;
		$f1    = Code::fibonacci($nHalf+1);
		$f2    = Code::fibonacci($nHalf);
		return ($f1*$f1) + ($f2*$f2);
	}

	// Give the square root of a number
	// Using a binary search algorithm, search for the square root of a given number.
	// Do not use the built-in square root function.
	static function squareRoot($n) {
		$margin    = sprintf('%.3f', .001);
		$precision = strlen(strval("" . $margin)) - strrpos($margin, '.') - 1;
		// anonymous helper functions
		$midPoint  = function($a)    { return number_format((float) ($a/2), 0, '.', ''); };
		$round     = function($a, $p){ return number_format((float) $a    , $p,'.', ''); };
		$squared   = function($a)    { return ($a*$a);  };
		// usual suspects for binary search
		$low       = $round(1, $precision);
		$mid       = $midPoint($n);
		$high      = $n;
		$value     = 0;
		while ($low <= $high) { 
			$mid = $midPoint($low+$high);
			if ($n === $squared($round($mid, 0))) { 
				$value = $mid; 
				break; 
			} 
			if ($squared($mid) < $n) { 
				$low   = $mid+1; 
				$value = $mid; 
			} 
			else { 
				$high  = $mid-1; 
			} 
		}
		// precision loop(s)
		for ($i = 0; $i < $precision; $i++) { 
			while($n-$squared($value) > $margin) { 
				$value = $round($value+$margin, $precision);
			} 
		} 
		return $value; 
	}
}
