
public class Helper {

    /**
     * Unchecked exception
     * @param size
     * @return
     */
    public static int getSize(int size) {
        if (size <= 0) {
            throw new IllegalArgumentException("Size must be greater then zero");
        }
        return size;
    }

    /**
     * Checked exception
     * @param ascii
     * @return
     * @throws IllegalArgumentException
     */
    public static char getChar(int ascii) throws IllegalArgumentException {
        if ((ascii < 33 || ascii > 255)) {
            throw new IllegalArgumentException("Ascii must be between 24 and 127");
        }
        return (char) ascii;
    }

}
