import org.testng.Assert;
import org.testng.annotations.AfterClass;
import org.testng.annotations.BeforeClass;
import org.testng.annotations.Test;

public class AppTest {

    @BeforeClass
    public static void setUpClass() throws Exception {
        System.out.println("TestTest: BeforeClass");
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
        System.out.println("TestTest: AfterClass");
    }

    @Test
    public void getSum() throws Exception {
        System.out.println("TestTest: getSum");
        double sum = App.getSum(4.0, 9.0);
        Assert.assertEquals(sum, 13.0, 0.001,"sum value not equal");
    }

}
