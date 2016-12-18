package example;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class StatisticsService implements CalculationService {
    @Autowired
    Iterable<Double> numbers = null;

    public void setNumbers(Iterable<Double> l) {
        this.numbers = l;
    }

    public double calculate() {
        int size = 0;
        double sum = 0.0;
        for (Double d : numbers) {
            sum += d;
            size++;
        }
        return sum / size;
    }

}
