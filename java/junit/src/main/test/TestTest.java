import static org.junit.Assert.assertEquals;

public class TestTest {
    @org.junit.Test
    public void main() throws Exception {
        String[] args = "".split("/ /");
        int ret = Test.main(args);
        assertEquals("Return value not equal", ret, 0);
    }

}
