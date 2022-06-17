setInterval(() => {
    $.post('./inc/chrono.php', function(data){
        toString(data)
        console.log(data);
        const [hours, minutes, seconds] = data.split(':');

        const date = new Date(0, 0-1, 0, 0, +minutes, +seconds);
        if (date.getSeconds() < 10){
            $seconds = '0'+date.getSeconds();
        }else{
            $seconds = date.getSeconds();
        }

        if (date.getMinutes() < 10){
            $minutes = '0'+date.getMinutes();
        }else{
            $minutes = date.getMinutes();
        }
        const Min_sec = $minutes + ':' + $seconds;
        $('#chrono').text(Min_sec);

    });
}, 1000);