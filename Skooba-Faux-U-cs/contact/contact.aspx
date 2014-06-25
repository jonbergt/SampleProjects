<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="contact.aspx.cs" Inherits="contact_contact" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <title>Contact Us at Skooba-Faux-U-cs</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../style1.css" rel="stylesheet" type="text/css" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="BodyContent" Runat="Server">
        <h2>Contact Us</h2>
      <p>To let us know about a forthcoming dive event, please use the form below.
      </p>
		<form id="contact" runat="server">
         <fieldset>
            <legend>Tell Us About a Dive Event</legend>
             <asp:ValidationSummary ID="ValidationSummary1" runat="server" BackColor="#FFCCFF" BorderColor="#FF3399" BorderStyle="Solid" BorderWidth="2px" Font-Bold="True" Font-Italic="True" Font-Size="Small" ForeColor="#FF3399" HeaderText="Errors on this form" />
            <p>
                <asp:Label ID="Label1" runat="server" Text="Contact Name" CssClass="fixedwidth"></asp:Label>
                <asp:TextBox ID="contactname" runat="server"></asp:TextBox>
            </p>
            <p>
                <asp:Label ID="Label2" runat="server" Text="Email Address" CssClass="fixedwidth"></asp:Label>
                <asp:TextBox ID="email" runat="server"></asp:TextBox>
            </p>
            <p>
                <asp:Label ID="Label3" runat="server" Text="Telephone Number" CssClass="fixedwidth"></asp:Label>
                <asp:TextBox ID="telephone" runat="server"></asp:TextBox>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ControlToValidate="telephone" ErrorMessage="Format telephone as (999)999-9999" Font-Bold="True" Font-Italic="False" ForeColor="#FF3399" ValidationExpression="((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}">  *</asp:RegularExpressionValidator>
            </p>
            <p>
                <asp:Label ID="Label4" runat="server" Text="If we need to call you back for any more info, what would be the best time to call
                you on the number supplied?"></asp:Label>
                <asp:RadioButtonList ID="timetocall" runat="server" CssClass="radiocontact"> 
                    <asp:ListItem>Morning</asp:ListItem>
                    <asp:ListItem>Afternoon</asp:ListItem>
                    <asp:ListItem>Evening</asp:ListItem>
                    <asp:ListItem Selected="true">Do Not Call</asp:ListItem>
                </asp:RadioButtonList>
            </p>
            <p>
               <asp:Label ID="Label5" runat="server" Text="What's the event called?" Cssclass="fixedwidth"></asp:Label>
               <asp:TextBox ID="eventname" runat="server"></asp:TextBox>
            </p>
            <p>
               <asp:Label ID="Label6" runat="server" Text="When's the event happening?" CssClass="fixedwidth"></asp:Label>
               <asp:TextBox ID="eventdate" runat="server"></asp:TextBox>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator2" runat="server" ControlToValidate="eventdate" ErrorMessage="Use USA format date: mm/dd/ccyy" Font-Bold="True" ForeColor="#FF0066" ValidationExpression="^((((0[13578])|([13578])|(1[02]))[\/](([1-9])|([0-2][0-9])|(3[01])))|(((0[469])|([469])|(11))[\/](([1-9])|([0-2][0-9])|(30)))|((2|02)[\/](([1-9])|([0-2][0-9]))))[\/]\d{4}$|^\d{4}$">  *</asp:RegularExpressionValidator>
            </p>
            <p>
               <asp:Label ID="Label7" runat="server" Cssclass="fixedwidth">Where will the event happen?</asp:Label>
               <asp:DropDownList id="region" runat="server">
                  <asp:ListItem Value="00">Local Meeting (see Details)</asp:ListItem>
                  <asp:ListItem Value="01">Gulf Coast USA</asp:ListItem>
                  <asp:ListItem Value="02">North Pacific Coast</asp:ListItem>
                  <asp:ListItem Value="03" Selected="True">Midwest (rivers) USA</asp:ListItem>
                  <asp:ListItem Value="04">North Atlantic Coast</asp:ListItem>
                  <asp:ListItem Value="05">West Coast USA</asp:ListItem>
                  <asp:ListItem Value="06">East Coast USA</asp:ListItem>
                  <asp:ListItem Value="07">British Isles</asp:ListItem>
                  <asp:ListItem Value="08">Hawaiian Isles</asp:ListItem>
                  <asp:ListItem Value="09">Other International (see Details)</asp:ListItem>
               </asp:DropDownList>
            </p>
            <p>
                <asp:Label ID="Label8" runat="server">Please provide any other details you think will be useful to us in the text area below (it may save us calling or emailing you, and help avoid delays).</asp:Label>
            </p>
            <p>
               <asp:Label ID="Label9" runat="server" Cssclass="fixedwidth">More details (as much as you think we'll need!)
               </asp:Label>
               <asp:TextBox id="details" runat="server" Width="220px" rows="7" TextMode="MultiLine"></asp:TextBox>
            </p>
                <p>
                    <asp:Label ID="Label10" runat="server" CssClass="permissions"><span class="fun">Skooba-Faux-U-cs</span> may share information you give us here with other like-minded 
                    peope or web sites to promote the event.  Please confirm if you are happy for us to do this.</asp:Label><br />
               <asp:CheckBox ID="publicize" runat="server" Checked="false" Text="I am happy for this event to be publicized outside of 
                  and beyond Skooba-Faux-U-cs.com, wherever necessary."></asp:CheckBox>
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
                </p>
             <div class="buttonarea">
               <asp:Button ID="submit" Text="Send Info" runat="server" Cssclass="button" OnClick="submit_Click"></asp:Button>
             </div>
         </fieldset>
        </form>
           
		<p>If you need to get in touch urgently, please call Bob Limadoba at (999)999-9999.  
         For anything else, please <a href="mailto:bob@Skooba-Faux-U-cs.com." />drop us a line by email. 
		</p>
</a>
</asp:Content>

