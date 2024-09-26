// script.js

// Naver Signup/Login Toggle
document.getElementById("naver-signup-link").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("naver-login-box").style.display = "none";
    document.getElementById("naver-signup-box").style.display = "block";
});

document.getElementById("naver-back-to-login").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("naver-signup-box").style.display = "none";
    document.getElementById("naver-login-box").style.display = "block";
});

// Kakao Signup/Login Toggle
document.getElementById("kakao-signup-link").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("kakao-login-box").style.display = "none";
    document.getElementById("kakao-signup-box").style.display = "block";
});

document.getElementById("kakao-back-to-login").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("kakao-signup-box").style.display = "none";
    document.getElementById("kakao-login-box").style.display = "block";
});
