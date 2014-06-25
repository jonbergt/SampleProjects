<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="events.aspx.cs" Inherits="events_Default" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
	<title>Forthcoming Club Dives and Events with Skooba-Faux-U-cs</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../style1.css" rel="stylesheet" type="text/css" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="BodyContent" Runat="Server">
      <form id="form1" runat="server">
      <p><img class="feature" src="../images/floating.jpg" height="129" width="197" 
         alt="A club member pauses a dive for a floating pose" />        
      </p>
      <h2>Forthcoming Club Events</h2>
  		<p><span class="fun">Skooba-Faux-U-cs</span> members love meeting up for dive trips around the country.  
			Below are all the dive trips that we currently 
			have planned.  For more information about any of them, 
			please get in contact with that event's organizer. 
		</p>
        <div class="caption">Club events/dive trips for the next six months</div>
          <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" DataSourceID="ObjectDataSource1" CssClass="GridView1" BorderColor="Navy" BorderStyle="Outset" BorderWidth="1px">
              <Columns>
                  <asp:BoundField DataField="eventdate" HeaderText="Date" DataFormatString="{0:d}">
                  <HeaderStyle CssClass="evHeader" />
                  <ItemStyle CssClass="evDetail" />
                  </asp:BoundField>
                  <asp:BoundField DataField="eventname" HeaderText="Event Description">
                  <HeaderStyle CssClass="evHeader" />
                  <ItemStyle CssClass="evDetail" />
                  </asp:BoundField>
                  <asp:BoundField DataField="eventlocation" HeaderText="Region">
                  <HeaderStyle CssClass="evHeader" />
                  <ItemStyle CssClass="evDetail" />
                  </asp:BoundField>
                  <asp:BoundField DataField="eventdescription" HeaderText="Details">
                  <HeaderStyle CssClass="evHeader" />
                  <ItemStyle CssClass="evDetail" />
                  </asp:BoundField>
                  <asp:BoundField DataField="contactname" HeaderText="Contact">
                  <HeaderStyle CssClass="evHeader" />
                  <ItemStyle CssClass="evDetail" />
                  </asp:BoundField>
              </Columns>
          </asp:GridView>
          <asp:ObjectDataSource ID="ObjectDataSource1" runat="server" InsertMethod="InsertEventContact" SelectMethod="ListEvents" TypeName="DataHandler">
              <InsertParameters>
                  <asp:Parameter Name="contactname" Type="String" />
                  <asp:Parameter Name="email" Type="String" />
                  <asp:Parameter Name="telephone" Type="String" />
                  <asp:Parameter Name="timetocall" Type="String" />
                  <asp:Parameter Name="eventname" Type="String" />
                  <asp:Parameter Name="eventdate" Type="String" />
                  <asp:Parameter Name="region" Type="String" />
                  <asp:Parameter Name="details" Type="String" />
                  <asp:Parameter Name="publicize" Type="String" />
              </InsertParameters>
          </asp:ObjectDataSource>
      </form>
</asp:Content>

