const H2 = gsap.timeline({paused: true});
H2
.from("#group_response", {opacity:0, ease:"linear"}, 0)

/*Check if the name of the student is empty*/
function Check_if_name_empty(){
    var name = $('#name').val();
    if (name != null){
        $.post('inc/input_checker.php', {name: name}, function(data){
            var convert_data = Object.values(data.split(','));
            if (convert_data.length>1){
                if (convert_data[1]==''){
                    $('#group_response').text('Tu fais parti du TP '+convert_data[0]+' et ton nom de groupe n\'est pas encore défini !');
                }else{
                    $('#group_response').text('Tu fais parti du TP '+convert_data[0]+' et du groupe : "'+convert_data[1]+'" !');
                }          
                $('.error').text('');
                H2.timeScale(1).play();
            }else{
                $('#group_response').text('');
                $('.error').text(convert_data[0]);

                H2.timeScale(H2.duration()).reverse();
            }
        });
    }
};



/*Check if the name of the team is empty and/or an image for it is selected*/
function Check_empty_team(){
    if (document.forms["form"]["team"].value == ""){
        $('#name_error').text('Pas de nom d\'équipe saisi !');
    }else{
        $('#name_error').text('');
        $('#name_error_2').text('');
    }
};

function Check_empty_file(){
if($('#file')[0].files.length === 0 ){
    $('#file_error').text('Aucun fichier selectionné !');
}else{
    $('#file_error').text('');
    $('#file_error_2').text('');
}
};

window.addEventListener("load", function() {
Check_if_name_empty();
Check_empty_team();
Check_empty_file();
});
$('#name').keyup(Check_if_name_empty);
$('#name').on('blur input', (Check_if_name_empty));

$('#team').keyup(Check_empty_team);
$('#team').on('blur input', (Check_empty_team));

$('#file').on('blur input', (Check_empty_file));