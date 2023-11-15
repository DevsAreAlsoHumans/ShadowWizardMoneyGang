package connectProject;

import java.util.Scanner;

public class Util {
	
	private static Scanner scan = new Scanner(System.in);
	
    public static int askForInt(String sentence) {
        Boolean problems = false;
        int res = 0;
        System.out.println(sentence);
        try {
            res = scan.nextInt();
        }catch(Exception e) {
            problems = true;
            System.out.println("Veuillez entrer une donnée valide");
        }
        if(problems)return Util.askForInt(sentence);
        return res;
    }
    public static String askForString(String sentence) {
        Boolean problems = false;
        String res = "";
        System.out.println(sentence);
        try {
            res = scan.next();
        }catch(Exception e) {
            problems = true;
            System.out.println("Veuillez entrer une donnée valide");
        }
        if(problems)return Util.askForString(sentence);
        return res;
    }
}

