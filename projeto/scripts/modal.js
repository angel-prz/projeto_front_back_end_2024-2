//querySelectorALl pra pegar os criados com foreach
// seleciona todos modais
let modals = document.querySelectorAll(".modal");

// seleciona todos botoes
let botao_modals = document.querySelectorAll(".ficha");

// seleciona todos os span
let spans = document.querySelectorAll(".close");

// foreach com evento pra cada botao
botao_modals.forEach((botao_modal, index) => {
    botao_modal.onclick = function() {
        modals[index].style.display = "block";
    }
});

// foreach com evento pra cada span
spans.forEach((span, index) => {
    span.onclick = function() {
        modals[index].style.display = "none";
    }
});

// foreach com evento pra cada modal
window.onclick = function(event) {
    modals.forEach((modal) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}