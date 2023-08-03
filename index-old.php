<?php

 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    $url_components = parse_url($url);
 
    // Use parse_str() function to parse the
    // string passed via URL
    parse_str(@$url_components['query'], $params);
   

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hawkins</title>
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
      fbq('init', '725137825958020');
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
  src="https://www.facebook.com/tr?id=725137825958020&ev=PageView&noscript=1"
/></noscript>
<!-- Meta Pixel Code -->

    <div class="wrapper">
        <div class="header-container mb-1">
            <div class="d-flex align-items-center">
                <div class="haw-logo">
                    <img class="haw-logo-img" src="images/hawkins-logo.png" alt="hawkins-logo" loading="lazy">
                </div>
                <div class="text-heading text-center">
                    <h1>Monsoon<br>Offer!</h1>
                </div>
            </div>
            <div class="d-block">
                <img src="images/<?php if(@$params['utm_content'] != ''){echo $params['utm_content'].'.jpg';}else {echo 'PizzaPan.jpg';} ?>" alt="pizza maker" class="d-block  mx-auto img-fluid" loading="lazy">
            </div>
            <p class="text-center text-light py-2" style="font-size:12px">* Offer applicable to 350+ products. </p>
        </div>
        <div class="container">
            <div class="discount big text-center d-flex justify-content-center ">
                <p>Get upto <span class="red">20%</span> off</p>
            </div>
            <div class="discount text-center d-flex flex-border border-bottom border-5 mb-3 justify-content-center">
                <p class="mb-2 borderflex">BUY <span class="red">1</span> Get <span class="red">10%</span> off</p>
                <p class="mb-2 borderflex">BUY <span class="red">2</span> Get <span class="red">15%</span> off</p>
                <p class="mb-2 borderflex">BUY <span class="red">3</span> Get <span class="red">20%</span> off</p>
            </div>
        </div>
            <div class="product-images-container mb-3">
                <div class="img-contain">
                    <img class="futura-logo-img" src="images/dosa-tava.jpg" alt="Dosa tava" loading="lazy">
                </div>
                <div class="img-contain">
                    <img class="futura-logo-img" src="images/appachatty.jpg" alt="Appachatty" loading="lazy">
                </div>
                <div class="img-contain">
                    <img class="futura-logo-img" src="images/appe-pan.jpg" alt="Appe Pan" loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/stainless-steel-handi.jpg" alt="Stainless steel handi"
                        loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/pizza-maker.jpg" alt="Pizza maker" loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/ceramic-nonstick.jpg" alt="Ceramic nonstick"
                        loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/contura-black-xt.jpg" alt="Contura black xt"
                        loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/futura.jpg" alt="Futura" loading="lazy">
                </div>
                <div class="img-contain">

                    <img class="futura-logo-img" src="images/instaa.jpg" alt="Instaa" loading="lazy">
                </div>
                <div class="img-contain">
                    <img class="futura-logo-img" src="images/stainless-steel-contura.jpg" alt="stainless steel contura"
                        loading="lazy">
                </div>
            </div>
            <div class="container mb-3">
           <ul>
               <!--<li>Enter mobile number below without +91 or country prefix.</li>-->
               <li>Receive discount coupon code and dealer details on WhatsApp/SMS. </li>
               <li>Offer valid only on mobile numbers registered in India.</li>
           </ul>
                <form method="post" action="thank-you.php" id="form">
                    <div class="row mb-3 align-items-center">
                            <label for="InputMobile" class="col form-label pe-0 mb-0">Mob. No. :</label>
                            <div class="col-9">
                                <input type="text" name="mobile" class="form-control rounded-0"
                                placeholder="Please enter 10 digit mobile number." id="InputMobile" maxlength="10"
                                pattern=".{10,10}" inputmode="numeric"
                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"
                                title="Please enter 10 digit mobile number." required="">
                            </div>   
                    </div>
                    <!--<div class="mb-3 form-check">-->
                    <!--    <input type="checkbox" class="form-check-input" id="Check1" required>-->
                    <!--    <label class="form-check-label form-text d-inline" for="Check1">I, hereby, authorise Hawkins Cookers Limited and any of its representtives to contact me on the above number regarding its products and/or offers. </label>-->
    
                    <!--</div>-->
                    <input type="hidden" name="utm_campaign" value="<?php echo @$params['utm_campaign']; ?>" />
                    <input type="hidden" name="utm_source" value="<?php echo @$params['utm_source']; ?>" />
                    <input type="hidden" name="utm_medium" value="<?php echo @$params['utm_medium']; ?>" />
                    <input type="hidden" name="utm_content" value="<?php echo @$params['utm_content']; ?>" />
                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-dark rounded-0" id="mobile_submit">GET COUPON</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="fixed-bottom"><button  name="floatbtn" id="myBtn" class="btn btn-dark rounded-0 w-100 py-3" onClick="myForm();">GET COUPON</button></div>
     
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script>
        function myForm()
        {
            // var btn = document.getElementById('myBtn');
            // document.getElementById('form').scrollIntoView();
            // btn.style.display='none';
            document.body.scrollTop  = 1470;
            document.documentElement.scrollTop = 1470;
            
        }
        
        // When the user scrolls down 20px from the top of the document, show the button
        
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          var btn = document.getElementById('myBtn');  
          if (document.body.scrollTop  > 850 || document.documentElement.scrollTop  > 850) {
            btn.style.display = "none";
          } else {
            btn.style.display = "block";
          }
        }

    </script>    
</body>

</html>