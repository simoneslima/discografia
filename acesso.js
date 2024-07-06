function pesquisar(type) {
    switch (type) {
        case 'cds':
            window.location.href = 'formulariocds/Pesquisa/form_pesquisa.html'; // Redireciona para a página de pesquisa de CDs
            break;
        case 'dvds':
            window.location.href = 'formulariodvds/Pesquisa/form_pesquisa.html'; // Redireciona para a página de pesquisa de DVDs
            break;
        case 'lps':
            window.location.href = 'pesquisar_lps.php'; // Redireciona para a página de pesquisa de LPs
            break;
        case 'compacto':
            window.location.href = 'pesquisar_compactos.php'; // Redireciona para a página de pesquisa de Compactos
            break;
        default:
            alert('Opção inválida');
    }
}

function cadastrar(type) {
    switch (type) {
        case 'cds':
            window.location.href = 'formulariocds/cadastro/formulario.html'; // Redireciona para a página de cadastro de CDs
            break;
        case 'dvds':
            window.location.href = 'formulariodvds/cadastro/formdvds.html'; // Redireciona para a página de cadastro de DVDs
            break;
        case 'lps':
            window.location.href = 'cadastro_lps.html'; // Redireciona para a página de cadastro de LPs
            break;
        case 'compacto':
            window.location.href = 'cadastro_compactos.html'; // Redireciona para a página de cadastro de Compactos
            break;
        default:
            alert('Opção inválida');
    }
}

function showOptions(option) {
    var options = document.querySelectorAll('.options');
    options.forEach(function(opt) {
        opt.style.display = 'none';
    });

    document.getElementById(option + 'Options').style.display = 'block';
}
