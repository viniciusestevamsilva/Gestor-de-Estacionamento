async function executarTarefas() {
    // Chamado todos os caminhos para a exibição
    const exibirVagas = await fetch("../api/exibir_vagas.php");
    const exibirUsuarios = await fetch("../api/usuario/exibir.php");
    const situacaoVagas = await exibirVagas.json();
    const usuarios = await exibirUsuarios.json();
    
    // console.log(situacaoVagas);
    // console.log(usuarios);

    const tabelaVagas = document.getElementById("vagas");
    tabelaVagas.innerHTML = "";

    situacaoVagas.forEach(vagas => {
        const novaCelulaVaga = tabelaVagas.insertRow();

        const situacao = novaCelulaVaga.insertCell();
        const setor = novaCelulaVaga.insertCell();
        const numero = novaCelulaVaga.insertCell();
        const nome  = novaCelulaVaga.insertCell();
        const placa = novaCelulaVaga.insertCell();
        const horaEntrada = novaCelulaVaga.insertCell();
        const horaSaida = novaCelulaVaga.insertCell();
        const valor1 = novaCelulaVaga.insertCell();
        const button = novaCelulaVaga.insertCell();

        setor.textContent = vagas.setor;
        numero.textContent = vagas.numero;
        nome.textContent = vagas.nome;
        placa.textContent = vagas.placa;
        horaEntrada.textContent = vagas.hora_entrada;
        valor1.textContent = vagas.valor;
        button.innerHTML = "<button>Atualizar</button>";
        
        if (vagas.situacao == 0) {
            novaCelulaVaga.style.backgroundColor = "#FF0000";
            situacao.textContent = "Ocupado";
        } else {
            novaCelulaVaga.style.backgroundColor = "#00FF00";
            situacao.textContent = "Livre";
        }
        
        button.onclick = async () => {
            console.log("Chegou aqui!")
            await fetch("../api/atualizar_vagas.php", {
                method: "POST",
                body: JSON.stringify({
                    id:vagas.id
                    // hora_saida: vagas.hora_saida = new Date().getTime()
                    // // hora_saida: vagas.hora_saida = Date.now()
                })
            });
            horaSaida.textContent = vagas.hora_saida;
            console.log(Date.now());
            executarTarefas();
        };
        tabelaVagas.appendChild(novaCelulaVaga);
    });

    // const tabelaUsuarios = document.getElementById("usuarios");
    // tabelaUsuarios.innerHTML = "";

    // usuarios.forEach(usuario => {
    //     const novaCelulaUsuario = tabelaUsuarios.insertRow();

    //     const nome = novaCelulaUsuario.insertCell();
    //     const telefone = novaCelulaUsuario.insertCell();
    //     const nascimento = novaCelulaUsuario.insertCell();

    //     nome.textContent = usuario.nome;
    //     telefone.textContent = usuario.telefone;
    //     nascimento.textContent = usuario.ano_nascimento;

    //     tabelaUsuarios.appendChild(novaCelulaUsuario);
    // });
}


executarTarefas();