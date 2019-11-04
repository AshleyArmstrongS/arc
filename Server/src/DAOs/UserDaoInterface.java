/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import DTOs.Driver;
import DTOs.User;
import Exceptions.DaoException;
import java.util.ArrayList;

/**
 *
 * @author racheldhc
 */
public interface UserDaoInterface
{
    public ArrayList<User> returnNonDrivers() throws DaoException;
    public String getHashByEmail(String email) throws DaoException;
    public void addPassenger(User u) throws DaoException;
    public void addDriver(Driver u) throws DaoException;
    public void updatePassengerById(User u) throws DaoException;
    public void updateDriverById(Driver d) throws DaoException;
    public void deleteUser(int id) throws DaoException;
    public boolean ifUserExists(String email) throws DaoException;
    
}