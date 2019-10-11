package DTOs;

import java.util.Objects;

/**
 *
 * @author 
 */
public class User{
    
    private int user_id;
    private String name;
    private int age;
    private String gender;
    private String email;
    private String password;
    private String college;
    private String description;
    private String user_type;
    private int location_id;

    public User(int user_id, String name, int age, String gender, String email, String password, String college, String description, String user_type, int location_id) {
        this.user_id = user_id;
        this.name = name;
        this.age = age;
        this.gender = gender;
        this.email = email;
        this.password = password;
        this.college = college;
        this.description = description;
        this.user_type = user_type;
        this.location_id = location_id;
    }
    
    public User(int user_id, String name, int age, String gender, String email, String college, String description, String user_type, int location_id) {
        this.user_id = user_id;
        this.name = name;
        this.age = age;
        this.gender = gender;
        this.email = email;
        this.password = "";
        this.college = college;
        this.description = description;
        this.user_type = user_type;
        this.location_id = location_id;
    }

     public User() {
        this.user_id = 0;
        this.name = "";
        this.age = 0;
        this.gender = "";
        this.email = "";
        this.password = "";
        this.college = "";
        this.description = "";
        this.user_type = "";
        this.location_id = 0;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getCollege() {
        return college;
    }

    public void setCollege(String college) {
        this.college = college;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getUser_type() {
        return user_type;
    }

    public void setUser_type(String user_type) {
        this.user_type = user_type;
    }

    public int getLocation_id() {
        return location_id;
    }

    public void setLocation_id(int location_id) {
        this.location_id = location_id;
    }
   
  
   
    
}
