const photos = document.querySelectorAll('.photo');
const close = document.querySelector('.modal-close');
const modal = document.querySelector('.modal');
const modalImg = document.querySelector('.modal-img');

photos.forEach(photo => {
    photo.addEventListener('click', (event) => {
        event.preventDefault();

        const photoUrl = photo.dataset.photoUrl;

        modalImg.src = `${photoUrl}`;

        modal.classList.remove('hidden');
        modal.classList.add('active');
    });
});

close.addEventListener('click', () => {
    modal.classList.remove('active');
    modal.classList.add('hidden');
});

modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.remove('active');
        modal.classList.add('hidden');
    }
});
