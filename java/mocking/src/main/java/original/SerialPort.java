package original;

import java.util.ArrayList;
import java.util.Iterator;

public class SerialPort {

    Iterator iterator;

    public SerialPort( String port, int baud ) throws CannotOpen {
        ArrayList list = new ArrayList();
        list.add("E004010002035FE7");
        list.add("0900000033E52E12");
        list.add("E004010002035BFB");
        iterator = list.iterator();
    }
    public void open(){
    }

    public String read() throws ReadError {
        if (!iterator.hasNext()) {
            return null;
        }
        return (String)iterator.next();
    }

    public void close() {
    }
}
