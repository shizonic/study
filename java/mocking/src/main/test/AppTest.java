import org.junit.Test;
import rfid.RFIDReader;
import java.io.PrintStream;

public class AppTest {

    @Test
    public void testReader() throws Exception {
        MockPort mockport = new MockPort();
        PrintStream stream = new PrintStream(System.out);
        RFIDReader reader = new RFIDReader(mockport);
        reader.list(stream);
        mockport.verify();
    }

}
