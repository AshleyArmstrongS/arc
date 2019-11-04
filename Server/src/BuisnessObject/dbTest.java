/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BuisnessObject;

import DAOs.PsqlUserDao;
import DAOs.UserDaoInterface;
import DTOs.Driver;
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
        UserDaoInterface IUserDao = new PsqlUserDao();
        ArrayList<User> nonDrivers = IUserDao.returnNonDrivers();
        User addTest = new User("Rachel", 19, 'F', "me@gmail.com", "HelloWorld", "Dundalk Institute of Technology", "None", 'P', 3 );
        
        System.out.println("Before add");
        for(User u : nonDrivers){
            System.out.println(u.toString());
        }
        
        String password = IUserDao.getHashByEmail("emmaiscool@gmail.com");
        
        System.out.println(password);
        
        Driver addTest2 = new Driver("Honda", 15.00, 'N', "testAddDriver", 19, 'F', "me@gmail.com", "HelloWorld", "Dundalk Institute of Technology", "None", 'P', 3 );
        IUserDao.addDriver(addTest2);
        //IUserDao.addUser(addTest);
        
//        System.out.println("\n\nAfter add");
//        for(User u : nonDrivers){
//            System.out.println(u.toString());
//        }
//        
        //User updateTest = new User(11, "Rachel", 20, 'F', "me@gmail.com", "HelloWorld", "Dundalk Institute of Technology", "None", 'P', 3 );

        //IUserDao.updateUser(updateTest);
//        System.out.println("\n\nUpdated user");
//        System.out.println(updateTest.toString());
        
        //IUserDao.deleteUser(11);
        
//        System.out.println("\n\nAfter delete");
//        for(User u : nonDrivers){
//            System.out.println(u.toString());
//        }
        System.out.println(IUserDao.ifUserExists("emmaiscool@gmail.com")); // in db
        System.out.println(IUserDao.ifUserExists("bob@gmail.com")); // not in db
    }    
}