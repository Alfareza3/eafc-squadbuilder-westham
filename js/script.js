
function toggleMode() {
  const body = document.body;
  const isDark = body.classList.toggle('dark-mode');


  localStorage.setItem('darkMode', isDark);


  const msg = isDark ? '🌙 Mode Gelap Aktif' : '☀️ Mode Terang Aktif';
  console.log(msg);
}

window.addEventListener('DOMContentLoaded', () => {
  const isDark = localStorage.getItem('darkMode') === 'true';
  if (isDark) {
    document.body.classList.add('dark-mode');
  }
});
