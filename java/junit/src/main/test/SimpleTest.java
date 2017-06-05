import junit.framework.TestCase;

import java.util.ArrayList;
import java.util.Collection;

/**
 * Testclass using junit with version <= 3.8.x
 */
public class SimpleTest extends TestCase
{

    public void testEmptyCollection() {
        Collection collection = new ArrayList();
        assertTrue(collection.isEmpty());
    }

    public void testEqualsString() {
        String str = new String("Hello");
        assertEquals("Hello", str);
    }

    public void testTrue() {
        assertTrue(true);
    }

    public void testFalse() {
        assertFalse(false);
    }

    public void testNull() {
        assertNull(null);
    }

    public void testNotNull() {
        assertNotNull(20);
    }

    public void testSame() {
        String s = new String("string");
        assertSame(s, s);
    }

    public void testNotSame() {
        assertNotSame(new String("string"), new String("string"));
    }

    public void testEqualsInt() {
        assertEquals("Integer values not equal", 20, 20);
    }

    public void testEqualsFloat() {

        assertEquals("Bytes values not equal", (byte)100, (byte)100);
        assertEquals("Char values not equal", (char)42, (char)42);
        assertEquals("Double values not equal", (double)1.234, (double)1.234);
        assertEquals("Float values not equal", (float)1.2, (float)1.2);
        assertEquals("Int values not equal", (int)2.0, (int)2.0);
        assertEquals("String values not equal", "Hello", "Hello");
        assertEquals("Long values not equal", (long)9999, (long)9999);
        assertEquals("Short values not equal", (short)22, (short)22);
        assertEquals("Object values not equal", (Object)20, (Object)20);
        assertEquals("Bool values not equal", true, true);
    }

}
