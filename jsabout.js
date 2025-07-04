const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let scrollPosition = 0;
const cardWidth = 220; // Width of each card including gap
const totalCards = carousel.children.length;
const visibleCards = Math.floor(carousel.parentElement.offsetWidth / cardWidth);

prevBtn.addEventListener('click', () => {
  scrollPosition = Math.min(scrollPosition + cardWidth, 0);
  carousel.style.transform = `translateX(${scrollPosition}px)`;
});

nextBtn.addEventListener('click', () => {
  const maxScroll = -(cardWidth * (totalCards - visibleCards));
  scrollPosition = Math.max(scrollPosition - cardWidth, maxScroll);
  carousel.style.transform = `translateX(${scrollPosition}px)`;
});
