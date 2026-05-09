document.querySelector('input[name="coming_date"]').addEventListener('input', function() {
    let v = this.value.replace(/\D/g, '').substring(0, 8);
    if (v.length >= 3) v = v.slice(0, 2) + '/' + v.slice(2);
    if (v.length >= 6) v = v.slice(0, 5) + '/' + v.slice(5);
    this.value = v;
});