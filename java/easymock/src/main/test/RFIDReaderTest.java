import org.easymock.EasyMock;
import org.junit.Assert;
import org.junit.Before;
import org.junit.Test;
import rfid.Port;
import rfid.RFIDReader;
import rfid.ReadError;

public class RFIDReaderTest {

    private Port mock;
    private RFIDReader reader;

    @Before
    public void setUp() {
        mock = EasyMock.createMock(Port.class);
        reader = new RFIDReader(mock);
    }

    @Test
    public void testReader() throws ReadError {
        String expectedTags[] = {
            "E004010002035FE7",
            "0900000033E52E12",
            "E004010002035BFB"
        };

        for (int i=0; i<expectedTags.length; i++) {
            String expected = mock.read();
            String returned = expectedTags[i];
            //System.out.println(expected + " | " + returned);
            EasyMock.expect(expected).andReturn(returned);
        }

        String expected = mock.read();
        String returned = null;
        //System.out.println(expected + " | " + returned);
        EasyMock.expect(expected).andReturn(returned);

        // do we need this?
        // mock.close();

        EasyMock.replay(mock);

        String returnedTags[] = reader.getTags();

        //System.out.println(Arrays.toString(expectedTags));
        //System.out.println(Arrays.toString(returnedTags));

        Assert.assertEquals("number of RFID tags", expectedTags.length, returnedTags.length);

        EasyMock.verify(mock);
    }

}
