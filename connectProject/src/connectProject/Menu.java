package connectProject;

import java.util.*;

public class Menu {
	private DbHandler db = new DbHandler();
	public void homePage() {
		boolean goodReponse = false;
		while(!goodReponse) {
			int res = Util.askForInt("Voulez vous : \n 1-Vous connecter ? \n 2-Vous inscrire ?");
			if(res==1) {
				this.connectUserMenu();
				goodReponse = true;
			}else if(res==2) {
				this.registerUserMenu();
				goodReponse = true;
			}
		}
	}
	private void connectUserMenu() {
		String username = Util.askForString("Username svp");
		String password = Util.askForString("Votre mot de passe");
		LinkedHashMap<String,String> user = db.connectUser(username, password);
		if(user.containsKey("id")){
			System.out.println("Bonjour " + user.get("username"));
			this.dashBoardUser(user);
		}else {
			System.out.println("Username ou mot de passe incorect");
			this.homePage();
		}
	}
	
	private void dashBoardUser(LinkedHashMap<String,String> user) {
		int res = Util.askForInt("Voulez vous : \n 1-Voir votre profil ? \n 2-Vous deconnecter");
		if(res == 1) {
			System.out.println(user);
			this.dashBoardUser(user);
		}else if(res == 2) {
			this.homePage();
		}else {
			this.dashBoardUser(user);
		}
	}
	
	private void registerUserMenu() {		
		String mail = Util.askForString("mail : ");
		String username = Util.askForString("username : ");
		String password = Util.askForString("password : ");
		
		UserDB user = new UserDB(username,password,mail);
		user.createUser();
		this.homePage();
	}
}
