function createHeart() {
    const heart = document.createElement('div');
    heart.className = 'hearts';
    heart.innerHTML = '❤';
    heart.style.left = Math.random() * 100 + 'vw';
    heart.style.top = window.scrollY + Math.random() * window.innerHeight + 'px';  // Add this line
    heart.style.animationDuration = Math.random() * 2 + 3 + 's';
    document.body.appendChild(heart);

    setTimeout(() => {
        heart.remove();
    }, 5000);
}

// Update heart positions on scroll
window.addEventListener('scroll', () => {
    document.querySelectorAll('.hearts').forEach(heart => {
        const currentTop = parseInt(heart.style.top);
        heart.style.top = window.scrollY + (currentTop - window.scrollY) + 'px';
    });
});

setInterval(createHeart, 300);


function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}

const observer = new IntersectionObserver(handleIntersection, {
    threshold: 0.3
});

document.querySelectorAll('.fade-in').forEach(element => {
    observer.observe(element);
});