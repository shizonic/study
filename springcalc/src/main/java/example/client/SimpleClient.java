package example.client;

import java.util.Arrays;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import example.CalculationService;
import example.NumberArray;

public class SimpleClient {

    public static void main( String[] args ) throws InterruptedException {
	ApplicationContext appContext =
	    new ClassPathXmlApplicationContext( "/client/config.xml" );
	CalculationService calcService =
	    (CalculationService) appContext.getBean( "calcService" );
	NumberArray n = new NumberArray();
	n.setData( Arrays.asList(new Double[]{1.0,2.0,3.0,4.0}));

	System.out.println( "Client : " + calcService.calculate() );
	System.exit( 0 );
    }
}
