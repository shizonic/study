import org.junit.Assert;
import rfid.Port;
import rfid.ReadError;
import java.io.PrintStream;
import java.util.ArrayList;
import java.util.Iterator;

public class MockPort extends PrintStream implements Port {

    private ArrayList list;
    private Iterator outIterator;
    private Iterator inIterator;
    private boolean isClosed;
    private boolean isOpen;

    public MockPort() {
        super(System.out);
        list = new ArrayList();
        list.add("E004010002035FE7");
        list.add("0900000033E52E12");
        list.add("E004010002035BFB");
        inIterator = list.iterator();
        outIterator = list.iterator();
    }

    public void open() {
        isClosed = false;
        isOpen = true;
    }

    public void close() {
        isClosed = true;
        isOpen = false;
    }

    public String read() throws ReadError {
        if (!inIterator.hasNext()) {
            return null;
        }
        return (String)inIterator.next();
    }

    public void verify() {
        if (!isClosed) {
            Assert.fail("Port not closed");
        }
    }

    public void println(String s) {
        if (!outIterator.hasNext()) {
            Assert.fail("overrun");
        }
        if (!s.equals(outIterator.next())) {
            Assert.fail("changed sequence");
        }
        super.println(s);
    }
}
