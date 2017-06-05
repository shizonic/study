package rfid;

import java.io.PrintStream;

public class RFIDApp {

    public static void main(String[] args) {
        try {

            Port port = new SerialPort("COM1", 9600);
            RFIDReader reader = new RFIDReader(port);
            PrintStream stream = new PrintStream(System.out);
            reader.list(stream);

        } catch (CannotOpen e) {

            System.out.println(e.getMessage());

        }
    }

}
