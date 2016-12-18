package example.server;
import java.io.IOException;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class CalcServer {

	  public static void main( String[] args ) throws InterruptedException, IOException {
	    ApplicationContext appContext =
	      new ClassPathXmlApplicationContext(
	      		"/service.xml", "/server/config.xml" );
	    
	    System.out.println("Calculation Server ready.");
	    System.out.println("Enter <RET> to terminate");
	    int i=System.in.read();
	    System.exit( 0 );
	  }
}

