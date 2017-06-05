package rfid;

import java.io.PrintStream;
import java.util.ArrayList;

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

    public String[] getTags() {
        ArrayList<String> list = new ArrayList<String>();
        try {
            String rfidTag;
            while ((rfidTag = port.read()) != null) {
                list.add(rfidTag);
            }
        } catch (ReadError ex) {
            errorFlag = true;
        }
        String receivedTags[] = new String[list.size()];
        list.toArray(receivedTags);
        return receivedTags;
    }
}
