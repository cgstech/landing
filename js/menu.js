window.addEventListener("scroll", function () {
    let header = document.getElementById("header");
    
    if (window.scrollY > 50) { // Quando a rolagem ultrapassar 50px
        header.classList.add("rolagem");
    } else {
        header.classList.remove("rolagem");
    }
});


// Cookies


document.addEventListener("DOMContentLoaded", function () {
    const cookiePopup = document.getElementById("cookiePopup");
    const acceptButton = document.getElementById("acceptCookies");

    // Verifica se o usuário já aceitou os cookies
    if (!localStorage.getItem("cookiesAccepted")) {
        cookiePopup.style.display = "flex";
    }

    // Ao clicar no botão "Aceitar", esconde o popup e salva a escolha no localStorage
    acceptButton.addEventListener("click", function () {
        localStorage.setItem("cookiesAccepted", "true");
        cookiePopup.style.opacity = "0";
        setTimeout(() => {
            cookiePopup.style.display = "none";
        }, 500);
    });
});
