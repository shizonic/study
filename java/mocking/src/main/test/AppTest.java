import org.junit.Test;
import rfid.RFIDReader;

public class AppTest {

    @Test
    public void testReader() throws Exception {
        MockPort mockport = new MockPort();
        RFIDReader reader = new RFIDReader(mockport);
        reader.list(mockport);
        mockport.verify();
    }

}
