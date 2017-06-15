import java.util.ArrayList;
import java.util.HashMap;

public class App {

    public static void main(String[] args) {

        Runner runner1 = new Runner("1", 20);
        Runner runner2 = new Runner("2", 21);
        Runner runner3 = new Runner("3", 19);
        Runner runner4 = new Runner("4", 22);
        Runner runner5 = new Runner("5", 18);

        System.out.print("Start");

        runner1.start();
        runner2.start();
        runner3.start();
        runner4.start();
        runner5.start();

        // do something time consuming
        int r = 20000000;
        for (int i = 0; i<r; i++) {
            System.out.print("");
            if (i%(r/100) == 0) {
                System.out.print(".");
            }
        }

        System.out.println("Stop\n");

        runner1.stop();
        runner2.stop();
        runner3.stop();
        runner4.stop();
        runner5.stop();

        HashMap<String,  Integer> map = Runner.getMap();

        for (HashMap.Entry<String,Integer> entry : map.entrySet()) {
            String key = entry.getKey();
            Integer val = entry.getValue();
            System.out.printf("Thread %s = %d times\n", key, val);
        }

    }

}
