<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 $hostName = "localhost";
 $userName = "ghtiq4scqxf6_couponcode";
 $password = "nhRXfNy2TwbWEpWr";
 $dbName = "ghtiq4scqxf6_couponcode";
 $conn= new mysqli($hostName,$userName,$password,$dbName);
 //if($conn){echo "connected";}else{ echo "not connected";}
 
 
date_default_timezone_set('Asia/Kolkata');


/* Posted form data */

if(isset($_POST['submit']))
{
    
  $mobile =  htmlspecialchars($_POST['mobile']);
  $utm_campaign = htmlspecialchars($_POST['utm_campaign']);
  $utm_source = htmlspecialchars($_POST['utm_source']);
  $utm_medium = htmlspecialchars($_POST['utm_medium']);
  $utm_content = htmlspecialchars($_POST['utm_content']);

  /* function to generate random string */
  function generateRandomString($length = 6) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678901234567890123456789';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $result;
    }
    
  $coupon = generateRandomString();
  
  $Date = date('Y-m-d');
  
  $added14days = date('Y-m-d', strtotime($Date. ' + 14 days'));
  $krr    = explode('-', $added14days);
  $added14days = implode("", $krr);
  
  /* php code to coupon code */
  $coupon ="";
  $sql ="SELECT * FROM `couponcode_tbl` WHERE phoneno=".$mobile;
  
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
      while($row = $result->fetch_assoc()) {
       $coupon =  $row["couponcode"];
      }
    } else {
         
      $sql1 = "SELECT * FROM `couponcode_tbl` WHERE phoneno='' LIMIT 1";
      $result1 = $conn->query($sql1);
          if ($result1->num_rows > 0) {
              
          while($row1 = $result1->fetch_assoc()) {
           $coupon =  $row1["couponcode"];
           
           $id = $row1['ID'];
           $sql2 = "UPDATE couponcode_tbl SET phoneno=".$mobile." WHERE id=".$id;
           
               if ($conn->query($sql2) === TRUE) 
               {
                      
                } else 
                {
                      
                }
       
            }
            } else {
              
             //echo "coupon full"; 
              
            }
      
    }
  /* php code to coupon code */
  
  $mapArray = array( "Hyderabad" => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15224.122504037625!2d78.4453373!3d17.4582482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90ee67996bbd%3A0x47b94ac2af3aae90!2sAgromech%20Industries!5e0!3m2!1sen!2sin!4v1688713000918!5m2!1sen!2sin", "Coimbatore" =>"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62661.156919901!2d76.8814514!3d11.0144267!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba858fd4590ee25%3A0xea6851ba58cb548b!2sIdeal%20Stores!5e0!3m2!1sen!2sin!4v1688713415189!5m2!1sen!2sin", "Bengaluru" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.9016470135994!2d77.6394985!3d12.9781421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16a5020f8351%3A0x7663d050bd3e408d!2sPots%20%26%20Pans!5e0!3m2!1sen!2sin!4v1688713566914!5m2!1sen!2sin", "Kannur" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.521851774491!2d75.366025!3d11.8687057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba422cab556fb3b%3A0x90a26fc49a44befb!2sNikshan%20Electronics!5e0!3m2!1sen!2sin!4v1688713648515!5m2!1sen!2sin" );
   
   $dealerArray = array("Hyderabad" => "Agro Mech Industries", "Coimbatore" => "Ideal Stores",  "Bengaluru" => "Pots And Pans International", "Kannur" =>"Nikshan Electronics");
   
   $addressArray = array("Hyderabad" => "B-7, Agromech Industries, Industrial Estate, near Little Scholar School, Sanath Nagar, Hyderabad, Telangana 500018", "Coimbatore" => "8, Bashyakarlu Rd, R.S. Puram, Coimbatore, Tamil Nadu 641002",  "Bengaluru" => "10, Chinmaya Mission Hospital Rd, Stage 1, Indiranagar, Bengaluru, Karnataka 560038", "Kannur" =>"Nikshan Arena, Bank Rd, Kannur, Kerala 670001");
   
   $contactArray = array("Hyderabad" => "9866325626", "Coimbatore" => "9843014521",  "Bengaluru" => "9620365158", "Kannur" =>"9633958269");
   
   $googleLinkArray = array("Hyderabad" => "https://goo.gl/maps/hQ6FAiwRPmKpydKe9", "Coimbatore" => "https://goo.gl/maps/ACsqxKtTLGKfPHkV8",  "Bengaluru" => "https://goo.gl/maps/SA12BfCo4rYELd3f9", "Kannur" =>"https://goo.gl/maps/g9xdVz2rTtcEJadS7");
   /* whats app integration */
   
   //$allAddress='B-7%2C%20Agromech%20Industries%2C%20Industrial%20Estate%2C%20near%20Little%20Scholar%20School%2C%20Sanath%20Nagar%2C%20Hyderabad%2C%20Telangana%20500018%20%0A%0A8%2C%20Bashyakarlu%20Rd%2C%20R.S.%20Puram%2C%20Coimbatore%2C%20Tamil%20Nadu%20641002%20%0A%0A10%2C%20Chinmaya%20Mission%20Hospital%20Rd%2C%20Stage%201%2C%20Indiranagar%2C%20Bengaluru%2C%20Karnataka%20560038%0A%0ANikshan%20Arena%2C%20Bank%20Rd%2C%20Kannur%2C%20Kerala%20670001';
    $allAddress="nearest Hawkins dealer";
    $address ='';
    
  if($addressArray[$utm_campaign] != ''){$address = urlencode($dealerArray[$utm_campaign].", ".$addressArray[$utm_campaign]); }else{ $address = urlencode($allAddress);}
    $whatsAppUrl = "https://media.smsgupshup.com/GatewayAPI/rest?userid=2000206964&password=QpGRhmGJ&send_to=".$mobile."&v=1.1&format=json&msg_type=TEXT&method=SENDMESSAGE&msg=Confirmed%21+%0A".$coupon."%0AHere%E2%80%99s+your+exclusive+coupon+from+%0AHawkins+Cookers+Limited+that+entitles+you+to++%0A%0A10%25+off+on+purchase+of+one+product+%0A15%25+off+on+purchase+of+two+products%0A20%25+off+on+purchase+of+three+products.+%0A%0AThis+coupon%2Foffer+can+be+redeemed+at+%0A".$address.".++Map:++".$googleLinkArray[$utm_campaign]."%0AT%26C+Apply.";
    //echo $whatsAppUrl;
            $ch = curl_init($whatsAppUrl); 
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
            $result = curl_exec($ch);
          //  print_r($result);exit;
    
   /* whats app integration */
   
   /* SMS Integration */
   
   $smsUrl ="https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&msg_type=TEXT&userid=2000175036&auth_scheme=plain&password=abc123&v=1.1&format=text&send_to=".$mobile."&msg=Confirmed!%0A%0A".$coupon."%0A%0AHere%27s%20your%20exclusive%20coupon%20from%0A%0AHawkins%20Cookers%20Limited%20that%20entitles%20you%20to%3A%2010%25%20off%20on%20purchase%20of%20one%20product%2C%2015%25%20off%20on%20purchase%20of%20two%20products%20and%2020%25%20off%20on%20purchase%20of%20three%20products.%20This%20coupon%2Foffer%20can%20be%20redeemed%20at%3A%0A%0A".urlencode($dealerArray[$utm_campaign])."%0A%0AT%26C%20Apply.%0A%0AHAWKINS%20COOKERS%20LTD";
    $ch = curl_init($smsUrl); 
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
            $result = curl_exec($ch);
   
   /* SMS Integration */
   
   /* SMTP Mailer Code  */
   
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    $mail = new PHPMailer(true); 
    
    try {
    
        //Recipients
        $mail->setFrom('shreey94@gmail.com', 'RKS Digital');     
        $mail->addAddress('anand.chakrapani@rkswamy.com', 'Anand C');      
        $mail->addBCC('shreey94@gmail.com', 'Yshreekant');
        //$mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Username = "shreey94@gmail.com";
        $mail->Password = "josahzdbvreqaotd";
        $mail->Host = "smtp.gmail.com";
        $mail->Mailer = "smtp";
        $mail->Port = 465;
        $mail->isHTML(true);                                 
        $mail->Subject = 'Campaign Enquiry';
        $mail->Body    = "<html>

            <head>
        
            <style type='text/css'>
            
            * {
            
              margin: 0;
            
              padding: 0;
            
            }
            
            table, td {
            
             mso-table-lspace:0pt;
            
             mso-table-rspace:0pt;
            
            }
            table.border tr td{
                padding: 7px;
                border:1px solid #000;
            }
            
            table {
            
              border-collapse: collapse;
            
            }
            
            body, table, td, p, a, li, blockquote{
            
              -ms-text-size-adjust:100%;
            
              -webkit-text-size-adjust:100%;
            
            }
            
            img {
            
              display: block;
            
              border: 0px;
            
            }
            
            </style>
            
            </head>
            
            <body>
            <!--  -->
              <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' border='0' align='center' style='border:1px solid #cccccc; width: 600px;'>
            
            
                    <tr>
            
                    <td height='50' valign='top' style='display:block; font-size:0;'></td>
            
                    </tr>
            
                    <tr>
            
                      <td  valign='top' style=' display:block; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; padding-left:45px;font-weight: 600'>Dear Admin,</td>
            
                    </tr>
            
                    <tr>
            
                    <td height='20' valign='top' style='display:block; font-size:0;'></td>
            
                    </tr>
            
                    <tr>
            
                      <td valign='top'  style='display:block; font-family:Arial, Helvetica, sans-serif; color:#000000;font-size:16px; padding-left:45px;'>A user is expressing interest in product from Hawkins India. <br>
            You have enquired for below product/s.</td>
            
                    </tr>
            
                    <tr>
            
                    <td height='42' valign='top' style='display:block; font-size:0;'></td>
            
                    </tr>
            
                      <tr>
            
                    <td height='30' valign='top' style='display:block; font-size:0;'></td>
            
                    </tr>
            
                     <tr>
          <td valign='top'  style='display:block; font-family:Arial, Helvetica, sans-serif; color:#000000;font-size:16px; padding-left:45px;'>A user has enquired about our product/services. <br> Kindly find the details below.</td>
        </tr>
        <tr>
        <td height='42' valign='top' style='display:block; font-size:0;'></td>
        </tr>
        
        <tr>
          <td style='padding-left:45px;display:block' valign='top'>
            <table cellspacing='0' cellpadding='0' class='border'>
                <tr>
                    <td>Mobile</td>
                    <td>Campaign</td>
                    <td>Source</td>
                    <td>Medium</td>
                    <td>Product</td>
                    <td>Coupon code</td>
                  </tr>
                  <tr>
                    <td>".$mobile ."</td>
                    <td>".$utm_campaign ."</td>
                    <td>".$utm_source ."</td>
                    <td>".$utm_medium ."</td>
                    <td>".$utm_content ."</td>
                    <td>".$coupon ."</td>
                    
                </tr>
            </table>
            </td>
        </tr>
                    
            
                    <tr>
            
                    <td height='30' valign='top' style='display:block; font-size:0;'></td>
            
                    </tr>
            
                    <tr>
            
                      <td  valign='top' style=' display:block; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; padding-left:45px;'>Best Regards</td>
            
                    </tr>
            
                    <tr>
            
                      <td  valign='top' style=' display:block; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; padding:10px 0px 0 45px;font-weight:bold;'>Hawkins</td>
            
                    </tr>
            
                </table>
            
            </body>
            
            </html>";
    
            $mail->send();
            //echo 'Message has been sent using localhost';
        }  catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
 
   /*<tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Mobile</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$mobile ."</td>
                </tr>
                <tr>
                <td height='25' valign='top' style='display:block; font-size:0;'></td>
                </tr>
                <tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Campaign</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$utm_campaign."</td>
                </tr>
                <tr>
                <td height='25' valign='top' style='display:block; font-size:0;'></td>
                </tr>
                <tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Source</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$utm_source."</td>
                </tr>
                <tr>
                <td height='25' valign='top' style='display:block; font-size:0;'></td>
                </tr>
                <tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Medium</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$utm_medium."</td>
                </tr>
                <tr>
                <td height='25' valign='top' style='display:block; font-size:0;'></td>
                </tr>
                <tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Product</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$utm_content."</td>
                </tr>
                <tr>
                <td height='25' valign='top' style='display:block; font-size:0;'></td>
                </tr>
                
                <tr>
                    <td width='160'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000; font-weight: 600;'>Coupon code</td>
                    <td width='15'   valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;padding: 0 20px;'>:</td>
                    <td width='425'  valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000000;'>".$coupon."</td>
                </tr>*/
   /* SMTP Mailer Code  */
  
        
        /* Hawkins database API */
        
            $url = "https://register.hawkins.in/gencouponcodegdnjul2023.aspx?ccd=".$coupon."&custmobno=".$mobile."&vali=".$added14days."&loc=".$utm_campaign;
            $ch = curl_init($url); 
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
            $result = curl_exec($ch);
          //  echo $url;
          //  print_r($result);
         
          
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PLVFQWD');</script>
    <!-- End Google Tag Manager -->
    <!-- Event snippet for Coupon_Thankyou_Page conversion page -->
    <script>
      gtag('event', 'conversion', {'send_to': 'AW-603721565/uxjoCN_6v7oYEN2e8J8C'});
    </script>
    
    <!-- Meta Pixel Code -->


        <script>
        
        
        !function(f,b,e,v,n,t,s)
        
        
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        
        
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        
        
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        
        
        n.queue=[];t=b.createElement(e);t.async=!0;
        
        
        t.src=v;s=b.getElementsByTagName(e)[0];
        
        
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        
        
        'https://connect.facebook.net/en_US/fbevents.js');
        
        
        fbq('init', '267722535921149');
        
        
        fbq('track', 'PageView');
        
        
        </script>

    <!-- Meta Pixel Code -->
</head>
<body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLVFQWD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Meta Pixel Code -->
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=267722535921149&ev=PageView&noscript=1"
/></noscript>
<!-- Meta Pixel Code -->

    <div class="wrapper">
        <div class="header-container mb-3">
            <div class="d-flex align-items-center">
                <div class="haw-logo">
                    <img class="haw-logo-img" src="images/hawkins-logo.png" alt="hawkins-logo" loading="lazy">
                </div>
                <div class="text-heading text-center">
                   <h1>Monsoon<br>Offer!</h1>
                </div> 
            </div>        
        </div>
        <div class="container">
           
            <h2 class="mb-3">Thank you for showing interest!</h2>
            <p>
                You are entitled to the following offer
                On buying 3 Hawkins products in one transaction, you are entitled to a discount of 20% on the MRP of the
                products.
            </p>
            <div class="coupon mb-4">
                <div class="copy-button">
                  <input id="copyvalue" type="text" readonly="" value="<?php echo $coupon;?>">
                  <button onclick="copyIt()" class="copybtn">COPY</button>
                </div>    
            </div>
            <p> To redeem your coupon please visit the dealer mentioned below:</p>
            <div class="dealer-add">
                <?php if(@$dealerArray[$utm_campaign] != ''  ) { ?>
                <h2><?php echo $dealerArray[$utm_campaign];  ?></h2>
                <?php }
                else {
                     ?>
                     <div class="dealer-add">
                                <h2>Ideal Stores</h2>
                                                <p class="mb-0">8, Bashyakarlu Rd, R.S. Puram, Coimbatore, Tamil Nadu 641002 </p>
                                                <span class="icon-call d-inline-block"></span>
                <strong class="mb-3 d-inline-block"><a href="tel:9567546541">9843014521</a></strong>
                         


                                <h2>Agro Mech Industries</h2>
                                                <p class="mb-0">B-7, Agromech Industries, Industrial Estate, near Little Scholar School, Sanath Nagar, Hyderabad, Telangana 500018 </p>
                                                <span class="icon-call d-inline-block"></span>
                <strong class="mb-3 d-inline-block"><a href="tel:9567546541">9866325626</a></strong>
                            

                                <h2>Pots And Pans International</h2>
                                                <p class="mb-0">10, Chinmaya Mission Hospital Rd, Stage 1, Indiranagar, Bengaluru, Karnataka 560038 </p>
                                                <span class="icon-call d-inline-block"></span>
                <strong class="mb-3 d-inline-block"><a href="tel:9567546541">9620365158</a></strong>
                           

                                <h2>Nikshan Electronics</h2>
                                                <p class="mb-0">Nikshan Arena, Bank Rd, Kannur, Kerala 670001 </p>
                                                <span class="icon-call d-inline-block"></span>
                <strong class="mb-3 d-inline-block"><a href="tel:9567546541">9633958269</a></strong>
                            </div>
               <?php }
                ?>
                <?php if(@$addressArray[$utm_campaign] != ''  ) { ?>
                <p class="mb-0"><?php echo $addressArray[$utm_campaign];  ?> </p>
                <?php } ?>
                <?php if(@$contactArray[$utm_campaign] != '' ) { ?>
                <span class="icon-call d-inline-block"></span>
                <strong><a href="tel:9567546541"><?php echo $contactArray[$utm_campaign];  ?></a></strong>
                <?php } ?>
            </div>
            <?php if(@$mapArray[$utm_campaign] != '') { ?> 
            <div id="map">
                <iframe src="<?php echo $mapArray[$utm_campaign] ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <?php }  ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script>
        let copybtn = document.querySelector(".copybtn");
        
        function copyIt(){
          let copyInput = document.querySelector('#copyvalue');
        
          copyInput.select();
        
          document.execCommand("copy");
        
          copybtn.textContent = "COPIED";
        }
    </script>    
</body>

</html>