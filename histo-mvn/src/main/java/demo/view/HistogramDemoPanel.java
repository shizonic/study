package demo.view;

import java.awt.BorderLayout;
import java.awt.Dimension;

import javax.swing.JPanel;
import javax.swing.JSlider;
import javax.swing.event.ChangeEvent;
import javax.swing.event.ChangeListener;

import org.jfree.chart.ChartFactory;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.axis.NumberAxis;
import org.jfree.chart.plot.PlotOrientation;
import org.jfree.chart.plot.XYPlot;
import org.jfree.chart.renderer.xy.StandardXYBarPainter;
import org.jfree.chart.renderer.xy.XYBarRenderer;
import org.jfree.data.statistics.HistogramDataset;
import org.jfree.data.xy.IntervalXYDataset;
import org.jfree.ui.ApplicationFrame;

import demo.model.HistogramModel;

public class HistogramDemoPanel extends ApplicationFrame implements
		ChangeListener {

	private static final long serialVersionUID = 1L;

	private HistogramModel[] model;
	private ChartPanel chartPan;
	private JSlider xSlider;
	private JSlider ySlider;

	/**
	 * Constructor
	 * 
	 * @param title
	 *            the frame title.
	 */
	public HistogramDemoPanel(String title, HistogramModel model0,
			HistogramModel model1) {
		super(title);
		this.model = new HistogramModel[2];
		this.model[0] = model0;
		this.model[1] = model1;

		buildGui();
	}

	/**
	 * Builds the graphical User Interface
	 */
	private void buildGui() {
		this.setSize(new Dimension(500, 300));
		this.setVisible(true);

		JPanel mainPan = new JPanel(new BorderLayout());

		// chart panel
		this.chartPan = new ChartPanel(null);
		mainPan.add(this.chartPan, BorderLayout.CENTER);

		// xSlider
		xSlider = new JSlider(0, 10, 0);
		xSlider.addChangeListener(this);
		mainPan.add(xSlider, BorderLayout.SOUTH);

		// ySlider
		ySlider = new JSlider(0, 10, 0);
		ySlider.setOrientation(JSlider.VERTICAL);
		ySlider.addChangeListener(this);
		mainPan.add(ySlider, BorderLayout.WEST);

		this.setContentPane(mainPan);
		update();
	}

	/**
	 * Updates the panel according the options.
	 */
	public void update() {
		JFreeChart chart = ChartFactory.createHistogram("Histogram Demo 1",
				null, null,
				createDataset(xSlider.getValue(), ySlider.getValue()),
				PlotOrientation.VERTICAL, true, true, false);
		XYPlot plot = (XYPlot) chart.getPlot();
		plot.setForegroundAlpha(0.85f);
		NumberAxis yAxis = (NumberAxis) plot.getRangeAxis();
		yAxis.setStandardTickUnits(NumberAxis.createIntegerTickUnits());
		XYBarRenderer renderer = (XYBarRenderer) plot.getRenderer();
		renderer.setDrawBarOutline(false);
		// flat bars look best...
		renderer.setBarPainter(new StandardXYBarPainter());
		renderer.setShadowVisible(false);

		chartPan.setChart(chart);
	}

	private IntervalXYDataset createDataset(int x, int y) {
		// Vorbedingung (pre-conditions)
		assert model.length > 1 : "Unallocated models";

		HistogramDataset dataset = new HistogramDataset();
		dataset.addSeries("H1", model[0].getValues(1000, 5 + x, 1), 100, 0.0,
				20.0);
		dataset.addSeries("H2", model[1].getValues(1000, 7 + y, 1), 100, 0.0,
				20.0);

		// Nachbedingung (post-conditions)
		assert dataset.getSeriesCount() == 2 : "Empty dataset";
		return dataset;
	}

	public void stateChanged(ChangeEvent e) {
		update();
	}

}
