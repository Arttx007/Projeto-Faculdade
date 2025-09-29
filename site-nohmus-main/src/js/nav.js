const links = document.querySelectorAll('.nav a[data-content]');
const infoBox = document.getElementById('nav-info');
const contents = document.querySelectorAll('.nav-info .content');

// Usando um loop 'for' para compatibilidade com versões mais antigas
for (let i = 0; i < contents.length; i++) {
    contents[i].style.display = 'none';  // Oculta todos os conteúdos inicialmente
}

links.forEach(link => {
    const targetId = link.getAttribute('data-content');

    // Exibe info ao passar o mouse
    link.addEventListener('mouseenter', () => {
        infoBox.style.display = 'block';
        
        // Usando o loop 'for' novamente para ocultar conteúdos
        for (let i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';  // Oculta todos os conteúdos
        }
        
        const selected = document.getElementById(targetId);
        if (selected) selected.style.display = 'block';  // Exibe o conteúdo do item selecionado
    });
});

// Oculta a caixa de informações ao sair do menu
document.querySelector('.nav').addEventListener('mouseleave', () => {
    setTimeout(() => {
        infoBox.style.display = 'none';
    }, 300);
});

// Oculta a caixa de informações ao sair de 'nav-info'
document.getElementById('nav-info').addEventListener('mouseleave', () => {
    infoBox.style.display = 'none';
});