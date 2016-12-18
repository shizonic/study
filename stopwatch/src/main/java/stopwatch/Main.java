package stopwatch;

import stopwatch.controller.Controller;
import stopwatch.model.StopWatch;
import stopwatch.view.MainDialog;

/**
 * A simple application with 2 buttons and a digital display 
 * to measure time intervals and lap times.
 * 
 * (NOTE: The implementation is incomplete)
 * 
 * @author Ronald Tanner, SEMAFOR Informatik & Energie AG
 *
 */
public class Main {
	public static void main( String args[] ){
		StopWatch stopWatch = new StopWatch();
		MainDialog dialog = new MainDialog( );
		Controller controller = new Controller( stopWatch, dialog );
		dialog.setController( controller );
		javax.swing.SwingUtilities.invokeLater( dialog );
    }

}
