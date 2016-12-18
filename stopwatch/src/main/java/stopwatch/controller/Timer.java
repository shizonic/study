package stopwatch.controller;

import java.util.ArrayList;

/** 
 * invokes TimerTask objects repeatedly at regular intervals.
 * (NOTE: this class is for demo purposes only!)
 * 
 * @author Ronald Tanner SEMAFOR Informatik & Energie AG
 *
 */
class Timer implements Runnable {
  private Thread timer=null;
  private int interval=1000;
  private ArrayList<TimerTask> tasks=null;

  public Timer( int interval ){
  	this.interval=interval;
  	this.tasks = new ArrayList<TimerTask>();
  }
  
  public void addTask( TimerTask t ){
	  tasks.add(t);
  }

  public void run(){
    while( timer != null ){
    	try {
            Thread.sleep( interval );
            for( TimerTask t: tasks ){
        		t.tick();
        	}
    	}
    	catch ( InterruptedException ex ){
    		//System.out.println( "Interrupted Exception" );
    	}
    }
  }
  
  public void stop(){ 
    timer=null; 
  }

  public void start(){ 
    timer = new Thread(this); 
    timer.start();
  }
  
}
