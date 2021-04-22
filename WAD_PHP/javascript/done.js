

function checked(){
    var isChk = $("input:checkbox[name='check[]']").is(":checked");
    
    if(!isChk){
        alert("Please check");
        return false;
    }else{
        $.ajax({
            url:'../handlers/workoutBoard.php', 
            type:'post',
            data:{'id':'admin'}, 
            success: function(data) {
            },
            error: function(err) {
            }
        });
        
    }
}