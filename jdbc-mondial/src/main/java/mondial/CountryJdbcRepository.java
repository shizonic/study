package mondial;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class CountryJdbcRepository implements CountryRepository {
    private Connection con = null;

    public CountryJdbcRepository(Connection con) {
        this.con = con;
    }

    @Override
    public Country[] findCountriesLike(String name) {
        PreparedStatement stmt;
        try {
            stmt = con.prepareStatement(
                    "SELECT code, name FROM Country WHERE name like ?");
            stmt.setString(1, "S%");

            ResultSet rSet = stmt.executeQuery();

            List<Country> countries = new ArrayList<Country>();
            while (rSet.next()) {
                Country c = new Country(rSet.getString(1), rSet.getString(2));
                countries.add(c);
            }
            //System.out.println(rSet.getString(1) + "\t" + rSet.getString(2));

            stmt.close();

            return countries.toArray(new Country[countries.size()]);
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return null;
    }
}