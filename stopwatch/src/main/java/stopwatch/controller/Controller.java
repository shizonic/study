package stopwatch.controller;

import stopwatch.view.MainDialog;
import stopwatch.model.StopWatch;

/**
 * @author Ronald Tanner, SEMAFOR Informatik & Energie AG
 */
public class Controller implements TimerTask {
    private StopWatch stopWatch;
    private MainDialog dialog;
    private Timer timer;
    private State.StateType state = State.StateType.READY;

    public Controller(StopWatch stopWatch, MainDialog dialog) {
        this.stopWatch = stopWatch;
        this.dialog = dialog;
        this.timer = new Timer(1000); // interval in ms
        this.timer.addTask(this); // attach observer to subject
    }

    public void reset() {
        stopWatch.reset();
        dialog.updateDisplay(stopWatch.getElapsedTime());
    }

    /**
     * stops the timer
     */
    public void stopTimer() {
        this.timer.stop();
        this.dialog.setButton1Text("Start");
    }

    /**
     * starts the timer
     */
    public void startTimer() {
        this.timer.start();
        this.dialog.setButton1Text("Stop");
    }

    /**
     * stops the display
     */
    public void stopUpdate() {
        this.dialog.stopUpdate();
    }

    /**
     * reactivates the display
     */
    public void startUpdate() {
        this.dialog.startUpdate();
    }

    /**
     * increments and displays the elapsed time
     */
    public void tick() {
        stopWatch.incrementTime();
        this.dialog.updateDisplay(stopWatch.getElapsedTime());
    }

    public void processEvent(MainDialog.EventType evt) {
        switch (this.state) {
            case READY:
                if (evt == MainDialog.EventType.Button1) {
                    this.startTimer();
                    this.state = State.StateType.RUNNING;
                }
                break;
            case RUNNING:
                if (evt == MainDialog.EventType.Button1) {
                    this.stopTimer();
                    this.state = State.StateType.STOPPED;
                } else if (evt == MainDialog.EventType.Button2) {
                    this.stopUpdate();
                    this.state = State.StateType.LAP;
                }
                break;
            case LAP:
                if (evt == MainDialog.EventType.Button1) {
                    this.stopTimer();
                    this.state = State.StateType.STOPPED;
                } else if (evt == MainDialog.EventType.Button2) {
                    this.startUpdate();
                    this.state = State.StateType.RUNNING;
                }
                break;
            case SUSPENDED:
                break;
            case STOPPED:
                if (evt == MainDialog.EventType.Button1) {
                    this.startTimer();
                    this.state = State.StateType.RUNNING;
                } else if (evt == MainDialog.EventType.Button2) {
                    this.reset();
                    this.state = State.StateType.READY;
                }
                break;
        }
        System.out.println(this.state);
    }
}
