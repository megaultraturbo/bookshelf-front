document.addEventListener('click', function handleClickOutsideBookpage(event) {
    const bookpage = document.getElementById('bookpage');
  
    if (!bookpage.contains(event.target)) {
      bookpage.style.display = 'none';
    }
  });