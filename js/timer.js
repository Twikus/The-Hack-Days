$.post('./inc/chrono.php', function(data){
    if (data == '<empty string>'){
    }else{
        setInterval(() => {
            $.post('./inc/chrono.php', function(data){
                toString(data)
                $('#chrono').text(data);
            });
        }, 1000);
    }
});