async function executarTarefas() {
    // Chamado todos os caminhos para a exibição
    const exibirOcupacao = await fetch("../api/ocupacao/exibir_ocupacao.php");
    const exibirUsuarios = await fetch("../api/usuario/exibir.php");
    const exibirVagas = await fetch("../api/vagas/exibir_vagas.php");
    const situacaoVagas = await exibirOcupacao.json();
    const usuarios = await exibirUsuarios.json();
    const vagas = await exibirVagas.json();
    
    // console.log(situacaoVagas);
    // console.log(usuarios);

    const tabelaOcupacao = document.getElementById("ocupacao");
    if (tabelaOcupacao) {
        tabelaOcupacao.innerHTML = "";
        
        situacaoVagas.forEach(vagas => {
            const novaCelulaVaga = tabelaOcupacao.insertRow();
    
            // const id = novaCelulaVaga.insertCell();
            const situacao = novaCelulaVaga.insertCell();
            const setor = novaCelulaVaga.insertCell();
            const numero = novaCelulaVaga.insertCell();
            const nome  = novaCelulaVaga.insertCell();
            const placa = novaCelulaVaga.insertCell();
            const horaEntrada = novaCelulaVaga.insertCell();
            const horaSaida = novaCelulaVaga.insertCell();
            const valor1 = novaCelulaVaga.insertCell();
            const button = novaCelulaVaga.insertCell();
    
            // id.textContent = vagas.id;
            setor.textContent = vagas.setor;
            numero.textContent = vagas.numero;
            nome.textContent = vagas.nome;
            placa.textContent = vagas.placa;
            horaEntrada.textContent = vagas.hora_entrada;
            horaSaida.textContent = vagas.hora_saida;
            valor1.textContent = vagas.valor;
            button.innerHTML = "<button>Atualizar</button>";
            
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
    
            tabelaOcupacao.appendChild(novaCelulaVaga);
        });
    }

    const tabelaUsuarios = document.getElementById("usuarios");
    if (tabelaUsuarios) {
        tabelaUsuarios.innerHTML = "";
    
        usuarios.forEach(usuario => {
            const novaCelulaUsuario = tabelaUsuarios.insertRow();
    
            const nome = novaCelulaUsuario.insertCell();
            const telefone = novaCelulaUsuario.insertCell();
            const nascimento = novaCelulaUsuario.insertCell();
    
            nome.textContent = usuario.nome;
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

    const selecaoVagas = document.getElementById("vagas");
    if (selecaoVagas) {
        selecaoVagas.innerHTML = "";

        console.log(vagas);
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


executarTarefas();

// async function exibirUsuarios() {
//     const exibir = await fetch("../api/usuario/exibir.php"); 
//         const resposta = await exibir.json();
//         console.log(resposta); 
//         const tabela = document.getElementById("usuarios"); 
//         tabela.innerHTML = "";
//             resposta.forEach(usuarios => { const novaLinha = tabela.insertRow(); 
//             const nome = novaLinha.insertCell(); 
//             const numero = novaLinha.insertCell(); 
//             const ano = novaLinha.insertCell(); 
//             nome.textContent = usuarios.nome; 
//             numero.textContent = usuarios.telefone; 
//             ano.textContent = usuarios.ano_nasc; 
//             tabela.appendChild(novaLinha);
//         });
// }

// exibirUsuarios();

// document.getElementById("formCadastro").addEventListener("submit", async function (e) {
//     e.preventDefault();

//     const nome = document.getElementById("user").value.trim();
//     const numero = document.getElementById("number").value.trim();
//     const ano = parseInt(document.getElementById("nascimento").value);

//     if (!nome || !numero || isNaN(ano)) {
//         alert("Preencha todos os campos corretamente.");
//         return;
//     }

//     try {
//         const resposta = await fetch("../api/usuario/criar.php", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json"
//             },
//             body: JSON.stringify({ nome, numero, ano })
//         });

//         const resultado = await resposta.json();

//         if (resultado.mensagem) {
//             alert("Usuário cadastrado com sucesso!");
//             exibirUsuarios();
//             document.getElementById("formCadastro").reset();
//         } else {
//             alert("Erro: " + (resultado.erro || "Erro desconhecido"));
//         }
//     } catch (erro) {
//         alert("Erro de conexão com o servidor.");
//         console.error(erro);
//     }
// });