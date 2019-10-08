/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import Exceptions.DaoException;

/**
 *
 * @author racheldhc
 */
public interface StudentDaoInterface
{
    public void findAllStudents() throws DaoException;
}
