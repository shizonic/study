package stopwatch.controller;

import stopwatch.controller.Timer;

/**
 * interface for receiving timer events
 * @author tar
 * @see Timer
 */
public interface TimerTask {
	/** Invoked when an timer interval has ended.
	 */
	public void tick();
}
