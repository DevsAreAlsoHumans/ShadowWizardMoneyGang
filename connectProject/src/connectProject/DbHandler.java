package connectProject;

import java.sql.*;
import java.util.*;

public class DbHandler {
	private String DBUrl= "jdbc:mysql://localhost:3306/designpatternsshadowwizardmoneygang";
	
	private String user = "root";
	
	private String password = "";
	
	private Connection DB;
	
	DbHandler(){
		this.DB = this.DBconnect();
	}
	
	private Connection DBconnect() {
		try { 
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection connection = DriverManager.getConnection(this.DBUrl, this.user, this.password);
			return connection;
		} catch (Exception e) {
			System.out.println("connection failure ! -> " + e)  ;
		}
		return null;
	}
	
  	public int insertInDatabase(String table, LinkedHashMap<String,String> data) {
		try {
			Set<String> keys = data.keySet();
			Collection<String> values = data.values();
			String req = "INSERT INTO "+table+" ("+String.join(",", keys)+") VALUES ('"+String.join("', '", values)+"')";
			PreparedStatement st = this.DB.prepareStatement(req);
			int res = st.executeUpdate();
			return res;
		} catch(Exception e) {
			System.out.println("Error occured -> : "+e);
		}
		return 0;
	}
  	
  	public boolean updateInDB(String table, LinkedHashMap<String,String> data, String condition) {
  		try {
			String query = "UPDATE "+ table +" SET ";
			int indexForEach = 0;
			 for (Map.Entry mapentry : data.entrySet()) {
				 query+= "`" +mapentry.getKey() + "` = '" + mapentry.getValue()+"'";
				 indexForEach++;
				 if(indexForEach!=data.size())query+=",";
 			}
			query += "WHERE " + condition;
			System.out.println("Executing -> : "+query);
			PreparedStatement st = this.DB.prepareStatement(query);
			int res = st.executeUpdate();
			return true;
		}catch(Exception e) {
			System.out.println("Error occured -> : "+e);
		}
		return false;
  	}
  	public LinkedHashMap<String,String> connectUser(String username, String password) {
  		String query = "SELECT * FROM user WHERE username = '" + username + "' AND password = '" + password + "'";
		Statement st;
		ResultSet res;
		LinkedHashMap<String,String> toReturn = new LinkedHashMap<String,String>();
		try {
			st = this.DB.createStatement();
			res = st.executeQuery(query);
			LinkedHashMap<String,String> user = new LinkedHashMap<String,String>();
			while(res.next()) {
				user.put("id",res.getString("id"));
				user.put("username",res.getString("username"));
				user.put("mail",res.getString("mail"));
				user.put("isVerified",res.getString("isVerified"));
				toReturn = user;
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
  		return toReturn;
  	}
}