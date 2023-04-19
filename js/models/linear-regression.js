/**
 * Miniature model for Linear Regression for use in demonstrations
 * in Linear Regression for the lesson pages.  Handles all of the
 * basic functions of a regression model including Gradient Descent,
 * Prediction, and Error calculations.
 * 
 * Author: 	Matthew Williams
 * Date:	April 1st, 2023
 */
class LinearRegressionModel {
	
	/**
	 * Constructs a Linear Regression model.
	 * 
	 * Parameters:
	 * Weight: initial weight parameter (slope of prediction line)
	 * Bias: initial bias parameter (y-offset of prediction line)
	 * Learning_Rate: multiplier applied to gradient during descent
	 */
	constructor(weight, bias, learning_rate) {
		this.w = weight;
		this.b = bias;
		this.lr = learning_rate;
	}
	
	/**
	 * Applies one iteration of Gradient Descent on the
	 * model, updating the bias and weight for the model.
	 */
	iterateDescent(points) {
		let predictions = this.predictAll(points);
		let gradient = this.findGradient(points, predictions);
		this.b += gradient[0] * this.lr * 10200;
		this.w += gradient[1] * this.lr;
	}
	
	/**
	 * Generates a prediction for each data point.
	 * Points taken as 2D array, but only the first
	 * item of each row is used as the x.  Second is
	 * untouched.
	 */
	predictAll(points) {
		let returnList = [];
		for (var point of points) {
			returnList.push(this.predict(point[0]));
		}
		return returnList;
	}
	
	/**
	 * Returns a prediction for the given X value
	 * (More of a convenience method than a necessity)
	 */
	predict(x) {
		//Basically the equation y=mx+b
		return (this.w * x) + this.b;
	}
	
	/**
	 * Calculates the Least Squares Error for the
	 * given (x,y) list pair and prediction lists
	 * given.
	 */
	getError(points, predictions) {
		let tempList = predictions;
		let sum = 0;
		
		tempList.forEach((item, index, arr) => {
			sum += (item - points[index][1]) ** 2;
		});

		sum /= points.length;
		return sum;
	}
	
	/**
	 * Calculates the gradient for the given
	 * points and predictions list.  Returns
	 * the graidents in a list.
	 * [0] -> bias gradient
	 * [1] -> weight graident
	 */
	findGradient(points, predictions) {
		let len = predictions.length;
		let diffs = [];
		let weightedDiffs = [];
		for (var i = 0; i < len; i++) {
			diffs.push(points[i][1] - predictions[i]);
			weightedDiffs.push(diffs[i] * points[i][0]);
		}
		let gradient = [];
		gradient.push(diffs.reduce((a,b) => a+b, 0) / len);
		gradient.push(weightedDiffs.reduce((a,b) => a+b, 0) / len);
		return gradient;
	}
	
}
