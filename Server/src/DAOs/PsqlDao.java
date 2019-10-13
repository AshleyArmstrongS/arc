/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import Exceptions.DaoException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
/**
 *
 * @author Administrator
 */
public class PsqlDao {
    public Connection getConnection() throws DaoException 
    {

        String url = "jdbc:postgresql://localhost:5432/gocollege";
        String username = "postgres";
        String password = "password";
        Connection con = null;
        
        try 
        {
            con = DriverManager.getConnection(url, username, password);
        } 
        catch (SQLException ex2) 
        {
            System.out.println("Connection failed " + ex2.getMessage());
            System.exit(2);
        }
        return con;
    }

    public void freeConnection(Connection con) throws DaoException 
    {
        try 
        {
            if (con != null) 
            {
                con.close();
                con = null;
            }
        } 
        catch (SQLException e) 
        {
            System.out.println("Failed to free connection: " + e.getMessage());
            System.exit(1);
        }
    }   
}
