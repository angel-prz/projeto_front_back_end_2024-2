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

//esperar pela pagina inteiro carregar
document.addEventListener("DOMContentLoaded", function () 
{
    // CRM = MEDICO , COREN = ENFERMEIRO/TEC, CRO = DENTISTA/ODONTOLOGISTA
    //define objeto que mapeia o tipo de profissional para o tipo de conselho
    const conselhoMap =
    {
        "medico": "CRM",
        "enfermeiro": "COREN",
        "tec_enfermeiro": "COREN",
        "dentista": "CRO",
        "odontologista": "CRO"
    };
    
    //verificar se o elemento existe na página para poder executar as funções que modificam ele
    if (document.getElementById("tipoUsuario") != null) 
    {
        //manipular o select de tipo de usuário para mostrar parte do formulario do profissional de saúde
        // também direcionar para o arquivo de logica do profissional de saúde
        document.getElementById("tipoUsuario").addEventListener("change", function () 
        {
            let tipoUsuario = document.getElementById("tipoUsuario").value;
            if (tipoUsuario == "profissional_saude") 
            {
                //mudar action do formulario usuario/paciente/profissional
                //document.getElementById("formCadastroUsuario").action = "includes/logica_profissional.php"; 

                document.getElementById("divTipoProfissional").style.display = "block";
                document.getElementById("divTipoProfissional").style.visibility = "visible";
                document.getElementById("tipoProfissional").value = "medico";
                document.getElementById("tipoConselho").value = conselhoMap["medico"];
                document.getElementById("divNumeroConselho").style.display = "block";
                document.getElementById("divNumeroConselho").style.visibility = "visible";
                document.getElementById("myForm").action = "/logica/logica_profissionalSaude.php";
            }
            else 
            {
                document.getElementById("divTipoProfissional").style.display = "none";
                document.getElementById("divTipoProfissional").style.visibility = "hidden";
                document.getElementById("myForm").action = "/logica/logica_usuario.php";
            }
        });


        //função para adicionar 2 inputs que lerão CONSELHO e NUMERO
        //Tipo de conselho é automatico com switch case

        const tipoProfissionalElement = document.getElementById("tipoProfissional");
        tipoProfissionalElement.addEventListener("change", function () 
        {
            let tipoProfissional = tipoProfissionalElement.value;
            let tipoConselho = document.getElementById("tipoConselho");
            console.log("BLA" + tipoConselho);
            //verifica se o tipo de profissional ta no objeto de mapemento (redundante)
            if (tipoProfissional in conselhoMap) 
            {
                console.log(conselhoMap[tipoProfissional]);
                tipoConselho.readOnly = false;
                tipoConselho.value = conselhoMap[tipoProfissional];
                console.log(tipoConselho.getAttribute("value"));
                tipoConselho.readOnly = true;
            }
        });

        const numeroConselhoElement = document.getElementById("numeroConselho");
        numeroConselhoElement.addEventListener("change", () => 
        {
            let numeroConselho = numeroConselhoElement.value;
            if (isNaN(numeroConselho)) 
            {
                alert("O número do conselho deve ser apenas números!");
                numeroConselhoElement.value = "";
            }
        });
    }
});

 //criar campos de TIPO E NUMERO DO CONSELHO
        //const tipoConselho = document.createElement("INPUT");
        //tipoConselho.setAttribute("type", "text");
        //tipoConselho.setAttribute("readonly", "");