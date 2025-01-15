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

// função limapr a pesquisa de paciente
function limparPesquisa()
{
    document.getElementById("nome_pesquisa").value = "";
    //recarregar a pagina
    window.location.href = window.location.pathname; 
}

//mostrar links do menu hamburger
function mostrarLinksHamburger() 
{
    let links = document.getElementById("sidebar");
    if (links.style.display === "block")
        links.style.display = "none";
    else 
        links.style.display = "block";
  }



//esperar pela pagina inteiro carregar
document.addEventListener("DOMContentLoaded", function () 
{
/**************************************************************
 * LOGICA PACIENTE USUARIO 
***************************************************************/

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

/**************************************************************
BOTÂO COM DROPDOWN MENU DO CABEÇALHJO
**************************************************************/
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton.addEventListener('click', function (event) 
    {
        dropdownMenu.classList.toggle('show');
        event.stopPropagation(); //evita que o evento de click no botão seja propagado para o document
    });

    // função pra fechar o menu se o usuário clicar fora
    document.addEventListener('click', function (event) 
    {
        //se o click for fora do botão e do menu, fecha o menu
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
        // fecha o menu se o botao perder focus (tirar o mouse)
        dropdownButton.addEventListener('focusout', function () 
        {
            dropdownMenu.classList.remove('show');
        });

        // função evita que o menu feche se o usuário clicar nele
        dropdownMenu.addEventListener('click', function (event) 
        {
            event.stopPropagation();    
        });

    });

    document.getElementById('cpf').addEventListener('input', function() {
        let cpf = this.value;
    
        // remover character não numero
        cpf = cpf.replace(/\D/g, '');
    
        // atualizar o camp com novo valor
        this.value = cpf;
    
        // verificar se são apenas 11 digitos
        if (cpf.length > 11) {
            alert('CPF deve ter 11 dígitos.');
            document.getElementById('cpf').value = "";
        }
    });
    //botao de exames
});

//evento para verificar cpf

 //criar campos de TIPO E NUMERO DO CONSELHO
        //const tipoConselho = document.createElement("INPUT");
        //tipoConselho.setAttribute("type", "text");
        //tipoConselho.setAttribute("readonly", "");