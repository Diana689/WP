const slider = document.querySelector('.slider-wrapper');
const before = slider.querySelector('.slider-before');
const change = document.querySelector('.slider-change');

document.addEventListener('DOMContentLoaded', () => {
    const width = slider.offsetWidth;
    before.style.width = `${width}px`;
});

const onSliderChange = value => {
    shiftImage(value);
};

const shiftImage = shiftValue => {
    before.style.width = `${shiftValue}% `;
};
