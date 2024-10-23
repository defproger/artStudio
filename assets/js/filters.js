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

    const galleryBlocks = document.querySelectorAll('.gallery_block');
    const controlsContainer = document.querySelector('.controls');
    const itemsPerPage = 4;
    let currentPage = 1;

    showGalleryPage(currentPage);
    updateEvenVisibleClasses();

    function updateEvenVisibleClasses() {
        const visibleBlocks = document.querySelectorAll('.gallery_block');
        let visibleIndex = 0;

        visibleBlocks.forEach((block) => {
            block.classList.remove('even-visible');
            if (block.style.display !== 'none') {
                visibleIndex++;
                if (visibleIndex % 2 === 0) {
                    block.classList.add('even-visible');
                }
            }
        });
    }

    function showGalleryPage(page, scrollToTop = false) {
        galleryBlocks.forEach((block) => {
            block.style.display = 'none';
        });

        let visibleBlocks = document.querySelectorAll('.gallery_block.filtered');
        if (visibleBlocks.length === 0) {
            visibleBlocks = galleryBlocks;
        }

        visibleBlocks.forEach((block, index) => {
            if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
                block.style.display = 'block';
            }
        });

        updateEvenVisibleClasses();
        updateControls(visibleBlocks.length);

        if (scrollToTop) {
            $('html, body').animate({
                'scrollTop': $(filterButton).offset().top - 100
            }, 1000);
        }
    }

    function updateControls(visibleBlocksCount) {
        controlsContainer.innerHTML = '';

        if (currentPage > 1) {
            const prevControl = document.createElement('div');
            prevControl.classList.add('previous');
            prevControl.innerHTML = `<div class="control"><span>PREVIOUS PAGE</span></div>`;
            prevControl.addEventListener('click', () => {
                currentPage--;
                showGalleryPage(currentPage, true);
            });
            controlsContainer.appendChild(prevControl);
        }

        if (currentPage < Math.ceil(visibleBlocksCount / itemsPerPage)) {
            const nextControl = document.createElement('div');
            nextControl.classList.add('next');
            nextControl.innerHTML = `<div class="control"><span>NEXT PAGE</span></div>`;
            nextControl.addEventListener('click', () => {
                currentPage++;
                showGalleryPage(currentPage, true);
            });
            controlsContainer.appendChild(nextControl);
        }
    }

    function filterGallery() {
        let activeFilters = Array.from(document.querySelectorAll(`${checkBoxElement}:checked`)).map(cb => cb.value.replace('.', ''));
        galleryBlocks.forEach(block => {
            const status = block.getAttribute('data-status');
            if (activeFilters.length === 0 || activeFilters.includes(status)) {
                block.classList.add('filtered');
            } else {
                block.classList.remove('filtered');
            }
        });
        currentPage = 1;
        showGalleryPage(currentPage);
    }

    filterCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', filterGallery);
    });

    galleryBlocks.forEach(function (block) {
        block.querySelector('button').addEventListener('click', function () {
            const artId = block.getAttribute('data-id');
            window.open(`artwork_info.php?id=${artId}`, '_blank');
        });
    });

    filterButton.addEventListener('click', function () {
        filterPopup.classList.remove('closed');
        setTimeout(() => {
            filterPopup.classList.add('open');
        }, 50);
        // Add event listener for clicks outside the popup
        setTimeout(() => {
            document.addEventListener('click', handleClickOutsidePopup);
        }, 100); // Slight delay to prevent immediate closure when opening
    });

    closeButton.addEventListener('click', function () {
        closeFilterPopup();
    });

    function handleClickOutsidePopup(event) {
        if (!filterPopup.contains(event.target) && event.target !== filterButton) {
            closeFilterPopup();
        }
    }

    function closeFilterPopup() {
        filterPopup.classList.remove('open');
        setTimeout(() => {
            filterPopup.classList.add('closed');
        }, 500);
        // Remove event listener since the popup is closed
        document.removeEventListener('click', handleClickOutsidePopup);
    }

    filterCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const value = this.value.replace('.', '');
            if (this.checked) {
                addFilter(value);
            } else {
                removeFilter(value);
            }
        });
    });

    function addFilter(value) {
        const filterButtonElement = document.createElement('button');
        filterButtonElement.className = 'chosen_filter';
        filterButtonElement.innerHTML = `<div class="cross"></div><span>${value}</span>`;
        filterButtonElement.addEventListener('click', function () {
            removeFilter(value);
            filterButtonElement.classList.add('removing');
            setTimeout(() => {
                filterButtonElement.remove();
                document.querySelector(`${checkBoxElement}[value="${value}."]`).checked = false;
                filterGallery();
            }, 500);
        });
        chosenFilters.appendChild(filterButtonElement);
        filterGallery();
    }

    function removeFilter(value) {
        const filterButtons = document.querySelectorAll('.chosen_filter span');
        filterButtons.forEach(function (span) {
            if (span.textContent === value) {
                const parentButton = span.parentElement;
                parentButton.classList.add('removing');
                setTimeout(() => {
                    parentButton.remove();
                    filterGallery();
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

$(document).ready(function () {
    $('.gallery_image_container').click(function () {
        let imgSrc = $(this).find('img').attr('src');
        $('#galleryImagePopup img').attr('src', imgSrc);
        $('#galleryImagePopup').fadeIn(300);
    });

    $('#closeGalleryPopupButton').click(function () {
        $('#galleryImagePopup').fadeOut(300);
    });
});