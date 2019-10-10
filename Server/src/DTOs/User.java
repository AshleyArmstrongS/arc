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
    private String car;
    private double est_pay;
    private String college;
    private int location_id;
    private int timetable_id;
    private String description;
    private String student_type;

    public User(int user_id, String name, int age, String gender, String email, String car, double est_pay, String college, int location_id, int timetable_id, String description, String student_type) {
        this.user_id = user_id;
        this.name = name;
        this.age = age;
        this.gender = gender;
        this.email = email;
        this.car = car;
        this.est_pay = est_pay;
        this.college = college;
        this.location_id = location_id;
        this.timetable_id = timetable_id;
        this.description = description;
        this.student_type = student_type;
    }

    public User() {
        this.user_id = 0;
        this.name = "";
        this.age = 0;
        this.gender = "";
        this.email = "";
        this.car = "";
        this.est_pay = 0.0;
        this.college = "";
        this.location_id = 0;
        this.timetable_id = 0;
        this.description = "";
        this.student_type = "";
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getStudent_type() {
        return student_type;
    }

    public void setStudent_type(String student_type) {
        this.student_type = student_type;
    }

    public int getStudent_id() {
        return user_id;
    }

    public void setStudent_id(int student_id) {
        this.user_id = student_id;
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

    public String getCar() {
        return car;
    }

    public void setCar(String car) {
        this.car = car;
    }

    public double getEst_pay() {
        return est_pay;
    }

    public void setEst_pay(double est_pay) {
        this.est_pay = est_pay;
    }

    public String getCollege() {
        return college;
    }

    public void setCollege(String college) {
        this.college = college;
    }

    public int getLocation_id() {
        return location_id;
    }

    public void setLocation_id(int location_id) {
        this.location_id = location_id;
    }

    public int getTimetable_id() {
        return timetable_id;
    }

    public void setTimetable_id(int timetable_id) {
        this.timetable_id = timetable_id;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 37 * hash + this.user_id;
        hash = 37 * hash + Objects.hashCode(this.name);
        hash = 37 * hash + this.age;
        hash = 37 * hash + Objects.hashCode(this.gender);
        hash = 37 * hash + Objects.hashCode(this.email);
        hash = 37 * hash + Objects.hashCode(this.car);
        hash = 37 * hash + (int) (Double.doubleToLongBits(this.est_pay) ^ (Double.doubleToLongBits(this.est_pay) >>> 32));
        hash = 37 * hash + Objects.hashCode(this.college);
        hash = 37 * hash + this.location_id;
        hash = 37 * hash + this.timetable_id;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
        {
            return true;
        }
        if (obj == null)
        {
            return false;
        }
        if (getClass() != obj.getClass())
        {
            return false;
        }
        final User other = (User) obj;
        if (this.user_id != other.user_id)
        {
            return false;
        }
        if (this.age != other.age)
        {
            return false;
        }
        if (this.gender != other.gender)
        {
            return false;
        }
        if (Double.doubleToLongBits(this.est_pay) != Double.doubleToLongBits(other.est_pay))
        {
            return false;
        }
        if (this.location_id != other.location_id)
        {
            return false;
        }
        if (this.timetable_id != other.timetable_id)
        {
            return false;
        }
        if (!Objects.equals(this.name, other.name))
        {
            return false;
        }
        if (!Objects.equals(this.email, other.email))
        {
            return false;
        }
        if (!Objects.equals(this.car, other.car))
        {
            return false;
        }
        if (!Objects.equals(this.college, other.college))
        {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "User{" + "user_id=" + user_id + ", name=" + name + ", age=" + age + ", gender=" + gender + ", email=" + email + ", car=" + car + ", est_pay=" + est_pay + ", college=" + college + ", location_id=" + location_id + ", timetable_id=" + timetable_id + ", description=" + description + ", student_type=" + student_type + '}';
    }

  
   
    
}
