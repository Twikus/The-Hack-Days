function Empty(){
    var name = $('#name').val();
    if (name != null){
        $.post('inc/name_check.php', {name: name}, function(data){
            var convert_data = Object.values(data.split(','));
            
            /*A SUPP*/
            console.log(data);
            console.log(convert_data);
            console.log('-----------------');
            /*A SUPP*/

            if (convert_data.length>1){
                $('#group_response').text('Tu fais parti du TD '+convert_data[0]+' et du groupe : "'+convert_data[1]+'" !');
                $('.error').text('');
            }else{
                $('#group_response').text('');
                $('.error').text(convert_data[0]);
            }
        });
    }
};

window.addEventListener("load", function() {
    Empty();
});
$('#name').keyup(Empty);
$('#name').on('blur input', (Empty));


var team = $('#team').val();
function Check_team(){
        if (document.forms["form"]["team"].value != ""){
            $('.error').text('');
            console.log('Vide');
        }else{
            $('.error').text('Pas de nom d\'équipe saisi !');
            console.log('Message');
        }
};

window.addEventListener("load", function() {
    Check_team();
});
$('#team').keyup(Check_team);
$('#team').on('blur input', (Check_team));