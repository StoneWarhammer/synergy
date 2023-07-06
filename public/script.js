
// Popup-ы для фотографий в постах

const opens = document.querySelectorAll('#open');
const closes = document.querySelectorAll('#close');
const containers = document.querySelectorAll('#popup_container');


opens.forEach((e, index) => {
    e.addEventListener('click', () => {
        containers[index].classList.add('active');
    })
})

closes.forEach((e, index) => {
    e.addEventListener('click', () => {
        containers[index].classList.remove('active');
    })
})

containers.forEach((e, index) => {
    e.addEventListener('click', () => {
        containers[index].classList.remove('active');
    })
})


// Цвет оценок в профиле и списке выполненных работ

var rates = document.querySelectorAll("#rate");
rates.forEach(rate => {
    if (rate.innerText === '2') {
        rate.style.color = 'red';
    }
    if (rate.innerText === '3') {
        rate.style.color = 'darkorange';
    }
    if (rate.innerText === '4') {
        rate.style.color = 'olivedrab';
    }
    if (rate.innerText === '5') {
        rate.style.color = 'green';
    }
});
