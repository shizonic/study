package example;

import java.util.ArrayList;
import java.util.List;

import example.config.AppConfig;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class CalcApp {
	public static void main(String[] args) throws Exception {
		ApplicationContext context = new AnnotationConfigApplicationContext(AppConfig.class);
		CalculationService calcService = (CalculationService) context
				.getBean("factorialService");
		System.out.println("Result: " + calcService.calculate());
	}
}
