document.addEventListener('DOMContentLoaded', function () {
    let screenWidth = $(window).width();
    let popupElement = screenWidth > 1200 ? 'filterPopup' : 'filterPopupMobile';
    let closeElement = screenWidth > 1200 ? 'closeButton' : 'closeButtonMobile';
    let checkBoxElement = screenWidth > 1200 ? '.filter-checkbox' : '.filter-checkbox-mobile';

    let filterButton = document.getElementById('filterButton');
    let filterPopup = document.getElementById(popupElement);
    let closeButton = document.getElementById(closeElement);
    let filterCheckboxes = document.querySelectorAll(checkBoxElement);
    let chosenFilters = document.getElementById('chosenFilters');

    filterButton.addEventListener('click', function () {
        filterPopup.classList.remove('closed');
        setTimeout(() => {
            filterPopup.classList.add('open');
        }, 50);
    });

    closeButton.addEventListener('click', function () {
        filterPopup.classList.remove('open');
        setTimeout(() => {
            filterPopup.classList.add('closed');
        }, 500);
    });

    filterCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const value = this.value;
            if (this.checked) {
                addFilter(value);
            } else {
                removeFilter(value);
            }
        });
    });

    function addFilter(value) {
        const filterButton = document.createElement('button');
        filterButton.className = 'chosen_filter';
        filterButton.innerHTML = `<div class="cross"></div><span>${value}</span>`;
        filterButton.addEventListener('click', function () {
            removeFilter(value);
            filterButton.classList.add('removing');
            setTimeout(() => {
                filterButton.remove();
                document.querySelector(`${checkBoxElement}[value="${value}"]`).checked = false;
            }, 500);
        });
        chosenFilters.appendChild(filterButton);
    }

    function removeFilter(value) {
        const filterButtons = document.querySelectorAll('.chosen_filter span');
        filterButtons.forEach(function (span) {
            if (span.textContent === value) {
                const parentButton = span.parentElement;
                parentButton.classList.add('removing');
                setTimeout(() => {
                    parentButton.remove();
                }, 500);
            }
        });
    }
});


const ballColors = ['#417E78', '#FE76AC', '#264A7A', '#C4A556'];

function getRandomColor() {
    return ballColors[Math.floor(Math.random() * ballColors.length)];
}

function random(min, max) {
    let rand = min + Math.random() * (max + 1 - min);
    return Math.floor(rand);
}

function createRandomBall() {
    const buttons = document.querySelectorAll('.gallery_block button');
    buttons.forEach((button) => {
        let screenWidth = $(window).width();
        let minX = screenWidth > 1200 ? -150 : -100;
        let maxX = button.clientWidth - (screenWidth > 1200 ? 100 : 70);
        let minY = screenWidth > 1200 ? -250 : -100;
        let maxY = 35;
        let ball = button.querySelector('.button-ball');
        ball.style.backgroundColor = getRandomColor();
        ball.style.transform = `translate(${random(minX, maxX)}px, ${random(minY, maxY)}px)`;

        button.addEventListener('mouseenter', () => {
            ball.style.transform = `translate(${random(minX, maxX)}px, ${random(minY, maxY)}px)`;
            ball.style.backgroundColor = getRandomColor();
        });
    });
}

createRandomBall();

document.querySelectorAll('.gallery_image_container').forEach(block => {
    const magnifier = block.querySelector('.magnifier');
    block.addEventListener('mousemove', e => {
        const rect = block.getBoundingClientRect();
        magnifier.style.left = `${e.clientX - rect.left - 77}px`;
        magnifier.style.top = `${e.clientY - rect.top - 77}px`;
    });
});