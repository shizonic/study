package example;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

public class NumberArray implements Iterable<Double> {
	List<Double> numbers;
	public NumberArray() {
		numbers = new ArrayList<Double>();
	}
	/**
	 * adds a collection of double numbers
	 * @param c collection of double numbers to be added
	 */
	public void setData( List<Double> c ) {
		numbers.addAll( c );
	}
	public Iterator<Double> iterator() {
		return numbers.iterator();
	}
	
}
