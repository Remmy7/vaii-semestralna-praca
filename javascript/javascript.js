function jsSilaHeslaBarUpdate () {
    let parametre = {
        pocet: false,
        pocet2: false,
        pismena: false,
        cisla: false,
        specialne: false
    }
    let barSila = document.getElementById("barSila");
    let password = document.getElementById("passwordStrength").value;

    parametre.pocet = (password.length > 10);
    parametre.pocet2 = (password.length > 15);
    parametre.pismena = (/[A-Za-z]+/.test(password));
    parametre.cisla = (/[0-9]+/.test(password));
    parametre.specialne = (/[!"$%&/()=?@~\.\;:+*_-]+/.test(password));

    console.log(Object.values(parametre));
    let dlzkaBaru = Object.values(parametre).filter(value => value);
    console.log(Object.values(parametre), dlzkaBaru);

    barSila.innerHTML = "";
    for (let i of dlzkaBaru) {
        let span = document.createElement("span");
        span.classList.add("strength");
        barSila.appendChild(span);
    }

    let pomocna = document.getElementsByClassName("strength");
    for (let i = 0; i < pomocna.length; i++) {
        switch (pomocna.length - 1) {
            case 0:
                pomocna[i].style.background = "#FF0000";
                break;
            case 1:
                pomocna[i].style.background = "#ffa500";
                break;
            case 2:
                pomocna[i].style.background = "#ffff00";
                break;
            case 3:
                pomocna[i].style.background = "#b4e369";
                break;
            case 4:
                pomocna[i].style.background = "#476b07";
                break;
        }
    }
}