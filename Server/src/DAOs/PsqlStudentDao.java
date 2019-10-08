package DAOs;

import DTOs.User;
import Exceptions.DaoException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
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

    public void findAllStudents() throws DaoException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        List<User> users = new ArrayList<>();

        try
        {
            con = this.getConnection();
            String query = "SELECT * FROM student";
            ps = con.prepareStatement(query);
            rs = ps.executeQuery();

            while (rs.next())
            {
                int user_id = rs.getInt("ID");
                String name = rs.getString("title");
                int age = rs.getInt("genre");
                String gender = rs.getString("director");
                String email = rs.getString("runtime");
                String car = rs.getString("rating");
                double est_pay = rs.getDouble("starring");
                String college = rs.getString("college");
                int location_id = rs.getInt("college");
                int timetable_id = rs.getInt("college");
                
                User u = new User(user_id, name, age, gender, email, car, est_pay, college, location_id, timetable_id);
                users.add(u);
            }
        } catch (SQLException ex)
        {
            throw new DaoException("findAllMovies() " + ex.getMessage());
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
                throw new DaoException("findAllStudents() " + e.getMessage());
            }
        }
    }
}
