
/* =========================================== Funções Gerais ===========================================*/

async function executarTarefas() {

    /* =========================================== Chamado todos os caminhos para a exibição ===========================================*/

    const exibirOcupacao = await fetch("../api/ocupacao/exibir_ocupacao.php");
    const exibirUsuarios = await fetch("../api/usuario/exibir_usuario.php");
    const exibirVagas = await fetch("../api/vagas/exibir_vagas.php");
    const situacaoVagas = await exibirOcupacao.json();
    const usuarios = await exibirUsuarios.json();
    const vagas = await exibirVagas.json();
    

    const tabelaOcupacao = document.getElementById("ocupacao");
    if (tabelaOcupacao) {
        tabelaOcupacao.innerHTML = "";
        
        situacaoVagas.forEach(vagas => {
            const novaCelulaVaga = tabelaOcupacao.insertRow();
    
            const situacao = novaCelulaVaga.insertCell();
            const setor = novaCelulaVaga.insertCell();
            const numero = novaCelulaVaga.insertCell();
            const nome  = novaCelulaVaga.insertCell();
            const placa = novaCelulaVaga.insertCell();
            const cor = novaCelulaVaga.insertCell();
            const horaEntrada = novaCelulaVaga.insertCell();
            const horaSaida = novaCelulaVaga.insertCell();
            const valor1 = novaCelulaVaga.insertCell();
            const button = novaCelulaVaga.insertCell();
            const btnExcluir = novaCelulaVaga.insertCell();
        
    
            setor.textContent = vagas.setor;
            numero.textContent = vagas.numero;
            nome.textContent = vagas.nome;
            placa.textContent = vagas.placa;
            cor.textContent = vagas.cor;
            horaEntrada.textContent = vagas.hora_entrada;
            horaSaida.textContent = vagas.hora_saida;
            valor1.textContent = vagas.valor;
            button.innerHTML = "<button class='btn_atualizar'>Atualizar</button>";
            btnExcluir.innerHTML =  "<button class='btn-excluir'>Excluir</button>";
            
            if (vagas.situacao == 0) {
                novaCelulaVaga.style.backgroundColor = "#9c0219ff";
                situacao.textContent = "Ocupado";
            } else {
                novaCelulaVaga.style.backgroundColor = "#272b10";
                situacao.textContent = "Livre";
            }
            
            button.onclick = async () => {
                await fetch("../api/ocupacao/atualizar_ocupacao.php", {
                    method: "POST",
                    body: JSON.stringify({
                        id:vagas.id,
                        id_vaga:vagas.vaga,
                        situacao:vagas.situacao == 1 ? 0 : 1
                    })
                });
                executarTarefas();
            };

            btnExcluir.onclick = async () => {

            const response = await fetch("../api/ocupacao/excluir_ocupacao.php", {
                method: "POST",
                body: JSON.stringify({ id: vagas.id }),
                headers: {
                    'Content-Type': 'application/json'
                }
            });

        /* =========================================== Verifica se esta tudo dentro dos conformes ===========================================*/

            if (response.ok) {
                alert('Excluído com sucesso!');
                executarTarefas();
            } else {
                alert('Erro ao excluir!');
            }
        };

            tabelaOcupacao.appendChild(novaCelulaVaga);
        });
    }

    /* =========================================== Exibi a tabela de usuarios ===========================================*/

    const tabelaUsuarios = document.getElementById("usuarios");
    if (tabelaUsuarios) {
        tabelaUsuarios.innerHTML = "";
    
        usuarios.forEach(usuario => {
            const novaCelulaUsuario = tabelaUsuarios.insertRow();
    
            const id = novaCelulaUsuario.insertCell();
            const nome = novaCelulaUsuario.insertCell();
            const telefone = novaCelulaUsuario.insertCell();
            const nascimento = novaCelulaUsuario.insertCell();
        
            id.textContent = usuario.id;
            nome.textContent = usuario.nome;

            /* =========================================== Filtro / Estilização ===========================================*/
            telefone.textContent = `(0${usuario.telefone.slice(0,2)}) ${usuario.telefone.slice(2,7)} - ${usuario.telefone.slice(7, 11)}`;

            nascimento.textContent = usuario.ano_nasc;
    
            tabelaUsuarios.appendChild(novaCelulaUsuario);
        });
    }

    // const tabelaVeiculos = document.getElementById("veiculos");
    // if (tabelaVeiculos) {
    //     tabelaVeiculos.innerHTML = "";
    
    //     veiculos.forEach(veiculo => {
    //         const novaCelulaUsuario = tabelaVeiculos.insertRow();
    
    //         const nome = novaCelulaUsuario.insertCell();
    //         const telefone = novaCelulaUsuario.insertCell();
    //         const nascimento = novaCelulaUsuario.insertCell();
    
    //         nome.textContent = veiculo.nome;
    //         telefone.textContent = veiculo.telefone;
    //         nascimento.textContent = veiculo.ano_nasc;
    
    //         tabelaVeiculos.appendChild(novaCelulaUsuario);
    //     });
    // }

    /* =========================================== Altera as opções ===========================================*/

    const selecaoVagas = document.getElementById("vagas");
    if (selecaoVagas) {
        selecaoVagas.innerHTML = "";

        vagas.forEach(vagas => {
            const novaOpcao = document.createElement("option");
            if (vagas.situacao == 1) {
                novaOpcao.value = vagas.id;
                novaOpcao.text = `${vagas.setor}-0${vagas.numero} - Livre`;
                
                selecaoVagas.appendChild(novaOpcao);
            } else {
                novaOpcao.text = `${vagas.setor}-0${vagas.numero} - Ocupada`;
                selecaoVagas.appendChild(novaOpcao);
            }
        });
    }
}


function criarUsuario(){
    const cadastrarUsuario = document.getElementById("cadastrar");
    if (cadastrarUsuario){
        cadastrarUsuario.onclick = async () =>{
            const nome = document.getElementById("user").value;
            const numero = document.getElementById("number").value;
            const ano = document.getElementById("nascimento").value;
    
            await fetch("../api/usuario/criar_usuario.php",{
                method: "POST",
                body: JSON.stringify({
                    nome, numero, ano
                })
            });
        }
    }
}
criarUsuario();

function criarVeiculo(){
    // Pega o botão pelo ID correto (que está no HTML)
    const cadastarVeiculo = document.getElementById("cadastrar_veiculo");

    if(cadastarVeiculo){
        cadastarVeiculo.onclick = async () =>{

            // Pega os valores dos inputs
            const id_usuario = document.getElementById("cliente").value;
            const placa = document.getElementById("placa").value;
            const cor = document.getElementById("cor").value;
            const vaga = document.getElementById("vagas").value;

            // Envia para o PHP
            await fetch("../api/veiculo/criar_veiculo.php",{
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    id_usuario, placa, cor, vaga
                })
            });
        }
    }
}
criarVeiculo();

executarTarefas();