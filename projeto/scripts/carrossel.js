//esperar pela pagina inteiro carregar
document.addEventListener("DOMContentLoaded", function () 
{
    const anterior = document.querySelector('#botao_anterior');
    const proximo = document.querySelector('#botao_proximo');
    const img_container = document.querySelector('.img_container');
    const imagens = document.querySelectorAll('.img_container img');
    let imagemAtual = 0;
    const carrossel = document.querySelector('.img_carrossel');

    function mostraImagem() 
    {
        if (imagemAtual >= imagens.length) imagemAtual = 0;
        if (imagemAtual < 0) imagemAtual = imagens.length - 1;
        img_container.style.transform = `translateX(-${imagemAtual * 100}%)`;
    }
    //arrow functions
    // Mudar para próxima imagem ao clicar
    proximo.addEventListener('click', () => 
    {
        imagemAtual++;
        mostraImagem();
    });

    // Mudar para imagem anterior ao clicar
    anterior.addEventListener('click', () =>
    {
        imagemAtual--;
         mostraImagem();
    });

    // Mudar automaticamente
    setInterval(() => 
    {
        imagemAtual++;
        mostraImagem();
    }, 3000);

    // Mostrar a imagem inicial
    mostraImagem();
});
    
