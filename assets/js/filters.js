document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterButton');
    const filterPopup = document.getElementById('filterPopup');
    const closeButton = document.getElementById('closeButton');
    const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
    const chosenFilters = document.getElementById('chosenFilters');

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
                document.querySelector(`.filter-checkbox[value="${value}"]`).checked = false;
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
        let minX = -150;
        let maxX = button.clientWidth - 100;
        let minY = -250;
        let maxY = 35;
        let ball = button.querySelector('.button-ball');
        ball.style.backgroundColor = getRandomColor();
        ball.style.transform = `translate(${random(minX, maxX)}px, ${random(minY, maxY)}px)`;

        console.log(minX, maxX, minY, maxY);
    });
}

createRandomBall();