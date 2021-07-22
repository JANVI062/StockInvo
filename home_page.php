<?php include('db_connect.php');?>
<!DOCTYPE html>
<html>
<title>Stockinvo</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/e685eee35c.js" crossorigin="anonymous"></script>
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
    }
    
    body,
    html {
        height: 100%;
        line-height: 1.8;
    }
    /* Full height image header */
    
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url("https://cdn.hipwallpaper.com/i/87/59/yaQMpF.jpg");
        min-height: 100%;
    }
    
    .w3-bar .w3-button {
        padding: 10px;
    }
    
    .logo {
        margin-top: 2px;
        height: 20%;
        width: auto;
    }
    
    .logo img {
        height: 38px;
        width: 10rem;
    }
</style>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <a href="#home" class="w3-bar-item w3-button logo"><img src="assets\img\stockinvo2.jpeg"></a>
            <!-- Right-sided navbar links -->

            <div class="w3-left w3-hide-small" style="margin-left:200px;">
                <a href="#why stockinvo?" class="w3-bar-item w3-button" style="margin-right: 30px;"><i class="fas fa-question-circle"></i> Why stockinvo</a>
                <a href="#how it works?" class="w3-bar-item w3-button" style="margin-right: 30px;"><i class="fa fa-th"></i> How it works?</a>
                <a href="#contact us" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> Contact Us</a>
            </div>
            <div class="w3-right w3-hide-small">
                <a href="login.php" class="w3-bar-item w3-button"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
                <a href="registration.php" class="w3-bar-item w3-button"><i class="fas fa-user-plus"></i> REGISTER</a>
            </div>

            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!-- Sidebar on small screens when clicking the menu icon -->
    <!-- <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
        <a href="#why stockinvo?" class="w3-bar-item w3-button">WHY STOCKINVO?</a>
        <a href="#how it works?" class="w3-bar-item w3-button"><i class="fa fa-user"></i> HOW IT WORKS?</a>
        <a href="#contact us" class="w3-bar-item w3-button"><i class="fa fa-th"></i> CONTACT US</a>
        <a href="#login" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> LOGIN</a>
        <a href="#register" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> REGISTER</a>
    </nav> -->

    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        <div class="w3-display-left w3-text-white" style="padding:48px">
            <span class="w3-jumbo w3-hide-small">Automate your wholesale business</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Automate your wholesale business</span><br>
            <span class="w3-large">A complete operations platform for wholesale and distribution.</span>
            <p><a href="registration.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Get Started</a></p>
        </div>
        <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
        </div>
    </header>

    <!-- WHY STOCKINVO?? -->
    <div class="w3-container" style="padding:128px 16px" id="why stockinvo?">
        <h2 class="w3-center"><b>Why stockinvo?</b></h2>
        <div class="w3-row-padding w3-center" style="margin-top:64px">
            <div class="w3-quarter">
                <i class="fa fa-tasks w3-margin-bottom w3-jumbo w3-center"></i>
                <p class="w3-large">Unify operational efficiency</p>
                <p>Centralize your online and offline sales channels, inventory locations, suppliers, and customers in one system to reduce costs and save time.</p>
            </div>
            <div class="w3-quarter">
                <i class="fa fa-signal w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Real-time Reporting</p>
                <p>Stockinvo offers real-time financial and sales reports, enabling you to make better decisions day-to-day, instead of only getting to your insights at the end of the month.</p>
            </div>
            <div class="w3-quarter">
                <i class="fa fa-chalkboard-teacher w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Implements 100%</p>
                <p>The best thing about Stockinvo is that it’s extremely easy to understand and use.</p>
            </div>
            <div class="w3-quarter">
                <i class="fa fa-chart-line w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Gain insight into inventory</p>
                <p>Stockinvo allows you to track inventory costs in real time and manage your inventory efficiently in the warehouse.</p>
            </div>
        </div>
    </div>

    <!-- Promo Section - "How it works??" -->
    <div class="w3-container w3-light-grey" style="padding:90px 30px" id="how it works?">
        <h2 class="w3-center" style="margin-bottom:100px;"><b>How it works?</b></h2>
        <div class="w3-row-padding">
            <div class="w3-col m6">
                <h3>Your all-in-one dashboard</h3>
                <p>Stockinvo makes monitoring and managing your billing and upcoming expenses very simple. Right from the home page having features like total sales for the current day, reorder point and list of expired products - Stockinvo offers you everything in a few clicks.</p>
            </div>
            <div class="w3-col m6" style="float: right;">
                <img class="w3-image w3-round-large" src="assets\img\Dashboard.jpg" alt="Buildings" width="600" height="300">
            </div>
        </div>
    </div>

    <div class="w3-container w3-light-grey" style="padding:90px 30px">
        <div class="w3-row-padding">
            <div class="w3-col m6" style="float: right; margin-right: -15px;">
                <h3>Track your Purchase and Sales Transactions</h3>
                <p>This feature helps you to get a timeline view of every activity in sales and purchase. Sale Receipts can be generated quickly and individually. You can print them for your customers at the push of a button. Fastest documentation, generation of reports and many more features that will help you efficiently to manage your sales and purchase transactions.</p>
            </div>
            <div class="w3-col m6" style="float: left;">
                <img class="w3-image w3-round-large" src="assets\img\Reports.jpg" alt="Buildings" width="600" height="300">
            </div>
        </div>
    </div>

    <div class="w3-container w3-light-grey" style="padding:90px 30px">
        <div class="w3-row-padding">
            <div class="w3-col m6">
                <h3>Inventory Management</h3>
                <p>The Inventory Management tool allows you to purchase inventory, manage stock movement and lets you keep track of the current stock.Some of the features with the Inventory Management Software are: Creating purchase orders, automated reminders when the stock is low, tracking of current stock value and many more features that will help you efficiently track your stock.</p>

            </div>
            <div class="w3-col m6">
                <img class="w3-image w3-round-large" src="assets\img\Inventory.jpg" alt="Buildings" width="600" height="300">
            </div>
        </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-64 w3-theme-l5" id="contact us">
        <h2 class="w3-center" style="margin-bottom: 50px;">Contact Us</h2>
        <div class="w3-row">
            <div class="w3-col m5">
                <h3>Address</h3>
                <p><i class="fa fa-map-marker w3-xlarge" style="color: #074b82;"></i>  Patiala, Punjab</p>
                <p><i class="fa fa-phone w3-xlarge" style="color: #074b82;"></i>  9876543210</p>
                <p><i class="fa fa-envelope-o w3-xlarge" style="color: #074b82;"></i>  stockinvo@gmail.com</p>
                <br>
                <i class="fa fa-facebook w3-hover-opacity w3-xlarge" style="margin-right: 40px;color: #074b82;"></i>
                <i class="fa fa-twitter w3-hover-opacity w3-xlarge" style="margin-right: 40px;color: #074b82;"></i>
                <i class="fa fa-linkedin w3-hover-opacity w3-xlarge" style="margin-right: 40px;color: #074b82;"></i>
                <i class="fab fa-instagram w3-hover-opacity w3-xlarge" style="color: #074b82;"></i>
            </div>
            <div class="w3-col m7">
                <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
                    <div class="w3-section">
                        <label>Name</label>
                        <input class="w3-input" type="text" name="Name" required>
                    </div>
                    <div class="w3-section">
                        <label>Email</label>
                        <input class="w3-input" type="text" name="Email" required>
                    </div>
                    <div class="w3-section">
                        <label>Message</label>
                        <input class="w3-input" type="text" name="Message" required>
                    </div>
                    <button type="submit" class="w3-button w3-right w3-theme">Send</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>



    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>

</body>

</html>