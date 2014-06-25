using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;

public partial class contact_contact : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
    }
    protected void submit_Click(object sender, EventArgs e)
    {
        DataHandler dh = new DataHandler();
        dh.InsertEventContact(contactname.Text, email.Text, telephone.Text, timetocall.SelectedItem.ToString(), eventname.Text, 
            eventdate.Text, region.SelectedItem.ToString(), details.Text, publicize.Checked.ToString());

        ResetForm();
    }
    protected void ResetForm()
    {
        contactname.Text = "";
        email.Text = "";
        telephone.Text = "";
        timetocall.SelectedIndex = 0;
        timetocall.SelectedValue = "Do Not Call";
        eventname.Text = "";
        eventdate.Text = "";
        region.SelectedIndex = 0;
        region.SelectedValue = "Midwest (rivers) USA";
        details.Text = "";
        publicize.Checked = false;
    }

}