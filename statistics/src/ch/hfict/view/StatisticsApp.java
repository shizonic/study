package ch.hfict.view;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.StringReader;

import ch.hfict.math.IStatistics;
import ch.hfict.math.Statistics;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

public class StatisticsApp extends Application {

    private IStatistics stats = null;

    private GridPane root = null;
    private HBox buttonsRow = null;
    private Label valuesLabel = null;
    private TextField valuesTextField = null;
    private Label averageLabel = null;
    private TextField averageTextField = null;
    private Button calculateButton = null;
    private Button clearButton = null;

    private void initializeStats() {
        this.stats.addNumber(1.0);
        this.stats.addNumber(2.0);
        this.stats.addNumber(3.0);
    }

    private void initializeGUIElements() {
        // values label
        this.valuesLabel = new Label("List of values: ");

        // values textfield
        this.valuesTextField = new TextField();

        // average label
        this.averageLabel = new Label("Average: ");

        // average textfield
        this.averageTextField = new TextField();

        // calculate button
        this.calculateButton = new Button("Calculate");
        this.calculateButton.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                stats.clear();
                BufferedReader bufferedReader = new BufferedReader(new StringReader(valuesTextField.getText()));
                try {
                    stats.read(bufferedReader);
                } catch (IOException e) {
                    // TODO: exception handling
                }
                averageTextField.setText(String.valueOf(stats.getAverage()));
            }
        });

        // clear button
        this.clearButton = new Button("Clear");
        this.clearButton.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                valuesTextField.clear();
                averageTextField.clear();
                stats.clear();
            }
        });
    }

    private void initializeGridPane() {
        this.root = new GridPane();
        this.root.setAlignment(Pos.CENTER);
        this.root.setVgap(10);
        this.root.setHgap(10);

        // values row
        this.root.add(this.valuesLabel, 0, 0);
        this.root.add(this.valuesTextField, 1, 0);

        // average row
        this.root.add(this.averageLabel, 0, 1);
        this.root.add(this.averageTextField, 1, 1);

        // buttons row
        this.buttonsRow = new HBox();
        this.buttonsRow.getChildren().add(this.calculateButton);
        this.buttonsRow.getChildren().add(this.clearButton);
        this.root.add(this.buttonsRow, 1, 2);

    }

    private void initializeScene(Stage stage) {
        stage.setScene(new Scene(this.root, 300, 150));
        stage.setTitle("StatisticsApp");
        stage.show();
    }

    private void initialize(Stage stage) {
        this.stats = new Statistics();
        //this.initializeStats();
        this.initializeGUIElements();
        this.initializeGridPane();
        this.initializeScene(stage);
    }

    @Override
    public void start(Stage stage) throws Exception {
        this.initialize(stage);
    }

    public static void main(String[] args) {
        launch(args);
    }
}