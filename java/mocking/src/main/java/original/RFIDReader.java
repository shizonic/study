package original;

/**
 * Diese Klasse lässt sich kaum mit JUnit testen:
 * - Das rfid.SerialPort-Objekt ist fest vorgegeben im Konstruktor.
 • - DieRückgabewertederread-Methodesindnichtbeeinflussbarundda- mit nicht deterministisch.
 • - Die Ausgabe wird auf System.out geschrieben.
 */
public class RFIDReader {
    private SerialPort port;
    private boolean errorFlag;

    public RFIDReader() throws CannotOpen {
        errorFlag = false;
        port = new SerialPort("COM1", 9600);
        port.open();
    }

    public void list() {
        String rfidTag;
        try {
            while ((rfidTag = port.read()) != null) {
                System.out.println(rfidTag);
            }
        }
        catch(ReadError ex) {
            errorFlag = true;
        }
        port.close();
    }

    public boolean isError() {
        return errorFlag;
    }
}
