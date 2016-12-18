package demo.model;

import java.util.Random;

public class HistogramDemoModel implements HistogramModel {
	double[] values = null;
	Random generator = new Random(12345678L);

	/**
	 * Creates a sample data
	 * 
	 * @param size
	 * @param offset
	 * @param amplitude
	 * @return the data
	 */
	public double[] getValues(int size, double offset, double amplitude) {
		values = new double[size];
		for (int i = 0; i < size; i++) {
			values[i] = amplitude * generator.nextGaussian() + offset;
		}
		return values;
	}
}
