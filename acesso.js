function pesquisar(type) {
    const urls = {
        cds: 'formulariocds/Pesquisa/form_pesquisa.html',
        dvds: 'formulariodvds/Pesquisa/form_pesquisa.html',
        lps: 'formulariolps/Pesquisa/form_pesquisals.html',
        compacto: 'formulariocompacto/pesquisar/form_pesquisa.html',
        bluray: 'formulariobluray/pesquisa/formbluray.html'
    };

    if (urls[type]) {
        window.location.href = urls[type];
    } else {
        alert('Opção inválida');
    }
}

function cadastrar(type) {
    const urls = {
        cds: 'formulariocds/cadastro/formulario.html',
        dvds: 'formulariodvds/cadastro/formdvds.html',
        lps: 'formulariolps/cadastro/form_lps.html',
        compacto: 'formulariocompacto/cadastro/form_comp.html',
        bluray: 'formulariobluray/cadastro/formbluray.html'
    };

    if (urls[type]) {
        window.location.href = urls[type];
    } else {
        alert('Opção inválida');
    }
}

function showOptions(option) {
    let currentMenu = document.getElementById(option + 'Options');

    // Fecha todos os menus, exceto o atual
    document.querySelectorAll('.options').forEach(menu => {
        if (menu !== currentMenu) {
            menu.style.display = 'none';
        }
    });

    // Alterna o menu clicado (abre se estiver fechado, fecha se estiver aberto)
    currentMenu.style.display = (currentMenu.style.display === 'block') ? 'none' : 'block';
}
