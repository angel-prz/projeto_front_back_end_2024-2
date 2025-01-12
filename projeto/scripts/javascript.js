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
document.addEventListener("DOMContentLoaded", function() 

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
    //manipular o select de tipo de usuário para mostrar parte do formulario do profissional de saúde
    document.getElementById("tipoUsuario").addEventListener("change", function()
    {
        let tipoUsuario = document.getElementById("tipoUsuario").value;
        if (tipoUsuario == "profissional_saude")
        {
            document.getElementById("divTipoProfissional").style.display = "block";
            document.getElementById("divTipoProfissional").style.visibility = "visible";
            document.getElementById("tipoProfissional").value = "medico";
            document.getElementById("tipoConselho").value = conselhoMap["medico"];
        }
        else
        {
            document.getElementById("divTipoProfissional").style.display = "none";
            document.getElementById("divTipoProfissional").style.visibility = "hidden";
        }
    });

    
    //função para adicionar 2 inputs que lerão CONSELHO e NUMERO
    //Tipo de conselho é automatico com switch case

    document.getElementById("tipoProfissional").addEventListener("change", function()
    {
        let tipoProfissional = document.getElementById("tipoProfissional").value;
        let divTipoProfissional = document.getElementById("divTipoProfissional");
        let tipoConselho = document.getElementById("tipoConselho");
        console.log("BLA" + tipoConselho);
        //verifica se o tipo de profissional ta no objeto de mapemento
        if(tipoProfissional in conselhoMap)
        {
            let divNumeroConselho = document.getElementById("divNumeroConselho");
            //verificar se a div ja existe
            if(!divNumeroConselho)
            {
                console.log(tipoConselho);
                //cria div para numero do conselho para modificar sem apagar o tipo conselho
                let divNumeroConselho = document.createElement("DIV");
                //define valor do campo tipoConselho
                tipoConselho.setAttribute("value", conselhoMap[tipoProfissional]);

                //cria label para numero do conselho
                let labelNumeroConselho = document.createElement("LABEL");
                labelNumeroConselho.setAttribute("for", "numeroConselho");
                //cria campo para numero do conselho
                let numeroConselho = document.createElement("INPUT");

                //setAttribute cria denovo e denovo denovo . .. . setAttributeNode cria e substitui
                numeroConselho.setAttribute("type", "text");
                numeroConselho.setAttribute("name", "numeroConselho");
                numeroConselho.setAttribute("id", "numeroConselho");

                //adiciona os campos pra div do tipo profissional
                divTipoProfissional.appendChild(tipoConselho);
                divNumeroConselho.appendChild(labelNumeroConselho);
                divNumeroConselho.appendChild(numeroConselho);
            }
            else 
                //remove a div
                document.getElementById("divNumeroConselho").remove();
        }
        
    });
});

 //criar campos de TIPO E NUMERO DO CONSELHO
        //const tipoConselho = document.createElement("INPUT");
        //tipoConselho.setAttribute("type", "text");
        //tipoConselho.setAttribute("readonly", "");