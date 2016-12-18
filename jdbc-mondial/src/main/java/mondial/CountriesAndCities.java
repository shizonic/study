package mondial;
import java.sql.*;

public class CountriesAndCities{

    public static void main( String [] args ){
	try {
	    Class.forName( "com.mysql.jdbc.Driver" );
	}
	catch ( ClassNotFoundException e ) {
	    System.out.println( "Fehler beim Laden des DB-Treibers " + e );
	    return;
	}

	Connection con;
	PreparedStatement stmt;
	ResultSet rSet;
	
	try {
	    String url = "jdbc:mysql://localhost:3306/Mondial";
	    con = DriverManager.getConnection( url, "biggus", "dickus" );
	    stmt = con.prepareStatement(
		"SELECT code, name FROM country WHERE name like ?" );
	    stmt.setString( 1, "S%" );

	    rSet = stmt.executeQuery( );
	    
	    while ( rSet.next() ){
		System.out.println ( rSet.getString(1) + "\t" + rSet.getString(2) );
		  printCities( con, rSet.getString(1) );
	    }
	    stmt.close();
	    con.close();
	}
	catch ( SQLException e ){
	    System.out.println( "Fehler bei Tabellenabfrage" + e );
	    return;
	}
  }

	private static void printCities(Connection con, String country) throws SQLException {
		PreparedStatement stmt = con.prepareStatement(
				"SELECT name FROM city WHERE country=?");
		stmt.setString(1,country );
		
		ResultSet rSet = stmt.executeQuery( );
	    
	    while ( rSet.next() ){
		   System.out.print ( " " + rSet.getString(1) );
    	}
	}
}


