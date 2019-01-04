object Code {
	val EPSILON: Double = .00001;

	// Returns "Hello World!"
	def helloWorld() : String = {
		"Hello World!";
	}

	// Take a single-spaced <sentence>, and capitalize every <n> word starting with <offset>.
	def capitalizeEveryNthWord(sentence:String, offset:Integer, n:Integer) : String = {
		var delimiter: String = " ";
		var     words: Array[String] = sentence.split(delimiter);
		for(i <- words.indices){
			val characters: Array[Char] = words(i).toCharArray();
			if(i >= offset && i % n == 0){
				characters(0) = Character.toUpperCase(characters(0));
			}
			words(i) = characters.mkString("");
		}
		words.mkString(delimiter);
	}
	
	// Determine if a number is prime
	def isPrime(n:Integer) : Boolean = {
		if (n <= 1){
			false;
		}
		else if (n == 2){
			true;
		}
		else{
			!(2 to (n-1)).exists(x => n % x == 0);
		}
	}
	
	// Calculate the golden ratio.
	// Given two numbers a and b with a > b > 0, the ratio is b / a.
	// Let c = a + b, then the ratio c / b is closer to the golden ratio.
	// Let d = b + c, then the ratio d / c is closer to the golden ratio. 
	// Let e = c + d, then the ratio e / d is closer to the golden ratio.
	// If you continue this process, the result will trend towards the golden ratio.
	// BASIC RECURSIVE GOLDEN RATIO THEOREM
	def goldenRatio(a:Double, b:Double) : Double = {
		if ((a/b) == (a+b)/a) (a+b)/a else goldenRatio((a+b), a);
	}

	// Give the nth Fibonacci number
	// Starting with 0, 1, 1, 2, ... a Fibonacci number is the sum of the previous two.
	// "TAIL CALL" RECURSION (ACM CONFERENCE, STEELE 1977)
	//  CALCULATES "PISANO PERIOD" (WALL 1960), (WRENCH 1969)
	def fibonacci(n:Integer) : Integer = {
	    def tail_recursion(n:Int, previous:Int, current:Int): Int = n match {
			case 0 => previous
			case _ => tail_recursion(n-1, current, ((previous+current) % 1000000))
		}
		tail_recursion((n % 1500000), 0, 1);
	}
	
	// Give the square root of a number
	// Using a binary search algorithm, search for the square root of a given number.
	// Do not use the built-in square root function.
	// "ALMOST" TEXTBOOK BINARY SEARCH
	def squareRoot(n: Double): Double = {
		var       low: Double = 1.0;
		var      high: Double = n;
		while(high-low >= 0) {
			var mid: Double = (low+high)/2;
			if (((mid*mid)-n) > 0){
				high = mid-EPSILON;
			}
			else{
				low  = mid+EPSILON;
			}
		}
		(high * 10000).round / 10000.toDouble;
	}

}
