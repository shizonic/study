
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Assert;
import org.junit.Test;

public class MathTest {

    private Math math;

    @BeforeClass
    public static void setUpClass() throws Exception {
        System.out.println("----------------------");
        System.out.println("MathTest - BeforeClass");
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
        System.out.println("MathTest - AfterClass");
        System.out.println("---------------------");
    }

    @Before
    public void setUp() throws Exception {
        System.out.print("Before - ");
        math = new Math(22, 33);
    }

    @After
    public void tearDown() throws Exception {
        System.out.println(" - After");
        math = null;
    }

    @Test
    public void div() throws Exception {
        System.out.print("Test div");
        Assert.assertEquals(0.6666666666666666, math.div(), 0.001);
    }

    @Test
    public void sub() throws Exception {
        System.out.print("Test sub");
        Assert.assertEquals(-11, math.sub(),0.001);
    }

    @Test
    public void mul() throws Exception {
        System.out.print("Test mul");
        Assert.assertEquals(726, math.mul(),0.001);
    }

    @Test
    public void sum() throws Exception {
        System.out.print("Test sum");
        Assert.assertEquals(55, math.sum(), 0.001);
    }

}
