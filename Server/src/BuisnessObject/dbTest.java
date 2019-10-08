/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BuisnessObject;

import DAOs.PsqlStudentDao;
import DAOs.StudentDaoInterface;
import Exceptions.DaoException;


/**
 *
 * @author racheldhc
 */
public class dbTest
{
    public static void main(String[] args) throws DaoException
    {
        StudentDaoInterface IStudentDao = new PsqlStudentDao();
        IStudentDao.returnAllUsers();
    }    
}

