public class Code {
	public static final Double EPSILON = 0.00001;
	// Returns "Hello World!"
	public static String helloWorld() {
	    return "Hello World!";
	}

	// Take a single-spaced <sentence>, and capitalize every <n> word starting with <offset>.
	// STANDARD ALGORITHM
	public static String capitalizeEveryNthWord(String sentence, Integer offset, Integer n) {
		String  delimiter = " ";
		String[]    words = sentence.split(delimiter);
		for(int i = 0; i < words.length; ++i){
			words[i] = (i % n == 0 && i >= offset) ? 
				   (words[i].substring(0, 1).toUpperCase() + words[i].substring(1, words[i].length())):
			            words[i];
		}
		return String.join(delimiter, words);
	}

	// Determine if a number is prime
	// ALGORITHM USES BREAK TO LIMIT LARGE COMPARISONS
	public static Boolean isPrime(Integer n) {
		boolean prime = n > 1 || n == 2;
		for (int i = 2; i <= n / 2; ++i){
		    if (n % i == 0) {
				prime = false;
				break;
			}  
		}
		return prime;
	}

	// Calculate the golden ratio.
	// Given two numbers a and b with a > b > 0, the ratio is b / a.
	// Let c = a + b, then the ratio c / b is closer to the golden ratio.
	// Let d = b + c, then the ratio d / c is closer to the golden ratio.
	// Let e = c + d, then the ratio e / d is closer to the golden ratio.
	// If you continue this process, the result will trend towards the golden ratio.
	// BASIC RECURSIVE GOLDEN RATIO THEOREM
	public static Double goldenRatio(Double a, Double b) {
		return ((a/b) == ((a+b)/a)) ? ((a+b)/a): Code.goldenRatio((a+b), a);
	}

	// Give the nth Fibonacci number
	// Starting with 1 and 1, a Fibonacci number is the sum of the previous two.
	// J.P.M. BINET'S FORMULA (1843)
	public static Integer fibonacci(Integer n) {
		double rootFive = Math.pow(5,.5);
		double jpmBinet = Math.pow((1+rootFive)/2, n)-Math.pow((1-rootFive)/2, n);
		return (int)((1/rootFive)*(jpmBinet));
	}

	// Give the square root of a number
	// Using a binary search algorithm, search for the square root of a given number.
	// Do not use the built-in square root function.
	// MODIFIED TEXTBOOK BINARY SEARCH W/ HARD CODED NUMBERS
	public static Double squareRoot(Double n) {
		double      low = 1.0;
		double     high = n;
		while(high-low >= 0) {
			double mid = (low+high)/2;
			if ((mid*mid)-n > 0){
				high = (mid-EPSILON);
			}
			else{
				low  = (mid+EPSILON);
			}
		}
		return Math.round(high * 10000d) / 10000d;
	}
}
