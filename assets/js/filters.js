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