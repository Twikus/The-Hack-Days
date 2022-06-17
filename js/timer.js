setInterval(() => {
    $.post('./inc/chrono.php', function(data){
        toString(data)
        console.log(data);
        $('#chrono').text(data);
    });
}, 1000);