using System;

class Code {
	public static readonly double EPSILON = 0.00001;
	// Returns "Hello World!"
	public static string HelloWorld() {
		return "Hello World!";
	}

	// Take a single-spaced <sentence>, and capitalize every <n>th word starting with <offset>.
	public static string CapitalizeEveryNthWord(string sentence, int offset, int n) {
		string  delimiter = " ";
		string[]    words = sentence.Split(delimiter);
		for(int i = 0; i < words.Length; ++i){
			words[i] = (i % n == 0 && i >= offset) ? (words[i].Substring(0, 1).ToUpper() + words[i].Substring(1, words[i].Length-1)): words[i];
		}
		return string.Join(delimiter, words);
	}
	
	// Determine if a number is prime
	public static bool IsPrime(int n) {
		bool prime = n > 1 || n == 2;
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
	public static double GoldenRatio(double a, double b) {
		return ((a/b) == (a+b)/a) ? (a+b)/a: GoldenRatio((a+b), a);
	}
	
	// Give the nth Fibonacci number
	// Starting with 0, 1, 1, 2, ... a Fibonacci number is the sum of the previous two.
	// "VARIATION OF" J.P.M. BINET'S FORMULA (1843)
	public static int Fibonacci(int n) {
		double phi = GoldenRatio(n, n-1);
		return Convert.ToInt32(Math.Round((Math.Pow(phi, n) - Math.Pow(-phi, -n)) / SquareRoot(5)));
	}
	
	// Give the square root of a number
	// Using a binary search algorithm, search for the square root of a given number.
	// Do not use the built-in square root function.
	public static double SquareRoot(double n) {
		double	  low = 1.0;
		double	 high = n;
		// REDUCED EPSILON FOR PASSING TEST EFFICIENTLY
		double rEpsilon = (EPSILON/100);
		while(high-low >= 0) {
			double mid = (low+high)/2;
			if ((mid*mid)-n > 0){
				high = (mid-rEpsilon);
			}
			else{
				low  = (mid+rEpsilon);
			}
		}
		return Math.Round(high * 1000d) / 1000d;
	}
}
