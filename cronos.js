window.onload = function(){
    var seconds = 00;
    var tens = 00;
    var OutputSeconds = document.getElementById("second");
    var OutputTens = document.getElementById("tens");
    var buttonStart = document.getElementById("btn-start");
    var buttonStop = document.getElementById("btn-stop");
    var buttonReset = document.getElementById("btn-reset");
    var Interval;
    var registerenlapsedtime=0;
    var veces=0;
    var OutputVeces = document.getElementById("vecess");
    var OutputEnlapsed = document.getElementById("enlapsed");
    var buttonFin = document.getElementById("btn-fin");
    var usr;
    var logged=0;

    buttonStart.addEventListener('click', () => {
        clearInterval(Interval);
        Interval = setInterval(startTimer, 10);  // millisecond 10 = 0.01 second
    });

    buttonStop.addEventListener('click', () => {
        clearInterval(Interval);
    });

    buttonReset.addEventListener('click', () => {
        registerenlapsedtime = registerenlapsedtime+seconds;
        veces=veces+1;
        OutputEnlapsed.innerHTML = registerenlapsedtime;
        OutputVeces.innerHTML = veces;
        clearInterval(Interval);
        tens = "00";
        seconds = "00";
        OutputSeconds.innerHTML = seconds;
        OutputTens.innerHTML = tens;
    });

    buttonFin.addEventListener('click',()=>{
        if(veces==0){
            swal("No hay nada por aquí", "No hay eventos que registrar", "error");
        }
        else{
            swal("Evento Registrado con éxito","","success");
        }
        if (logged==1) {
            windows.alert("Registrado con éxito");
        }
        else{
            windows.alert("Inicia Sesión o registrate para guardar el evento");
            swal("Inicia o Registrate", "Inicia Sesión o registrate para guardar el evento", "error");
        }
    });

    function startTimer(){
        tens++;
        if(tens <= 9){
            OutputTens.innerHTML = "0" + tens;
        }

        if(tens > 9){
            OutputTens.innerHTML = tens;
        }

        if(tens > 60){
            seconds++;
            OutputSeconds.innerHTML = "0" + seconds;
            tens = 0;
            OutputTens.innerHTML = "0" + 0;
        }

        if(seconds > 9){
            OutputSeconds.innerHTML = seconds;
        }
    }

    function alertTime(){

    }
}