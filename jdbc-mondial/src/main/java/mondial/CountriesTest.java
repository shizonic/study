package mondial;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class CountriesTest {

    public static void main(String[] args) {
        try {
            Class.forName("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            System.out.println("Fehler beim Laden des DB-Treibers " + e);
            return;
        }

        try {
            String url = "jdbc:mysql://localhost:3306/Mondial";
            Connection con = DriverManager.getConnection(url, "root", "root");
            CountryRepository countryRepository = new CountryJdbcRepository(con);
            for(Country c: countryRepository.findCountriesLike("S%")) {
                System.out.println(c.getCode() + "\t" + c.getName());
            }
            con.close();
        } catch (SQLException e) {
            System.out.println("Fehler bei Tabellenabfrage" + e);
            return;
        }
    }
}	


