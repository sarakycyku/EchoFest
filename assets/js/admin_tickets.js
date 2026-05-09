document.querySelector('input[name="coming_date"]').addEventListener('input', function() {
    let v = this.value.replace(/\D/g, '').substring(0, 6);
    if (v.length >= 3) v = v.slice(0, 2) + '/' + v.slice(2);
    this.value = v;
});