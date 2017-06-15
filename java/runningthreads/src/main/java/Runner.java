import java.util.HashMap;

public class Runner implements Runnable {

    private Thread thread = null;
    private String name;
    private int sleeptime;
    private static HashMap<String, Integer> map = new HashMap<String, Integer>();

    public Runner(String name, int sleeptime) {
        this.name = name;
        this.sleeptime = sleeptime;
        //this.thread = null;
        map.put(name, 0);
    }

    public void run() {
        try {
            while (thread != null) {
                //System.out.printf("Thread %s\n", name);
                map.put(name, map.get(name) + 1);
                Thread.sleep(sleeptime);
            }
        } catch (InterruptedException e) { }
    }

    public void start() {
        thread = new Thread(this);
        thread.start();
    }

    public void stop() {
        thread = null;
    }

    public static HashMap<String, Integer> getMap() {
        return map;
    }
}
