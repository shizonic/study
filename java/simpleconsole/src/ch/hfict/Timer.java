package ch.hfict;

public class Timer implements Runnable {

    private Thread thread = null;

    public void run() {
        try {
            while (thread != null) {
                display();
                Thread.sleep(1000);
            }
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    private void display() {
        System.out.println(new java.util.Date());
    }

    public void start() {
        thread = new Thread(this);
        thread.start();
    }

    public void stop() {
        thread = null;
    }

}
