using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;

/// <summary>
/// Provide Data Access for list/display and insert for Diving Events and corresponding Contact personel.
/// </summary>
public class DataHandler
{
    public DataSet ListEvents()
    {
        var sqlListEvents = "select * from dbo.dive_event_vw order by eventDate";

        using (SqlConnection conn = new SqlConnection(GetConnectionString()))
        {
            using (SqlCommand cmd = new SqlCommand(sqlListEvents, conn))
            {
                using (SqlDataAdapter da = new SqlDataAdapter(cmd))
                {
                    DataSet ds = new DataSet();
                    da.Fill(ds);

                    return ds;
                }
            }
        }
    }

	public void InsertEventContact(
        string contactname, 
        string email,
        string telephone,
        string timetocall,
        string eventname,
        string eventdate,
        string region,
        string details,
        string publicize)
	{
        var sqlContactInsert = "insert into dbo.dive_contact (contactName, telephone, email, timeToCall) values(@contactname, @telephone, @email, @timetocall)";
        var sqlEventInsert = "insert into dbo.dive_event (eventName, eventDescription, eventLocation, eventDate, publicize, eventContactName) values(@eventname, @eventdescription, @eventlocation, @eventdate, @publicize, @contactname)";
                                 
        using (SqlConnection conn = new SqlConnection(GetConnectionString()))
        {
            conn.Open();

            if (!ContactExists(contactname, conn)) 
            {
                using (SqlCommand cmd = new SqlCommand(sqlContactInsert, conn))
                {
                    cmd.Parameters.AddWithValue("@contactname", contactname);
                    cmd.Parameters.AddWithValue("@telephone", telephone);
                    cmd.Parameters.AddWithValue("@email", email);
                    cmd.Parameters.AddWithValue("@timetocall", timetocall);

                    cmd.ExecuteNonQuery();
                }
            }
            using (SqlCommand cmd = new SqlCommand(sqlEventInsert, conn))
            {
                cmd.Parameters.AddWithValue("@eventname", eventname);
                cmd.Parameters.AddWithValue("@eventdescription", details);
                cmd.Parameters.AddWithValue("@eventlocation", region);
                cmd.Parameters.AddWithValue("@eventdate", eventdate);
                cmd.Parameters.AddWithValue("@publicize", publicize);
                cmd.Parameters.AddWithValue("@contactname", contactname);

                cmd.ExecuteNonQuery();
            }
        }
    }

    public bool ContactExists(string contactname, SqlConnection conn) 
    {
        var sqlContactVerify = "select count(*) from dbo.dive_contact where contactname = @contactname";

        using (SqlCommand cmd = new SqlCommand(sqlContactVerify, conn))
        {
            cmd.Parameters.AddWithValue("@contactname", contactname);
            int countPriorUse = Convert.ToInt32(cmd.ExecuteScalar());

            return (countPriorUse > 0); // return "true" if contact already exists
        }
    }

    public string GetConnectionString()
    {
        ConnectionStringSettingsCollection cssc = ConfigurationManager.ConnectionStrings;
        string webCfgConnectionString = cssc["connLocalDBSkoobaFauxU"].ToString();

        return webCfgConnectionString;
    }
}