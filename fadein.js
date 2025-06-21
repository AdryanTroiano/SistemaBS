
function aplicarFadeIn() {
    document.body.classList.remove('fade-out'); 
    document.body.classList.add('fade-in');
  }

  document.addEventListener('DOMContentLoaded', function () {
    aplicarFadeIn();

    // Seleciona todos os links <a> com href que não sejam vazios nem "#"
    const todosLinks = Array.from(document.querySelectorAll('a[href]')).filter(link => {
      const href = link.getAttribute('href');

      // Ignorar links vazios, âncoras ou javascript:void(0)
      if (!href || href === '#' || href.startsWith('javascript:')) {
        return false;
      }

      // Ignorar links que abrem em nova aba
      if (link.target && link.target.toLowerCase() === '_blank') {
        return false;
      }

      // Apenas links do mesmo domínio (internos)
      try {
        const url = new URL(href, window.location.origin);
        return url.origin === window.location.origin;
      } catch {
        return false;
      }
    });

    todosLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();

        const destino = this.href;

        document.body.classList.remove('fade-in');
        document.body.classList.add('fade-out');

        setTimeout(() => {
          window.location.href = destino;
        }, 500);
      });
    });
  });

  // Reaplica fade-in ao voltar com botão do navegador
  window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
      aplicarFadeIn();
    }
  });

  document.body.classList.add('fade-in');
  document.addEventListener('DOMContentLoaded', function () {
    const abrirMenu = document.getElementById('abrirMenu');
    const fecharMenu = document.getElementById('fecharMenu');
    const menuFullscreen = document.getElementById('menuFullscreen');

    abrirMenu.addEventListener('click', function () {
      menuFullscreen.classList.add('ativo');
      abrirMenu.classList.add('esconder');
    });

    fecharMenu.addEventListener('click', function () {
      menuFullscreen.classList.remove('ativo');
      abrirMenu.classList.remove('esconder');
    });
  });

