const colors = ['#B28E7B', '#90AFA0', '#C15E57', '#417E78', '#806D90', '#264A7A'];
const defaultNumDots = 20;

const fadeMinDuration = 1;
const fadeMaxDuration = 3;
const moveMinDuration = 2;
const moveMaxDuration = 4;
const delayMaxDuration = 3;

function createDot(container) {
    const dot = document.createElement('div');
    dot.className = 'dot';
    dot.style.top = `${Math.random() * (container.clientHeight - 15)}px`;
    dot.style.left = `${Math.random() * (container.clientWidth - 15)}px`;
    dot.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
    dot.style.setProperty('--dx', (Math.random() - 0.5) * 100);
    dot.style.setProperty('--dy', (Math.random() - 0.5) * 100);
    const moveDuration = (Math.random() * (moveMaxDuration - moveMinDuration) + moveMinDuration).toFixed(2);
    const fadeDuration = (Math.random() * (fadeMaxDuration - fadeMinDuration) + fadeMinDuration).toFixed(2);
    const delay = (Math.random() * delayMaxDuration).toFixed(2);
    dot.style.animationDuration = `${moveDuration}s, ${fadeDuration}s`;
    dot.style.animationDelay = `${delay}s, ${delay}s`;
    container.appendChild(dot);
}

document.querySelectorAll('.dots').forEach(container => {
    const numDots = container.dataset.num ? parseInt(container.dataset.num, 10) : defaultNumDots;
    for (let i = 0; i < numDots; i++) {
        createDot(container);
    }
});