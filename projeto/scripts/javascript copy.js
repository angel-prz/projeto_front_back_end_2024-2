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

//esperar pelo documento inteiro carregar
document.addEventListener("DOMContentLoaded", function () {
    console.log("location.pathname: " + window.location.pathname);
    //pega o nome da pagina atual
    const page = window.location.pathname.split("/").pop();
    console.log(page);
    //switch case para rodar funções especificas para cada pagina
    //deve ter um geito melhor? BLA
    switch (page) 
    {
        case "/projeto_front_back_end_2024-2/projeto/view/cadastrarUsuario.php":
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
            //manipular o select de tipo de usuário para mostrar parte do formulario do profissional de saúde
            document.getElementById("tipoUsuario").addEventListener("change", function () 
            {
                let tipoUsuario = document.getElementById("tipoUsuario").value;
                if (tipoUsuario == "profissional_saude") 
                {
                    document.getElementById("divTipoProfissional").style.display = "block";
                    document.getElementById("divTipoProfissional").style.visibility = "visible";
                    document.getElementById("tipoProfissional").value = "medico";
                    document.getElementById("tipoConselho").value = conselhoMap["medico"];
                    document.getElementById("divNumeroConselho").style.display = "block";
                    document.getElementById("divNumeroConselho").style.visibility = "visible";
                }
                else 
                {
                    document.getElementById("divTipoProfissional").style.display = "none";
                    document.getElementById("divTipoProfissional").style.visibility = "hidden";
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
            numeroConselhoElement.addEventListener("change", () => {
                let numeroConselho = numeroConselhoElement.value;
                if (isNaN(numeroConselho)) {
                    alert("O número do conselho deve ser apenas números!");
                    numeroConselhoElement.value = "";
                }
            });
            break;
            
    }
    
});

 //criar campos de TIPO E NUMERO DO CONSELHO
        //const tipoConselho = document.createElement("INPUT");
        //tipoConselho.setAttribute("type", "text");
        //tipoConselho.setAttribute("readonly", "");