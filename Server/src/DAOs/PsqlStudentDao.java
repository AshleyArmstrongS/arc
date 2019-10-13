package DAOs;

import DTOs.User;
import Exceptions.DaoException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author racheldhc
 */
public class PsqlStudentDao extends PsqlDao implements StudentDaoInterface {

    
   @Override
    public ArrayList<User> returnNonDrivers() throws DaoException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        ArrayList<User> users = new ArrayList<>();

        try
        {
            con = this.getConnection();
            String query = "SELECT user_id, name, age, gender, email, password, college, description, user_type, location_id FROM users where user_type = 'P'";
            ps = con.prepareStatement(query);
            rs = ps.executeQuery();
            while (rs.next())
            {
                int user_id = rs.getInt("user_id");
                System.out.println(user_id);
                String name = rs.getString("name");
                System.out.println(name);
                int age = rs.getInt("age");
                System.out.println(age);
                String gender = rs.getString("gender");
                System.out.println(gender);
                String email = rs.getString("email");
                System.out.println(email);
                String password = rs.getString("password");
                System.out.println(password);
                String college = rs.getString("college");
                System.out.println(college);
                String description = rs.getString("description");
                System.out.println(description);
                String user_type = rs.getString("user_type");
                System.out.println(user_type);
                int location_id = rs.getInt("location_id");
                System.out.println(location_id);
                
                User u = new User(user_id, name, age, gender, email, password, college, description, user_type, location_id);
                users.add(u);
            }
        } catch (SQLException ex)
        {
            throw new DaoException("returnNonDrivers() " + ex.getMessage());
        } finally
        {
            try
            {
                if (rs != null)
                {
                    rs.close();
                }
                if (ps != null)
                {
                    ps.close();
                }
                if (con != null)
                {
                    freeConnection(con);
                }
            } catch (SQLException e)
            {
                throw new DaoException("returnNonDrivers() " + e.getMessage());
            }
            return users;
        }
    }
     @Override
    public void returnp() throws DaoException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
              System.out.println("Before Connection");
            con = this.getConnection();
            System.out.println("After Connection");
            String query = "SELECT user_id FROM users where user_id = 1 ";
            System.out.println("After query");
            ps = con.prepareStatement(query);
            System.out.println("after ps");
            rs = ps.executeQuery();
            System.out.println("after rs");
            while (rs.next())
            {
                System.out.println(rs.getInt("user_id"));
            }
        } catch (SQLException ex)
       {
           Logger.getLogger(PsqlStudentDao.class.getName()).log(Level.SEVERE, null, ex);
       }
    
}}

