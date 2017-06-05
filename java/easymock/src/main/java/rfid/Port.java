package rfid;

public interface Port {
    void open();
    String read() throws ReadError;
    void close();
}
