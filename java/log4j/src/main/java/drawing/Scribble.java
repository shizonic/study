package drawing;

import org.apache.log4j.Logger;

public class Scribble {

    final Logger logger = Logger.getLogger(Scribble.class);

    public Scribble() {
        logger.trace("Entering drawing mode");
        logger.debug("Start a new drawing");
        logger.info("Connected to database");
        logger.warn("Empty input");
        logger.error("Permission denied");
        logger.fatal("Exhausted memory");
    }

}
