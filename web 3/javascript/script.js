
function horaInversa(hora, minutos) {
    hora = hora % 12;
    var horaOpuesta = (hora + 6) % 12;
    if (horaOpuesta == 0) horaOpuesta = 12;
    return [horaOpuesta, minutos];
}

// manejar el envío del formulario
var form = document.getElementById('form');
form.onsubmit = function(e) {
    e.preventDefault();
    var h = parseInt(document.getElementById('hora').value);
    var m = parseInt(document.getElementById('minutos').value);
    var resultadoEl = document.getElementById('resultado');

    if (isNaN(h) || isNaN(m) || h < 0 || h > 23 || m < 0 || m > 59) {
        resultadoEl.innerText = 'Datos inválidos';
        resultadoEl.style.color = 'red';
    } else {
        var inv = horaInversa(h, m);
        var minStr = inv[1] < 10 ? '0' + inv[1] : inv[1];
        resultadoEl.innerText = 'Hora inversa: ' + inv[0] + ':' + minStr;
        resultadoEl.style.color = 'green';
    }
};