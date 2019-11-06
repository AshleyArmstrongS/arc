/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAOs;

import DTOs.Location;
import Exceptions.DaoException;

/**
 *
 * @author racheldhc
 */
public interface LocationDaoInterface
{
    public void addLocation(Location l) throws DaoException;
    public void deleteLocation(Location l) throws DaoException;
    public void updateLocation(Location l) throws DaoException;
    public Location getLocationById(int id) throws DaoException;
}
