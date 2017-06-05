package drawing;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class Scribble {

    final Logger logger = LoggerFactory.getLogger(Scribble.class);

    public Scribble() {
        logger.trace("Entering drawing mode");
        logger.debug("Starting a new drawing");
        logger.info("Connected to database");
        logger.warn("Empty input");
        logger.error("Permission denied (error code {})", 2);
    }

}
