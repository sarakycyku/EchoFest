function formatCard(input) {
        let v = input.value.replace(/\D/g, '').substring(0, 16);
        input.value = v.replace(/(.{4})/g, '$1 ').trim();
    }

function formatExpiry(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 4);
    if (v.length >= 3) v = v.slice(0, 2) + '/' + v.slice(2);
    input.value = v;
}

//per animacione
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

document.querySelectorAll('.panel, .summary-panel, .page-title')
        .forEach(el => observer.observe(el));