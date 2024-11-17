<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizSphere</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="C:\Users\Rungshita Sarkar\OneDrive\Desktop\MINOR PROJECT\Quizsphere_icon.jpeg"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>QuizSphere</title>
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Navber/style.css">
</head>



<body>
    <?php
    include '../Navber/teachnav.php';
    ?>
    <br>
    <div class="contact">

        <h2 class="cnt">Contact Us</h2>
        <div class="flex-container">
            <div class="flex-item-left">

                <i class="fa-solid da fa-envelope"> <span class="MAIL">quizsphere10@gmail.com</span></i><br>
                <i class="fa-solid da fa-phone"> <span class="PHN">(+91) 8583033156</span> </i><br>
                <i class="fa-solid da fa-house"><br><a href="https://maps.app.goo.gl/4ucSS2QSyLoJiRNJ9"
                        class="adds"></a><iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1837.7845185409078!2d88.3803854!3d22.8923732!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89167529a8f17%3A0xe94a8f21ca53259a!2sTechno%20India%20(Hooghly%20Campus)!5e0!3m2!1sen!2sin!4v1729959212756!5m2!1sen!2sin"
                        width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></i>

            </div>
            <div class="flex-item-right">
                <form id="contactForm">
                    <input type="text" placeholder="Your Full Name" id="name" name="name" required>
                    <input type="email" id="email" name="email" required placeholder="Email Id">
                    <input type="Phone" id="Phone" name="Phone" required placeholder="Phone No">
                    <textarea id="message" name="message" required placeholder="Message"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>