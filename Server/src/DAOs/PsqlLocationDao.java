/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import DTOs.Location;
import Exceptions.DaoException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author racheldhc
 */
public class PsqlLocationDao extends PsqlDao implements LocationDaoInterface
{

    @Override
    public void addLocation(Location l) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
            con = this.getConnection();
            String query = "insert into location(address, latitude, longitude) values (?, ?, ?);";
            ps = con.prepareStatement(query);
            
            ps.setString(1, l.getAddress());
            ps.setDouble(2, l.getLatitude());
            ps.setDouble(3, l.getLongitude());
            
            int affectedRows = ps.executeUpdate();
            
            if (affectedRows > 0) 
            {
                System.out.println("Location Added");
            }
        } catch (SQLException ex)
        {
            throw new DaoException("AddLocation() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlLocationDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("AddLocation() " + e.getMessage());
            }
        }
    }

    @Override
    public void deleteLocation(Location l) throws DaoException
    {
        
    }

    @Override
    public void updateLocation(Location l) throws DaoException
    {
        
    }

    @Override
    public Location getLocationById(int id) throws DaoException
    {
        return new Location(1, "hi", 12,12);
    }
    
}
