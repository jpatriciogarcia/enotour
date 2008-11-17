<?php

include("class.phpmailer.php");
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$mail->From       = "reservas@enotourchile.com";
$mail->FromName   = "Enotour Chile";
$mail->Subject    = "RESERVATION REQUEST";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$_POST['santiago_hotels'] = isset($_POST['santiago_hotels']) ? $_POST['santiago_hotels'] : array();
$_POST['wine_hotels'] = isset($_POST['wine_hotels']) ? $_POST['wine_hotels'] : array();


$body = "
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
<html>
<head>
<title>Enotour® / Reservation Request for Services</title>
<link rel=\"shortcut icon\" href=\"http://www.enotourchile.com/Images/iso.ico\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
</head>

<body bgcolor=\"#E8E9F1\" link=\"#333333\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">
<table width=\"740\" height=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td width=\"1300\" bgcolor=\"#FFFFFF\">
<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><img src=\"http://www.enotourchile.com/logo%20form.jpg\" width=\"194\" height=\"122\"></font></div></td>
  </tr>

  <tr>
    <td bgcolor=\"#FFFFFF\">

        <table width=\"740\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><br>
                RESERVATION REQUEST </strong></font></div></td>
          </tr>
        </table>

        <font face=\"Verdana, Arial, Helvetica, sans-serif\"><br>
        </font>
        <table width=\"740\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"5\" bordercolor=\"#000000\">
          <tr>
            <td width=\"32%\" valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">First
                Name</font></div></td>
            <td width=\"68%\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
              <input name=\"first_name\" type=\"text\" id=\"first_name\" size=\"50\" value=\"".$_POST['first_name']."\" disabled=\"disabled\">
            </font></td>
          </tr>
          <tr>
            <td valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Last
                Name</font></div></td>
            <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
              <input name=\"last_name\" type=\"text\" id=\"last_name\" size=\"50\" value=\"".$_POST['last_name']."\" disabled=\"disabled\">
            </font></td>
          </tr>
          <tr>
            <td valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nationality</font></div></td>
            <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
              <input name=\"nationality\" type=\"text\" id=\"empresa\" size=\"50\" value=\"".$_POST['nationality']."\" disabled=\"disabled\">
            </font></td>
          </tr>

          <tr>
            <td valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Phone
                Number</font></div></td>
            <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
              <input name=\"phone_number\" type=\"text\" id=\"telefono24\" size=\"50\" value=\"".$_POST['phone_number']."\" disabled=\"disabled\">
            </font></td>
          </tr>
          <tr>
            <td valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Email
                Address</font></div></td>

            <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
              <input name=\"email\" type=\"text\" id=\"telefono23\" size=\"50\" value=\"".$_POST['email']."\" disabled=\"disabled\">
            </font></td>
          </tr>
          <tr>
            <td colspan=\"2\" valign=\"top\"><p>&nbsp;</p>
              <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">
                <tr>
                  <td colspan=\"3\"><div align=\"center\"></div></td>
                </tr>
                <tr >
                  <td colspan=\"3\"><table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\">
                    <tr>
                      <th colspan=\"3\" valign=\"top\"><div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=\"#333333\">Rooms Category </font></strong></font></div></th>
                      <th colspan=\"4\" valign=\"top\"><div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=\"#333333\">N° of Room </font></strong></font></div></th>
                    </tr>
                    <tr valign=\"middle\">
                      <td colspan=\"3\"><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"rooms_single\" type=\"checkbox\" id=\"rooms_single\" ".(isset($_POST['rooms_single']) ? "checked=\"checked\"" : "")." disabled=\"disabled\">
                        Single</font></div></td>
                      <td colspan=\"4\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                        <label>
                        <div align=\"center\">
                            <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                            <input name=\"rooms_single_number\" type=\"text\" id=\"rooms_single_number\" value=\"".$_POST['rooms_single_number']."\" disabled=\"disabled\">
                            </font></div>
                        </td>
                    </tr>
                    <tr valign=\"middle\">
                      <td colspan=\"3\"><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"rooms_twins\" type=\"checkbox\" id=\"rooms_twins\" ".(isset($_POST['rooms_twins']) ? "checked=\"checked\"" : "")." disabled=\"disabled\">
                        Twin</font></div></td>
                      <td colspan=\"4\"><div align=\"center\">
                          <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"rooms_twin_number\" type=\"text\" id=\"rooms_twin_number\" value=\"".$_POST['rooms_twin_number']."\" disabled=\"disabled\">
                          </font></div></td>
                    </tr>
                    <tr valign=\"middle\">
                      <td><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Arrival date </font></div></td>
                      <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                        <input name=\"arrival\" type=\"text\" id=\"arrival\" size=\"10\" value=\"".$_POST['arrival']."\" disabled=\"disabled\">
                      </font></td>
                      <td><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Departure date </font></div></td>
                      <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                        <input name=\"departure\" type=\"text\" id=\"departure\" size=\"10\" value=\"".$_POST['departure']."\" disabled=\"disabled\">
                      </font></td>
                      <td><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N° Nights </font></div></td>
                      <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                        <input name=\"nights\" type=\"text\" id=\"nights\" size=\"5\" value=\"".$_POST['nights']."\" disabled=\"disabled\">
                      </font></td>
                    </tr>

                  </table>
                    <p>&nbsp;</p>
                    <div align=\"center\">
                      <table width=\"100%\">
                        <tr>
                          <th><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=\"#333333\">Requires air travel ? </font></strong></font> <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <label>
                          <input type=\"radio\" name=\"air_travel\" value=\"yes\" ".($_POST['air_travel']=='yes'?"checked=\"checked\"" : "").">
Yes</label>
                          <label>
                          <input name=\"air_travel\" type=\"radio\" value=\"no\" ".($_POST['air_travel']=='no'?"checked=\"checked\"" : "").">
No</label>
                          </font> </th>
                        </tr>
                      </table>
                    </div>
					<div id=\"divairtravel\" style=\"display:".($_POST['air_travel']=='yes'?"block" : "none").";\">
                    <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" bgcolor=\"#FFFFFF\">

                      <tr valign=\"middle\">
                        <td colspan=\"2\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">First name </font></div></td>
                        <td colspan=\"2\"><div align=\"left\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"air_travel_first_name\" type=\"text\" id=\"air_travel_first_name\" size=\"50\" value=\"".$_POST['air_travel_first_name']."\" disabled=\"disabled\">
                        </font></div></td>
                      </tr>
                      <tr valign=\"middle\">
                        <td colspan=\"2\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Last Name </font></div></td>
                        <td colspan=\"2\"><div align=\"left\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"air_travel_last_name\" type=\"text\" id=\"air_travel_last_name\" size=\"50\" value=\"".$_POST['air_travel_last_name']."\" disabled=\"disabled\">
                        </font></div></td>
                      </tr>
                      <tr valign=\"middle\">
                        <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Arrival Date </font></div></td>
                        <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"air_travel_arrival\" type=\"text\" id=\"air_travel_arrival\" size=\"10\" value=\"".$_POST['air_travel_arrival']."\" disabled=\"disabled\">
                        </font></td>
                        <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Departure Date </font></div></td>
                        <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <input name=\"air_travel_departure\" type=\"text\" id=\"air_travel_departure\" size=\"10\" value=\"".$_POST['air_travel_departure']."\" disabled=\"disabled\">
                        </font></td>
                      </tr>
                      <tr valign=\"middle\">
                        <td colspan=\"2\" valign=\"top\"><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Comments</font></div></td>
                        <td colspan=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <textarea name=\"air_travel_comments\" cols=\"50\" rows=\"5\" id=\"air_travel_comments\" disabled=\"disabled\">".$_POST['air_travel_comments']."</textarea>
                        </font></td>
                      </tr>
                    </table>
					</div>
                    <p>&nbsp;</p>
                    <table width=\"100%\" cellpadding=\"5\" cellspacing=\"5\" bgcolor=\"#FFFFFF\">

                      <tr>
                        <td valign=\"top\"><div align=\"right\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Form
                        of Payment</font></div></td>
                        <td><font face=\"Verdana, Arial, Helvetica, sans-serif\">
                          <select name=\"payment\" id=\"payment\" disabled=\"disabled\">
                            <option ".($_POST['payment']=='credit_card'?"selected=\"selected\"" : "")." value=\"credit_card\">Credit Card</option>
                            <option ".($_POST['payment']=='deposit_current_account'?"selected=\"selected\"" : "")." value=\"deposit_current_account\">Deposit Current Account</option>
                            <option ".($_POST['payment']=='check'?"selected=\"selected\"" : "")." value=\"check\">Check</option>
                          </select>
                          <br>
                          <font color=\"#333333\" size=\"1\">*This
                        precedent is just for reference</font></font></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\">
                <tr >
                  <th colspan=\"2\" valign=\"top\"><div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=\"#333333\">Santiago Hotels </font></strong></font></div></th>
                  <th colspan=\"2\" valign=\"top\"><div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong><font color=\"#333333\">Wine Related Hotels </font></strong></font></div></th>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"0\" ".(in_array('0', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Ritz Carlton</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"0\" ".(in_array('0', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hotel Casa Real de Viña Santa Rita</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"1\" ".(in_array('1', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Grand Hyatt</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"1\" ".(in_array('1', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Casa Tarapacá</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"2\" ".(in_array('2', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Sheraton</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"2\" ".(in_array('2', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Casa de Huéspedes de Viña Mar</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"3\" ".(in_array('3', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">San Cristóbal Tower</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"3\" ".(in_array('3', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hotel Casa Porta</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"4\" ".(in_array('4', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">InterContinental</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"4\" ".(in_array('4', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hacienda los Lingues</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"5\" ".(in_array('5', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Marriott</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"5\" ".(in_array('5', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hotel Casa Silva</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"6\" ".(in_array('6', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Plaza el Bosque Park &amp; Suite</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"6\" ".(in_array('6', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">La Playa Winery&amp; Hotel</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"7\" ".(in_array('7', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                      <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Atton, Las Condes</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"7\" ".(in_array('7', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hotel Santa Cruz Plaza</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"8\" ".(in_array('8', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                      <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Atton, el Bosque</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"8\" ".(in_array('8', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Clos Apalta Winery &amp; Lodge</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"9\" ".(in_array('9', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                      <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Novotel</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"9\" ".(in_array('9', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Casona de VIA Wines</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"10\" ".(in_array('10', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                      <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Four Points</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"10\" ".(in_array('10', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                    <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Casa de Huéspedes de Casa Donoso</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"santiago_hotels[]\" type=\"checkbox\" id=\"santiago_hotels[]\" value=\"11\" ".(in_array('11', $_POST['santiago_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td>                      <div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Torremayor</font></div></td>
                  <td><div align=\"center\">
                    <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
                    <input name=\"wine_hotels[]\" type=\"checkbox\" id=\"wine_hotels[]\" value=\"11\" ".(in_array('11', $_POST['wine_hotels'])?"checked=\"checked\"" : "")." disabled=\"disabled\">
                    </font></div></td>
                  <td><div align=\"left\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Hotel Tabonkö de Viña  Gïllmore</font></div></td>
                </tr>
                <tr valign=\"middle\">
                  <td colspan=\"2\" valign=\"top\"><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Comments</font></div></td>
                  <td colspan=\"2\"><textarea name=\"textarea\" cols=\"50\" rows=\"5\" disabled=\"disabled\">".$_POST['textarea']."</textarea></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <p align=\"center\">&nbsp; </p>

        <table width=\"740\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">
        <tr>
          <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Enotour
              `s office in Santiago</font></div></td>
        </tr>
        <tr>
          <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Av.
              Luis Thayer Ojeda 0130 (Thayer Square) of.1204, Providencia, Santiago,
              Chile</font></div></td>
        </tr>
        <tr>
          <td><div align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">(56
              - 2) 481 4081 / reservas@enotourchile.com </font></div></td>
        </tr>
      </table>
      <p align=\"center\"><font color=\"#333333\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">
        <a href=\"http://www.enotourchile.com/ing_condiciones.htm\">Knows about our terms and conditions</a><br>
        <br>
      </font></p>      </td>
  </tr>
</table>
</body>
</html>
";


$mail->MsgHTML($body);

$mail->AddAddress("jpatriciogarcia@gmail.com", "Enotour Chile");

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>