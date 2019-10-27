/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BuisnessObject;

import DAOs.PsqlStudentDao;
import DAOs.StudentDaoInterface;
import DTOs.User;
import Exceptions.DaoException;
import java.util.ArrayList;


/**
 *
 * @author racheldhc
 */
public class dbTest
{
    public static void main(String[] args) throws DaoException
    {
        StudentDaoInterface IStudentDao = new PsqlStudentDao();
        ArrayList<User> nonDrivers = IStudentDao.returnNonDrivers();
        User addTest = new User("Rachel", 19, 'F', "me@gmail.com", "HelloWorld", "Dundalk Institute of Technology", "None", 'P', 3 );
        
        System.out.println("Before add");
        for(User u : nonDrivers){
            System.out.println(u.toString());
        }
        
        //IStudentDao.addUser(addTest);
        
        System.out.println("\n\nAfter add");
        for(User u : nonDrivers){
            System.out.println(u.toString());
        }
        
        User updateTest = new User(9, "Rachel", 20, 'F', "me@gmail.com", "HelloWorld", "Dundalk Institute of Technology", "None", 'P', 3 );

        //IStudentDao.updateUser(updateTest);
        System.out.println("\n\nUpdated user");
        System.out.println(updateTest.toString());
        
        //IStudentDao.deleteUser(8);
        
        System.out.println("\n\nAfter delete");
        for(User u : nonDrivers){
            System.out.println(u.toString());
        }
        
    }    
}

