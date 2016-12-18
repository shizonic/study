package mondial;

import java.sql.*;
import java.util.Arrays;
import java.util.List;

public class CountryTest {

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

            List<String> countryCodes = Arrays.asList("CH", "D", "S", "GB", "US", "USA");

            CountryRepository countryRepository = new CountryJdbcRepository(con);

            for (String code: countryCodes) {
                Country country = countryRepository.findCountryByCode(code);
                if (null == country) {
                    System.out.println("Country for code '" + code + "' not found.");
                } else {
                    System.out.println(country.getCode() + "\t" + country.getName());
                }
            }

            con.close();

        } catch (SQLException e) {

            System.out.println("Fehler bei Tabellenabfrage" + e);
            return;

        }

    }
}	


