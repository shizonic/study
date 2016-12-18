package mondial;

import java.sql.*;
import java.util.ArrayList;

public class CountriesAndCitiesTest {

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
            CityRepository cityRepository = new CityJdbcRepository(con);

            for(Country country: countryRepository.findCountriesLike("S%")) {

                System.out.println("Land: " + country.getName() + " (" + country.getCode() + ")");

                System.out.print("Städte: ");
                String delim = "";
                for(City city: cityRepository.findCitiesByCountry(country.getCode())) {
                    System.out.print(delim + city.getName());
                    delim = ", ";
                }

                System.out.println("\n");
            }

            con.close();
        } catch (SQLException e) {
            System.out.println("Fehler bei Tabellenabfrage" + e);
            return;
        }
    }

}
