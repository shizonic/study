import org.testng.Assert;
import org.testng.annotations.AfterClass;
import org.testng.annotations.BeforeClass;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.BeforeMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

public class MathTest {

    private Math math;

    @BeforeClass
    public static void setUpClass() throws Exception {
        System.out.println("MathTest: BeforeClass");
    }

    @AfterClass
    public static void tearDownClass() throws Exception {
        System.out.println("MathTest: AfterClass");
    }

    @BeforeMethod
    public void setUpMethod() throws Exception {
        System.out.println("MathTest: BeforeMethod");
        math = new Math(22, 33);
    }

    @AfterMethod
    public void tearDownMethod() throws Exception {
        System.out.println("MathTest: AfterMethod");
        math = null;
    }

    @BeforeTest
    public void setUp() throws Exception {
        System.out.println("MathTest: BeforeTest");
    }

    @AfterTest
    public void tearDown() throws Exception {
        System.out.println("MathTest: AfterTest");
    }

    @Test
    public void div() throws Exception {
        System.out.println("MathTest: div");
        Assert.assertEquals(0.6666666666666666, math.div(),0.001,"Div not equals");
    }

    @Test
    public void sub() throws Exception {
        System.out.println("MathTest: sub");
        Assert.assertEquals(-11, math.sub(),0.001,"Sub not equals");
    }

    @Test
    public void mul() throws Exception {
        System.out.println("MathTest: mul");
        Assert.assertEquals(726, math.mul(),0.001,"Mul not equals");
    }

    @Test
    public void sum() throws Exception {
        System.out.println("MathTest: sum");
        Assert.assertEquals(55, math.sum(),0.001,"Sum not equals");
    }

}
