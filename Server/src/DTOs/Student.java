/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DTOs;

import java.util.Objects;

/**
 *
 * @author racheldhc
 */
public class Student{
    
    private int student_id;
    private String name;
    private int age;
    private int gender;
    private String email;
    private String car;
    private double est_pay;
    private String college;
    private int location_id;
    private int timetable_id;

    public Student(int student_id, String name, int age, int gender, String email, String car, double est_pay, String college, int location_id, int timetable_id) {
        this.student_id = student_id;
        this.name = name;
        this.age = age;
        this.gender = gender;
        this.email = email;
        this.car = car;
        this.est_pay = est_pay;
        this.college = college;
        this.location_id = location_id;
        this.timetable_id = timetable_id;
    }
    public Student() {
        this.student_id = 0;
        this.name = "";
        this.age = 0;
        this.gender = 0;
        this.email = "";
        this.car = "";
        this.est_pay = 0.0;
        this.college = "";
        this.location_id = 0;
        this.timetable_id = 0;
    }

    public int getStudent_id() {
        return student_id;
    }

    public void setStudent_id(int student_id) {
        this.student_id = student_id;
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

    public int getGender() {
        return gender;
    }

    public void setGender(int gender) {
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
        hash = 37 * hash + this.student_id;
        hash = 37 * hash + Objects.hashCode(this.name);
        hash = 37 * hash + this.age;
        hash = 37 * hash + this.gender;
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
        final Student other = (Student) obj;
        if (this.student_id != other.student_id)
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
        return "Student{" + "student_id=" + student_id + ", name=" + name + ", age=" + age + ", gender=" + gender + ", email=" + email + ", car=" + car + ", est_pay=" + est_pay + ", college=" + college + ", location_id=" + location_id + ", timetable_id=" + timetable_id + '}';
    }
    
    
}
