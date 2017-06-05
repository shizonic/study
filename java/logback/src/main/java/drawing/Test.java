package drawing;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class Test {

    final static Logger logger = LoggerFactory.getLogger(Test.class);

    public static void main(String[] args) {
        logger.info("Entering application");
        Scribble scribble = new Scribble();
        logger.trace("Object {} created", Test.class);
        scribble = null;
        logger.trace("Object {} deleted", Test.class);
        logger.info("Exiting application");
    }
}
