package DTOs;

public class Timetable {
    
    private int user_id;
    private int mon_in;
    private int mon_out;
    private int tue_in;
    private int tue_out;
    private int wed_in;
    private int wed_out;
    private int thu_in;
    private int thu_out;
    private int fri_in;
    private int fri_out;

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getMon_in() {
        return mon_in;
    }

    public void setMon_in(int mon_in) {
        this.mon_in = mon_in;
    }

    public int getMon_out() {
        return mon_out;
    }

    public void setMon_out(int mon_out) {
        this.mon_out = mon_out;
    }

    public int getTue_in() {
        return tue_in;
    }

    public void setTue_in(int tue_in) {
        this.tue_in = tue_in;
    }

    public int getTue_out() {
        return tue_out;
    }

    public void setTue_out(int tue_out) {
        this.tue_out = tue_out;
    }

    public int getWed_in() {
        return wed_in;
    }

    public void setWed_in(int wed_in) {
        this.wed_in = wed_in;
    }

    public int getWed_out() {
        return wed_out;
    }

    public void setWed_out(int wed_out) {
        this.wed_out = wed_out;
    }

    public int getThu_in() {
        return thu_in;
    }

    public void setThu_in(int thu_in) {
        this.thu_in = thu_in;
    }

    public int getThu_out() {
        return thu_out;
    }

    public void setThu_out(int thu_out) {
        this.thu_out = thu_out;
    }

    public int getFri_in() {
        return fri_in;
    }

    public void setFri_in(int fri_in) {
        this.fri_in = fri_in;
    }

    public int getFri_out() {
        return fri_out;
    }

    public void setFri_out(int fri_out) {
        this.fri_out = fri_out;
    }

    @Override
    public String toString() {
        return "Timetable{" + "user_id=" + user_id + ", mon_in=" + mon_in + ", mon_out=" + mon_out + ", tue_in=" + tue_in + ", tue_out=" + tue_out + ", wed_in=" + wed_in + ", wed_out=" + wed_out + ", thu_in=" + thu_in + ", thu_out=" + thu_out + ", fri_in=" + fri_in + ", fri_out=" + fri_out + '}';
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + this.user_id;
        hash = 59 * hash + this.mon_in;
        hash = 59 * hash + this.mon_out;
        hash = 59 * hash + this.tue_in;
        hash = 59 * hash + this.tue_out;
        hash = 59 * hash + this.wed_in;
        hash = 59 * hash + this.wed_out;
        hash = 59 * hash + this.thu_in;
        hash = 59 * hash + this.thu_out;
        hash = 59 * hash + this.fri_in;
        hash = 59 * hash + this.fri_out;
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
        final Timetable other = (Timetable) obj;
        if (this.user_id != other.user_id)
        {
            return false;
        }
        if (this.mon_in != other.mon_in)
        {
            return false;
        }
        if (this.mon_out != other.mon_out)
        {
            return false;
        }
        if (this.tue_in != other.tue_in)
        {
            return false;
        }
        if (this.tue_out != other.tue_out)
        {
            return false;
        }
        if (this.wed_in != other.wed_in)
        {
            return false;
        }
        if (this.wed_out != other.wed_out)
        {
            return false;
        }
        if (this.thu_in != other.thu_in)
        {
            return false;
        }
        if (this.thu_out != other.thu_out)
        {
            return false;
        }
        if (this.fri_in != other.fri_in)
        {
            return false;
        }
        if (this.fri_out != other.fri_out)
        {
            return false;
        }
        return true;
    }
    
    
}
