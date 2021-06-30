window.addEventListener('load', () => {

    const pegarDataComeco = () => {
        const data = document.getElementById('data').value;
        if (/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])\ ([0-1][0-9]|2[0-3]):(0[0-9]|[1-5][0-9]):(0[0-9]|[1-5][0-9])$/.test(data)) {
            return data;
        }
        return '';
    };
    const dataComeco = pegarDataComeco();

    const blocoDia = document.getElementById('dia');
    const blocoHora = document.getElementById('hora');
    const blocoMinuto = document.getElementById('minuto');
    const blocoSegundo = document.getElementById('segundo');

    const setarValor = () => {
        if (dataComeco == '') {
            clearInterval(setarValor);
            return false;
        }
        const dataAtual = new Date();

        const diferenca = moment(dataAtual).preciseDiff(dataComeco, true);
        const dia = diferenca.days;

        let hora = diferenca.hours;
        let minuto = diferenca.minutes;
        let segundo = diferenca.seconds;

        if (hora < 10) {
            hora = '0' + hora;
        }
        if (minuto < 10) {
            minuto = '0' + minuto;
        }
        if (segundo < 10) {
            segundo = '0' + segundo;
        }
        blocoDia.innerHTML = dia;
        blocoHora.innerHTML = hora;
        blocoMinuto.innerHTML = minuto;
        blocoSegundo.innerHTML = segundo;
    };
    setarValor();

    setInterval(setarValor, 1000);

});