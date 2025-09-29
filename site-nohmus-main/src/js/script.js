let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("slide");
    const dots = document.getElementsByClassName("dot");
    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

// Função para abrir o modal com animação
function abrirModal(id) {
    const modal = document.getElementById(id);
    modal.style.display = "block";  // Exibe o modal
    setTimeout(function() {
        modal.classList.add("show"); // Adiciona a classe de animação para exibição
    }, 10);
}

// Função para fechar o modal com animação
function fecharModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("show");  // Remove a animação de exibição
    setTimeout(function() {
        modal.style.display = "none"; // Esconde o modal após a animação
    }, 300);  // Tempo suficiente para a animação de fechamento
}

// Fecha o modal ao clicar fora do conteúdo (não no modal)
window.onclick = function(event) {
    const modais = document.querySelectorAll('.modal');
    modais.forEach(modal => {
        if (event.target === modal) {
            fecharModal(modal.id);  // Fecha o modal ao clicar fora dele
        }
    });
};

function mostrarFormulario(id) {
    var formulario = document.getElementById('formulario_' + id);
    if (formulario.style.display === "none") {
        formulario.style.display = "block";
    } else {
        formulario.style.display = "none";
    }
}
