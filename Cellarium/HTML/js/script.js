function toggleText(btn) {
    var card = btn.closest('.card');
    var hideText = card.querySelector('.hide');
    hideText.classList.toggle('show');
  
    if (hideText.classList.contains('show')) {
      btn.innerHTML = 'Ver menos';
    } else {
      btn.innerHTML = 'Ver más';
    }
  }
  