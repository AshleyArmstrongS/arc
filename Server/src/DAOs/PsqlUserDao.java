package DAOs;

import DTOs.Driver;
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
public class PsqlUserDao extends PsqlDao implements UserDaoInterface {
    // User Returns 
    @Override
    public ArrayList<User> returnNonDrivers() throws DaoException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        ArrayList<User> users = new ArrayList<>();

        try
        {
            con = this.getConnection();
            String query = "SELECT user_id, name, age, gender, email, college, description, user_type, location_id FROM users where user_type = 'P'";
            ps = con.prepareStatement(query);
            rs = ps.executeQuery();
            while (rs.next())
            {
                int user_id = rs.getInt("user_id");
                String name = rs.getString("name");
                int age = rs.getInt("age");
                char gender = rs.getString("gender").charAt(0);
                String email = rs.getString("email");
                String college = rs.getString("college");
                String description = rs.getString("description");
                char user_type = rs.getString("user_type").charAt(0);
                int location_id = rs.getInt("location_id");
                
                User u = new User(user_id, name, age, gender, email, college, description, user_type, location_id);
                users.add(u);
            }
        } catch (SQLException ex)
        {
            throw new DaoException("returnNonDrivers() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
            
        }
        return users;
    }
     
    // Methods
    @Override
    public String getHashByEmail(String email) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        String pass = "";
        
        try
        {
            con = this.getConnection();
            String query = "SELECT password from users where email = ?";
            ps = con.prepareStatement(query);
            ps.setString(1, email);
            rs = ps.executeQuery();
            
            if(rs.next())
            {
                pass = rs.getString("Password");
            }
            
        }
        catch(SQLException ex) {
            throw new DaoException("getHashByEmail() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("getHashByEmail() " + e.getMessage());
            }
        }
        return pass;
    }
    
    @Override
    public boolean ifUserExists(String email) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        int id = 0;
        
        try
        {
            con = this.getConnection();
            String query = "SELECT user_id from users where email = ?";
            ps = con.prepareStatement(query);
            ps.setString(1, email);
            rs = ps.executeQuery();
            
            if(rs.next())
            {
                id = rs.getInt("user_id");
                if(id > 0)
                {
                    return true;
                }
            }
            
        }
        catch(SQLException ex) {
            throw new DaoException("getHashByEmail() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("getHashByEmail() " + e.getMessage());
            }
        }
        return false;
    }


    // Add Update Delete
    @Override
    public void addPassenger(User u) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
            con = this.getConnection();
            String query = "insert into users(name, age, gender, email, password, college, description, user_type, location_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?);";
            ps = con.prepareStatement(query);
            
            ps.setString(1, u.getName());
            ps.setInt(2, u.getAge());
            ps.setString(3, String.valueOf(u.getGender()));
            ps.setString(4,u.getEmail());
            ps.setString(5, u.getPassword());
            ps.setString(6, u.getCollege());
            ps.setString(7, u.getDescription());
            ps.setString(8, String.valueOf(u.getUser_type()));
            ps.setInt(9, u.getLocation_id());
            
            int affectedRows = ps.executeUpdate();
            
            if (affectedRows > 0) 
            {
                System.out.println("User Added");
            }
        } catch (SQLException ex)
        {
            throw new DaoException("AddUser() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("AddUser() " + e.getMessage());
            }
        }
    }
    
    @Override
    public void addDriver(Driver d) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
            con = this.getConnection();
            String query = "insert into users(name, age, gender, email, password, college, description, user_type, location_id, car, estimated_payment, available) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            ps = con.prepareStatement(query);
            
            ps.setString(1, d.getName());
            ps.setInt(2, d.getAge());
            ps.setString(3, String.valueOf(d.getGender()));
            ps.setString(4,d.getEmail());
            ps.setString(5, d.getPassword());
            ps.setString(6, d.getCollege());
            ps.setString(7, d.getDescription());
            ps.setString(8, String.valueOf(d.getUser_type()));
            ps.setInt(9, d.getLocation_id());
            ps.setString(10, d.getCar());
            ps.setDouble(11, d.getEst_pay());
            ps.setString(12, String.valueOf(d.getAvailable()));
            
            int affectedRows = ps.executeUpdate();
            
            if (affectedRows > 0) 
            {
                System.out.println("User Added");
            }
        } catch (SQLException ex)
        {
            throw new DaoException("AddDriver() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("AddUser() " + e.getMessage());
            }
        }
    }

    @Override
    public void updatePassengerById(User u) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
            con = this.getConnection();
            String query = "update users set name = ?, age = ?, gender = ?, email = ?, password = ?, college = ?, description = ?, user_type = ?, location_id = ? where user_id = ?;";
            ps = con.prepareStatement(query);
            
            ps.setString(1, u.getName());
            ps.setInt(2, u.getAge());
            ps.setString(3, String.valueOf(u.getGender()));
            ps.setString(4,u.getEmail());
            ps.setString(5, u.getPassword());
            ps.setString(6, u.getCollege());
            ps.setString(7, u.getDescription());
            ps.setString(8, String.valueOf(u.getUser_type()));
            ps.setInt(9, u.getLocation_id());
            ps.setInt(10, u.getUser_id());
            
            int affectedRows = ps.executeUpdate();
            if (affectedRows > 0) 
            {
                System.out.println("User Updated");
            }
        } catch (SQLException ex)
        {
            throw new DaoException("UpdateUser() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("UpdateUser() " + e.getMessage());
            }
        }
    }
    
    @Override
    public void updateDriverById(Driver d) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;

        try
        {
            con = this.getConnection();
            String query = "update users set name = ?, age = ?, gender = ?, email = ?, password = ?, college = ?, description = ?, user_type = ?, location_id = ?, car = ?, estimated_payment = ?, available = ? where user_id = ?;";
            ps = con.prepareStatement(query);
            
            ps.setString(1, d.getName());
            ps.setInt(2, d.getAge());
            ps.setString(3, String.valueOf(d.getGender()));
            ps.setString(4, d.getEmail());
            ps.setString(5, d.getPassword());
            ps.setString(6, d.getCollege());
            ps.setString(7, d.getDescription());
            ps.setString(8, String.valueOf(d.getUser_type()));
            ps.setInt(9, d.getLocation_id());
            ps.setString(10, d.getCar());
            ps.setDouble(11, d.getEst_pay());
            ps.setString(12, String.valueOf(d.getAvailable()));
            ps.setInt(13, d.getUser_id());
            
            int affectedRows = ps.executeUpdate();
            if (affectedRows > 0) 
            {
                System.out.println("User Updated");
            }
        } catch (SQLException ex)
        {
            throw new DaoException("UpdateUser() " + ex.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("UpdateUser() " + e.getMessage());
            }
        }
    }

    @Override
    public void deleteUser(int id) throws DaoException
    {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        try
        {
            con = this.getConnection();

            String query = "delete from users where user_id = ? ";
            ps = con.prepareStatement(query);
            ps.setInt(1, id);

            ps.executeUpdate();

        } catch (SQLException e)
        {
            throw new DaoException("deleteUser() " + e.getMessage());
        } catch (ClassNotFoundException ex)
        {
            Logger.getLogger(PsqlUserDao.class.getName()).log(Level.SEVERE, null, ex);
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
                throw new DaoException("deleteUser() " + e.getMessage());
            }
        }
    }


}

