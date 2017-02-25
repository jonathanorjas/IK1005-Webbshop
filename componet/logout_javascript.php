<!DOCTYPE html>
<html>
<head>
<title>Facebook Logut JavaScript Example</title>
<!--<meta charset="UTF-8">-->
 <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
</head>
<body>
<script>
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '381424215218490',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    status	   :true,
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });
}//end anonymfunction
 

  
        
function logout() {
	alert("Facebook: Du är utloggad som administratör och kommer att skickas till bilsidan");
	try {
        if (FB.getAccessToken() != null) {
            FB.logout(function(response) {
                // user is now logged out from facebook do your post request or just redirect
                window.location.href="http://users.du.se/~pei/dawa/shoppingsitetutorial/start/index1.php?PDOController/getAllProducts";
            });
        } else {
            // user is not logged in with facebook, maybe with something else
            window.location.href="http://users.du.se/~pei/dawa/shoppingsitetutorial/start/index1.php?PDOController/getAllProducts";
        }
    } catch (err) {
        // any errors just logout
         window.location.href="http://users.du.se/~pei/dawa/shoppingsitetutorial/start/index1.php?PDOController/getAllProducts";
    }
	/*
	alert("i logut");
            FB.logout(function(response) {
            	alert("utloggad");
              window.location.href="http://users.du.se/~pei/dawa/netbeanshemma/Twig-1.15.0/start/index1.php?PDOController/getAllProducts";
            });
        */
}//end function
//bli utloggad när du surfar in sidan
//window.onload(logout());        
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->


<button onclick="logout()" class="pure-button pure-button-primary">Logga ut från facebook</button><br>
<a href="http://users.du.se/~pei/dawa/netbeanshemma/Twig-1.15.0/start/index1.php?PDOController/getAllCars">Till Alla bilar</a>





</body>
</html>