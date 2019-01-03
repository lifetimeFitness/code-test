var code = {
	// Returns "Hello World!"
	helloWorld: function() {
		let response = "Hello World!";
	    return response;
	},

	// Take a single-spaced <sentence>, and capitalize every <n>th word starting with <offset>.
	capitalizeEveryNthWord: function(sentence, offset, n) {
		// constants
		const originalWords = sentence.split(' ');
		// function variable(s)
		let adjustedWords   = [];	
		// anonymous function(s)
		let titleWord       = function (word) { return word.charAt(0).toUpperCase() + word.slice(1) }
		for(let i = 0; i < originalWords.length; ++i){
			let adjustedWord = originalWords[i];
			if(offset == 0){
				if( i % n == 0 ){
					adjustedWord = titleWord(originalWords[i]);	
				}
			}
			else if(offset > 0){
				--offset;
			}
			adjustedWords.push(adjustedWord);
		}
		return adjustedWords.join(" ");
		
	},
	
	// Determine if a number is prime
	isPrime: function(n) {
		// quick evaluation of the truth tucked into a boolean
		let prime = n != 1 && n > 0;
		// anonymous function
		let round = function(a){ return +(a.toFixed(0));}
		for (let i=2; i <= round(this.squareRoot(n)); ++i){
			if(n % i == 0) {
				prime = false;
				break;
			}
		} 
		return prime;
	},
	
	// Calculate the golden ratio.
	// Given two numbers a and b with a > b > 0, the ratio is b / a.
	// Let c = a + b, then the ratio c / b is closer to the golden ratio.
	// >Let d = b + c, then the ratio d / c is closer to the golden ratio. 
	// >>Let e = c + d, then the ratio e / d is closer to the golden ratio.
	// If you continue this process, the result will trend towards the golden ratio.
	// BASIC RECURSIVE GOLDEN RATIO THEOREM
	goldenRatio: function(a, b) {
		if((a+b)/a === (a/b)) {
			return ((a + b) / a);
		}
		return this.goldenRatio(a+b, a);
	},

	// Give the nth Fibonacci number
	// Starting with 0, 1, 1, 2, ... a Fibonacci number is the sum of the previous two.
	// Bottom-up Dynamic Programming > Recursion
	fibonacci: function(n) {
		// "Starting with" sequence as described above
		let   sequence = [0, 1, 1, 2];
		let       term = Number(n); // better than type checking
		for(let i = sequence.length; i <= term ; ++i ){
			sequence.push((sequence[i-1] + sequence[i-2]));
		}
		return sequence[term];
	},

	// Give the square root of a number
	// Using a binary search algorithm, search for the square root of a given number.
	// Do not use the built-in square root function.
	// Also not using return Math.pow(x, .5) or its equivalent x**.5
	squareRoot: function(n) {
		let  start = n;
		let margin = .00001;
		while((start - n/start) > margin){
			start = (start + (n/start))/2;
		}
		return +(start.toFixed(4));
	}
};
module.exports = code;