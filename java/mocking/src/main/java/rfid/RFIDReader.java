package rfid;

import java.io.PrintStream;

public class RFIDReader {

    private Port port;
    private boolean errorFlag;

    public RFIDReader(Port p) {
        errorFlag = false;
        port = p;
    }

    public void list(PrintStream out) {
        String rfidTag;
        try {
            while ((rfidTag = port.read()) != null) {
                out.println(rfidTag);
            }
        }
        catch(ReadError ex) {
            errorFlag = true;
        }
        port.close();
    }

    public boolean isError() {
        return errorFlag;
    }
}
