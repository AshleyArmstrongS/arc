/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

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
    public void addUser(User u) throws DaoException;
    public void updateUser(User u) throws DaoException;
    public void deleteUser(int id) throws DaoException;
    
    public void returnp() throws DaoException;
}