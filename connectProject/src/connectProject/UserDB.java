package connectProject;

import java.util.*;

public class UserDB {
	private String username;
	private String mail;
	private String password;
	private DbHandler DB = new DbHandler();
	UserDB(String username,String mail,String password){
		this.password = password;
		this.username = username;
		this.mail = mail;
	}
	
	public int createUser() {
		LinkedHashMap<String,String> user = new LinkedHashMap<String,String>();
		user.put("password", password);
		user.put("mail", mail);
		user.put("username", username);

		int res = DB.insertInDatabase(mail, user);
		return res;
	}
}
