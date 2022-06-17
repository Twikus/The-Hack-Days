function Show_GroupAndTP(){
    var name = $('#name').val();
    if ($.trim(name) != ''){
        $.post('inc/request_tp_and_groupe.php', {name: name}, function(data){
            var convert_data = Object.values(data.split(','));
            
            /*A SUPP*/
            console.log(data);
            console.log(convert_data);
            console.log('-----------------');
            /*A SUPP*/

            if (convert_data[0] === ""){
                $('#group_response').text(' ');
            }else{
            $('#group_response').text('Du TP '+convert_data[0]+' et du groupe "'+convert_data[1]+'"');
            }   
        });
    }else{
        $('#group_response').text(' ');
    }
};

$('#name').keyup(Show_GroupAndTP);
$('#name').on('blur input', (Show_GroupAndTD));