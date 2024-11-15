// Image Carousel
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) { myIndex = 1 }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}

// Popup Toggle Function
function togglePopup() {
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
}

// Show and Hide Popup for Sign In/Sign Up Forms
function showPopup(role) {
    document.getElementById('popupOverlay').style.display = 'flex';
    document.getElementById('popupBox').style.display = 'block';
    showSignIn(); // Default to Sign In form
}

function hidePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
    document.getElementById('popupBox').style.display = 'none';
}

// Form Toggle Functions
function showSignIn() {
    document.querySelector('.form-container').style.transform = 'translateX(0%)';
    document.getElementById('signinBtn').classList.add('active');
    document.getElementById('signupBtn').classList.remove('active');
}

function showSignUp() {
    document.querySelector('.form-container').style.transform = 'translateX(-50%)';
    document.getElementById('signupBtn').classList.add('active');
    document.getElementById('signinBtn').classList.remove('active');
}

// Initialize with the Sign In form
showSignIn();
