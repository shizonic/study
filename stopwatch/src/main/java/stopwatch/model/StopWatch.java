package stopwatch.model;


/**
 * @author Ronald Tanner, SEMAFOR Informatik & Energie AG
 *
 */
public class StopWatch  {
    private int seconds = 0;
    private int minutes = 0;
    private int hours = 0;
    
    public StopWatch(){
    }

    /** updates the display 
     */
    public String getElapsedTime() {
	    StringBuffer newValue = new StringBuffer();
	    if( hours < 10 )
	    	newValue.append('0');
	    newValue.append(hours);
	    newValue.append(':');
		if(minutes < 10)
			newValue.append('0');
		newValue.append(minutes);
		newValue.append(':');
		if(seconds < 10)
			newValue.append('0');
		newValue.append(seconds);
		return newValue.toString();
    }

    public void reset(){
        seconds = 0;
        minutes = 0;
        hours = 0;
    }
	
	/** increments the elapsed time
	 */ 
	public void incrementTime() {
		if (((seconds + 1) / 60) > 0) {
		    seconds = 0;
		    if (((minutes + 1) / 60) > 0) {
			minutes = 0;
			if (((hours + 1) / 24) > 0) {
			    hours = 0;
			} else {
			    hours++;
			}
		    } else {
			minutes++;
		    }
		} else {
		    seconds++;
		}
	}


}
