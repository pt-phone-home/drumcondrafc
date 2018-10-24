<html lang="en">
<head>
    <?php include 'components/head.php';
    ?>
    <title>Contact - Drumcondra A.F.C</title>
</head>
<body>
    
    <div class="contact-container">
    
        <?php include 'components/banner.php'; ?>

        <?php include 'components/header.php'; ?>

        <div class="contact-header">
            <h1>Contact Information</h1>
            <i class="fas fa-phone-square"></i>
        </div>

        <div class="contact-info">
            <div class="contact-info-form">
                <div class="contact-info-form-container">
                    <h1>Contact form</h1>

                    <form action="" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="teamName">Team Name: (Optional)</label>
                            <input type="text">
                        </div>
                        <div class="form-group">
                            <label for="message" class="message-label">Message:</label>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Write your message here"></textarea>
                        </div>
                        <input type="submit" value="Send" class="submit">


                    </form>
                </div>
            </div>
            <div class="contact-info-contact">
                <h1>Contact Details</h1>
                <div class="member">
                    <div class="member-pic">
                    <img src="http://placehold.it/100x100" class="avatar-lg" alt="">
                    </div>
                    <h3>Frank Conolly</h3>
                    <h3> 086 833 1909</h3>
                </div>
                <div class="member">
                    <div class="member-pic">
                    <img src="http://placehold.it/100x100" class="avatar-lg" alt="">
                    </div>
                    <h3>Brian Martin</h3>
                    <h3> 087 744 3583</h3>
                </div>
                <h4>Email: <span>drumcondrafc@gmail.com</span></h4>
                
                
            </div>
        </div>
        
        

        <?php include 'components/footer.php'; ?>
    </div>

    
    
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/modal2.js"></script>
  
</body>
</html>