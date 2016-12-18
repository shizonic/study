package example.config;

import example.NumberArray;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

import java.util.Arrays;

@Configuration
@ComponentScan(basePackages = "example")
public class AppConfig {
    @Bean
    public Iterable<Double> numbers() {
        NumberArray numbers = new NumberArray();
        numbers.setData(
                Arrays.asList(new Double[]{1.0, 2.0, 3.0}));
        return numbers;
    }
}
