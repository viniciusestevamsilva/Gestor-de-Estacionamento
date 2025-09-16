async function exibirVagas() {
    const exibir = await fetch("../api/exibir_vagas.php");
    const resposta = await exibir.json();
    
    console.log(resposta);
    const tabela = document.getElementById("vagas");
    tabela.innerHTML = "";

    resposta.forEach(vagas => {
        const novaLinha = tabela.insertRow();

        const situacao = novaLinha.insertCell();
        const setor = novaLinha.insertCell();
        const numero = novaLinha.insertCell();
        const nome  = novaLinha.insertCell();
        const placa = novaLinha.insertCell();
        const horaEntrada = novaLinha.insertCell();
        const horaSaida = novaLinha.insertCell();
        const valor1 = novaLinha.insertCell();

        setor.textContent = vagas.setor;
        numero.textContent = vagas.numero;
        nome.textContent = vagas.nome;
        placa.textContent = vagas.placa;
        horaEntrada.textContent = vagas.hora_entrada;
        horaSaida.textContent = vagas.hora_saida;
        valor1.textContent = vagas.valor;

        if (vagas.situacao == 0) {
            novaLinha.style.backgroundColor = "#FF0000";
            situacao.textContent = "Ocupado";
        } else {
            novaLinha.style.backgroundColor = "#00FF00";
            situacao.textContent = "Livre";
        }

        tabela.appendChild(novaLinha);
    });

}

exibirVagas();

async function exibirUsuarios() {
    const exibir = await fetch("../api/usuario/exibir.php"); 
        const resposta = await exibir.json();
        console.log(resposta); 
        const tabela = document.getElementById("usuarios"); 
        tabela.innerHTML = ""; resposta.forEach(usuarios => { const novaLinha = tabela.insertRow(); 
            const nome = novaLinha.insertCell(); 
            const numero = novaLinha.insertCell(); 
            const ano = novaLinha.insertCell(); 
            nome.textContent = usuarios.nome; 
            numero.textContent = usuarios.telefone; 
            ano.textContent = usuarios.ano_nasc; 
            tabela.appendChild(novaLinha);
        });
    } exibirUsuarios();