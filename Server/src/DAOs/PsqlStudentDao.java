package DAOs;

import Exceptions.DaoException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author racheldhc
 */
public class PsqlStudentDao extends PsqlDao implements StudentDaoInterface
{
    public void findAllStudents() throws DaoException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        List<String> students = new ArrayList<>();
        
        try
        {
            con = this.getConnection();
            String query = "SELECT * FROM student";
            ps = con.prepareStatement(query);
            rs = ps.executeQuery();
            
            while(rs.next())
            {
                System.out.println(rs.getString("name"));
                System.out.println("It is connected");
            }
        } catch (SQLException e)
        {
            throw new DaoException("findAllStudents() " + e.getMessage());
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
