package example;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component("factorialService") // redundant
public class FactorialService implements CalculationService {
    @Autowired
    Iterable<Double> numbers = null;

    public void setNumbers(Iterable<Double> l) {
        this.numbers = l;
    }

    public double calculate() {
        double prod = 1.0;
        for (Double d : numbers) {
            prod *= d;
        }
        return prod;
    }

}
