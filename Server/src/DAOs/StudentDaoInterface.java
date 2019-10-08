/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import DTOs.User;
import Exceptions.DaoException;
import java.util.List;

/**
 *
 * @author racheldhc
 */
public interface StudentDaoInterface
{
    public List<User> returnAllUsers() throws DaoException;
}
