package ch.hfict;

import java.io.IOException;

public class SimpleConsole {

    public static void main(String[] args) {

        Timer timer = new Timer();

        timer.start();

        int c = ' ';

        while (c != 's') {
            System.out.println("Enter s to stop:");

            try {
                c = System.in.read();
            } catch (IOException e) {
                e.printStackTrace();
            }

        }

        // stop thread
        timer.stop();

        System.out.println("Bye.");

    }

}
