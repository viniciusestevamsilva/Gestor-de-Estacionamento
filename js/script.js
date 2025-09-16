async function executarTarefas() {
    // Chamado todos os caminhos para a exibição
    const exibirVagas = await fetch("../api/vagas/exibir_vagas.php");
    // const exibirUsuarios = await fetch("../api/usuario/exibir.php");
    const situacaoVagas = await exibirVagas.json();
    // const usuarios = await exibirUsuarios.json();
    
    // console.log(situacaoVagas);
    // console.log(usuarios);

    const tabelaVagas = document.getElementById("vagas");
    tabelaVagas.innerHTML = "";

    situacaoVagas.forEach(vagas => {
        const novaCelulaVaga = tabelaVagas.insertRow();

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

        tabela.appendChild(novaLinha);
    });

}

executarTarefas();

async function exibirUsuarios() {
    const exibir = await fetch("../api/usuario/exibir.php"); 
        const resposta = await exibir.json();
        console.log(resposta); 
        const tabela = document.getElementById("usuarios"); 
        tabela.innerHTML = "";
            resposta.forEach(usuarios => { const novaLinha = tabela.insertRow(); 
            const nome = novaLinha.insertCell(); 
            const numero = novaLinha.insertCell(); 
            const ano = novaLinha.insertCell(); 
            nome.textContent = usuarios.nome; 
            numero.textContent = usuarios.telefone; 
            ano.textContent = usuarios.ano_nasc; 
            tabela.appendChild(novaLinha);
        });
}

exibirUsuarios();

// async function cadastrarUsuario(event) {
//     event.preventDefault();

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
//             await exibirUsuarios(); // Atualiza tabela
//             document.getElementById("formCadastro").reset(); // Limpa form
//         } else {
//             alert("Erro: " + (resultado.erro || "Erro desconhecido"));
//         }
//     } catch (erro) {
//         alert("Erro de conexão com o servidor.");
//         console.error(erro);
//     }
// }

// function inicializarCadastro() {
//     const form = document.getElementById("formCadastro");
//     if (form) {
//         form.addEventListener("submit", cadastrarUsuario);
//     }
// }

// inicializarCadastro();