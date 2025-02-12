function pesquisar(type) {
    switch (type) {
        case 'cds':
            window.location.href = 'formulariocds/Pesquisa/form_pesquisa.html'; // Redireciona para a página de pesquisa de CDs
            break;
        case 'dvds':
            window.location.href = 'formulariodvds/Pesquisa/form_pesquisa.html'; // Redireciona para a página de pesquisa de DVDs
            break;
        case 'lps':
            window.location.href = 'formulariolps/Pesquisa/form_pesquisals.html'; // Redireciona para a página de pesquisa de LPs
            break;
        case 'compacto':
            window.location.href = 'formulariocompacto/pesquisar/form_pesquisa.html'; // Redireciona para a página de pesquisa de Compactos
            break;
        case 'bluray':
            window.location.href = 'formulariobluray/pesquisa/formbluray.html'; // Redireciona para a página de pesquisa de BluRays
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
            window.location.href = 'formulariolps/cadastro/form_lps.html'; // Redireciona para a página de cadastro de LPs
            break;
        case 'compacto':
            window.location.href = 'formulariocompacto/cadastro/form_comp.html'; // Redireciona para a página de cadastro de Compactos
            break;
        case 'bluray':
            window.location.href = 'formulariobluray/cadastro/formbluray.html'; // Redireciona para a página de cadastro de DVDs
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
