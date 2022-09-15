let countDate = new Date('october 7, 2021 00:00:00').getTime();

function CountDown(){
    let now = new Date().getTime();
    gap = CountDown - now;
    
    let second = 1000;
    let minute = second * 60;
    let hour = minute * 60;
    let day = hour * 24;
    
    let d = math.floor(gap / (day));
    let h = math.floor((gap % (day)) / (hour));
    let m = math.floor((gap % (hour)) / (minute));
    let s = math.floor((gap % (minute)) / (second));
    
    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;
    
}
setInterval(function(){
    CountDown();
},1000)