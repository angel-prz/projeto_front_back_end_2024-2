// Função de confirmação de exclusão em qualquer form por eqnaunto
function confirma_excluir()
{
    resp=confirm("Confirma Exclusão?")

    if (resp==true)
    {

        return true;
    }
    else
    {
        return false;

    }
}

document.getElementById("tipoUsuario").addEventListener("change", function()
{
    let tipoUsuario = document.getElementById("tipoUsuario").value;
    if (tipoUsuario == "profissional_saude")
    {
        document.getElementById("tipoProfissional").style.display = "block";
        document.getElementById("tipoProfissional").style.visibility = "visible";
    }
    else if (tipoUsuario == "paciente")
    {
        document.getElementById("tipoProfissional").style.display = "none";
        document.getElementById("tipoProfissional").style.visibility = "hidden";
    }

});