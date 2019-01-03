<?php
require_once('./code/assert.php');
require_once('./code.php');
class Tests {
    static function helloWorldTest() {
        Assert::areEqual("Hello World!", Code::helloWorld());
    }

    static function capitalizeEveryNthWordTest() {
        $sentence = "Lorem ipsum dolor sit amet";
        Assert::areEqual("Lorem ipsum Dolor sit Amet", Code::capitalizeEveryNthWord($sentence, 0, 2));
        Assert::areEqual("Lorem ipsum Dolor Sit Amet", Code::capitalizeEveryNthWord($sentence, 2, 1));
    }
    static function isPrimeTest() {
        Assert::isFalse(Code::isPrime(-1), "IsPrime(-1) should be false.");
        Assert::isFalse(Code::isPrime(0), "IsPrime(0) should be false.");

        $primesTo1000 = array(
            2, 3, 5, 7, 11, 13, 17, 19, 23,
            29, 31, 37, 41, 43, 47, 53, 59, 61, 67,
            71, 73, 79, 83, 89, 97, 101, 103, 107, 109,
            113, 127, 131, 137, 139, 149, 151, 157, 163, 167,
            173, 179, 181, 191, 193, 197, 199, 211, 223, 227,
            229, 233, 239, 241, 251, 257, 263, 269, 271, 277,
            281, 283, 293, 307, 311, 313, 317, 331, 337, 347,
            349, 353, 359, 367, 373, 379, 383, 389, 397, 401,
            409, 419, 421, 431, 433, 439, 443, 449, 457, 461,
            463, 467, 479, 487, 491, 499, 503, 509, 521, 523,
            541, 547, 557, 563, 569, 571, 577, 587, 593, 599,
            601, 607, 613, 617, 619, 631, 641, 643, 647, 653,
            659, 661, 673, 677, 683, 691, 701, 709, 719, 727,
            733, 739, 743, 751, 757, 761, 769, 773, 787, 797,
            809, 811, 821, 823, 827, 829, 839, 853, 857, 859,
            863, 877, 881, 883, 887, 907, 911, 919, 929, 937,
            941, 947, 953, 967, 971, 977, 983, 991, 997);
        for ($i=0; $i<1000; $i++) {
            if (Tests::findInArray($i, $primesTo1000) == true) {
                Assert::isTrue(Code::isPrime($i), "IsPrime(" . $i . ") should be true.");
            }
            else{
                Assert::isFalse(Code::isPrime($i), "IsPrime(" . $i . ") should be false.");
            }
        }

    }
    
    static function goldenRatioTest() {
        //Assert::isInRange(1.61800, 1.61806, Code::goldenRatio(1.0, 1.0));
        Assert::isInRange(1.61800, 1.61806, Code::goldenRatio(6, 100));
    }

    static function fibonacciTest() {
        Assert::areEqual(0, Code::fibonacci(0));
        Assert::areEqual(1, Code::fibonacci(1));
        Assert::areEqual(1, Code::fibonacci(2));
        Assert::areEqual(2, Code::fibonacci(3));
        Assert::areEqual(6765, Code::fibonacci(20));
        Assert::areEqual(4181, Code::fibonacci(19));
    }

    static function squareRootTest() {
        Assert::areEqual(5.0, Code::squareRoot(25.0));
        Assert::isInRange(1.414, 1.4144, Code::squareRoot(2.0));
    }
	static function findInArray($value, $array){
		$found = false;
		for($i = 0; $i < count($array); $i++){
			if($array[$i]===$value){
				$found = true;
			}
		} 
		return $found;
	}
}