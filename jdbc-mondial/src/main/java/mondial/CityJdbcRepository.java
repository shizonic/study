package mondial;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class CityJdbcRepository implements CityRepository {
    private Connection con = null;

    public CityJdbcRepository(Connection con) {
        this.con = con;
    }

    @Override
    public City[] findCitiesByCountry(String country) {
        PreparedStatement stmt;
        try {
            stmt = con.prepareStatement(
                    "SELECT name, country FROM City WHERE Country = ? ORDER BY Name ASC");
            stmt.setString(1, country);

            ResultSet rSet = stmt.executeQuery();

            List<City> cities = new ArrayList<City>();
            while (rSet.next()) {
                City c = new City(rSet.getString(1), rSet.getString(2));
                cities.add(c);
            }

            stmt.close();

            return cities.toArray(new City[cities.size()]);
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return null;
    }

}
