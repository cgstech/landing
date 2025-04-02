document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("nav a");
    const contentArea = document.querySelector(".main-main");

    function carregarPagina(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                contentArea.innerHTML = data;
            })
            .catch(error => {
                console.error("Erro ao carregar a página:", error);
                contentArea.innerHTML = "<p>Erro ao carregar o conteúdo.</p>";
            });
    }

    // Carrega a home ao abrir a página
    carregarPagina("pages/home.html");

    // Adiciona eventos de clique nos links
    links.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const pageUrl = this.getAttribute("href");
            carregarPagina(pageUrl);
        });
    });
});



// graficos

function adicionarAoCarrinho(produto, preco) {
    alert(`${produto} foi adicionado ao carrinho por R$ ${preco},00`);
}