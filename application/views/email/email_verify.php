<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo SITENAME; ?></title>
    <style type="text/css">
      /* Based on The MailChimp Reset INLINE: Yes. */
      /* Client-specific Styles */
      #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
      body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}
      /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
      .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
      /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
      #backgroundTable {
      margin:0; padding:0; width:100% !important; line-height: 100% !important;background-color: #e9eaed;
      font-size: 14px;
      line-height: 20px;
      color: #333333
      }
      /* End reset */
      /* Some sensible defaults for images
      Bring inline: Yes. */
      img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
      a img {border:none;}
      .image_fix {display:block;}
      /* Yahoo paragraph fix
      Bring inline: Yes. */
      p {margin: 1em 0;}
      /* Hotmail header color reset
      Bring inline: Yes. */
      h1, h2, h3, h4, h5, h6 {color: black !important; font-weight: normal;}
      h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}
      h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
      color: red !important; /* Preferably not the same color as the normal header link color.  There is limited support for psuedo classes in email clients, this was added just for good measure. */
      }
      h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
      color: purple !important; /* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
      }
      /* Outlook 07, 10 Padding issue fix
      Bring inline: No.*/
      table td {border-collapse: collapse;}
      /* Remove spacing around Outlook 07, 10 tables
      Bring inline: Yes */
      table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
      /* Styling your links has become much simpler with the new Yahoo.  In fact, it falls in line with the main credo of styling in email and make sure to bring your styles inline.  Your link colors will be uniform across clients when brought inline.
      Bring inline: Yes. */
      a {color: #6d84b4;}
      /***************************************************
      ****************************************************
      MOBILE TARGETING
      ****************************************************
      ***************************************************/
      @media only screen and (max-device-width: 480px) {
      /* Part one of controlling phone number linking for mobile. */
      a[href^="tel"], a[href^="sms"] {
      text-decoration: none;
      color: blue; /* or whatever your want */
      pointer-events: none;
      cursor: default;
      }
      .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
      text-decoration: default;
      color: orange !important;
      pointer-events: auto;
      cursor: default;
      }
      }
      /* More Specific Targeting */
      @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
      /* You guessed it, ipad (tablets, smaller screens, etc) */
      /* repeating for the ipad */
      a[href^="tel"], a[href^="sms"] {
      text-decoration: none;
      color: blue; /* or whatever your want */
      pointer-events: none;
      cursor: default;
      }
      .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
      text-decoration: default;
      color: orange !important;
      pointer-events: auto;
      cursor: default;
      }
      }
      @media only screen and (-webkit-min-device-pixel-ratio: 2) {
      /* Put your iPhone 4g styles in here */
      }
      /* Android targeting */
      @media only screen and (-webkit-device-pixel-ratio:.75){
      /* Put CSS for low density (ldpi) Android layouts in here */
      }
      @media only screen and (-webkit-device-pixel-ratio:1){
      /* Put CSS for medium density (mdpi) Android layouts in here */
      }
      @media only screen and (-webkit-device-pixel-ratio:1.5){
      /* Put CSS for high density (hdpi) Android layouts in here */
      }
      /* end Android targeting */
    </style>
    <!-- Targeting Windows Mobile -->
    <!--[if IEMobile 7]>
    <style type="text/css">
    </style>
    <![endif]-->
    <!-- ***********************************************
      ****************************************************
      END MOBILE TARGETING
      ****************************************************
      ************************************************ -->
    <!--[if gte mso 9]>
    <style>
      /* Target Outlook 2007 and 2010 */
    </style>
    <![endif]-->
  </head>
  <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#3b5998">
      <tbody>
        <tr>
          <td align="center">
            <center>
              <table border="0" width="600" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td style="padding-left: 15px;" height="40">
                      <a href="#" style="color:#ffffff !important;font-size: 20px;font-weight: 200;text-decoration:none"><?php echo $subject; ?></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </center>
          </td>
        </tr>
      </tbody>
    </table>
    <center>
      <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
        <tr>
          <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff;">
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                      <td valign="top">
                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                          <tr>
                            <td valign="top" style="padding: 15px;">
                              <div>
                                <strong>Dear, User</strong>
                                <br />
                                <br />
                                Welcome to <?php echo SITENAME; ?>!
                                <br />
                                <br />
                                This is an automatic email sent by the system robot, please do not reply.
                                <br />
                                <br />
                                You have received this email because this email address was used during registration for our services. If you did not register at our website, please disregard this email. You do not need to unsubscribe or take any further action.
                                <br />
                                <br />
                                ------------------------------------------------
                                <br />
                                Your account will be activated after you confirm it by clicking the link below:
                                <br />
                                {unwrap}<a href="<?php echo $url; ?>"><?php echo $url; ?></a>{/unwrap}
                                <br />
                                (Some email client users may need to copy and paste the link into your web browser)
                                <br />
                                ------------------------------------------------
                                <br />
                                <br />
                                As a reminder, here is your account name: <strong><?php echo $email; ?></strong>
                                <br />
                                <br />
                                Thank you for registering and enjoy your stay!
                                <br />
                                <br />
                                Sincerely,
                                <br />
                                <?php echo SITENAME; ?> Services Team
                                <br />
                                <br />
                                <br />
                              </div>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </center>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#3b5998">
      <tbody>
        <tr>
          <td align="center">
            <center>
              <table border="0" width="600" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td style="color:#ffffff !important; font-size:20px; padding-left:10px;" height="40">
                      <center>
                        <p style="font-size:12px; line-height:18px;">
                          <a href="#" style="color:#ffffff !important;">I do not want to receive this email anymore.</a>
                          <br />
                          <a href="#" style="color:#ffffff !important;">update subscription preferences</a>
                        </p>
                      </center>
                    </td>
                  </tr>
                </tbody>
              </table>
            </center>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
