package DTOs;

import java.util.Objects;

public class Location {
    private int location_id;
    private String address;
    private double latitude;
    private double longitude;

    public Location(int location_id, String address, double latitude, double longitude)
    {
        this.location_id = location_id;
        this.address = address;
        this.latitude = latitude;
        this.longitude = longitude;
    }
    
    public Location(String address, double latitude, double longitude)
    {
        this.address = address;
        this.latitude = latitude;
        this.longitude = longitude;
    }
    
    public Location()
    {
        this.location_id = 0;
        this.address = "N/A";
        this.latitude = 0;
        this.longitude = 0;
    }
    
    public int getLocation_id() {
        return location_id;
    }

    public void setLocation_id(int location_id) {
        this.location_id = location_id;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public double getLatitude() {
        return latitude;
    }

    public void setLatitude(double latitude) {
        this.latitude = latitude;
    }

    public double getLongitude() {
        return longitude;
    }

    public void setLongitude(double longitude) {
        this.longitude = longitude;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 67 * hash + this.location_id;
        hash = 67 * hash + Objects.hashCode(this.address);
        hash = 67 * hash + Objects.hashCode(this.latitude);
        hash = 67 * hash + Objects.hashCode(this.longitude);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
        {
            return true;
        }
        if (obj == null)
        {
            return false;
        }
        if (getClass() != obj.getClass())
        {
            return false;
        }
        final Location other = (Location) obj;
        if (this.location_id != other.location_id)
        {
            return false;
        }
        if (!Objects.equals(this.address, other.address))
        {
            return false;
        }
        if (!Objects.equals(this.latitude, other.latitude))
        {
            return false;
        }
        if (!Objects.equals(this.longitude, other.longitude))
        {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Location{" + "location_id=" + location_id + ", address=" + address + ", latitude=" + latitude + ", longitude=" + longitude + '}';
    }
    
    
}
