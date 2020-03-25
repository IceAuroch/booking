const notification = document.querySelectorAll('.notification');

if (notification.length) {
  Array.from(notification).map(item => {
    setTimeout(() => {
      item.style.display = 'none';
    }, 4000);
  })
}