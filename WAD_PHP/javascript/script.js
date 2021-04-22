   
$( document ).ready(function() {

    $(document).on('click', '.updaat', function(){
       
        var idToSend = $(this).attr('id');
        var idtextbox="txt" + idToSend;
        var description=$("#"+idtextbox).val();

        {
            $.ajax({                               
                url: "handlers/changeBoard.php",
                method:"POST",
                data:{idToSend:idToSend,description:description},             
                success: function (data) {
                    
                    $("#boardMain").html(data);
                },
                error: function(){ alert("error");}
            });
        }
        
        
    });

    $(document).on('click', '.deleet', function(){
       
        var idToSend = $(this).attr('id');

        {
            $.ajax({                               
                url: "handlers/deleteBoard.php",
                method:"POST",
                data:{idToSend:idToSend},             
                success: function (data) {
                    
                    $("#boardMain").html(data);
                },
                error: function(){ alert("error");}
            });
        }
        
        
    });
    
    
    $("#filter").click(function(){
       
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var checkerAdmin=false;
        if(page=="adminPage.php") {checkerAdmin=true;}  

        var dte=$("#dtpick").val();
        if(dte!="")
        {
            $.ajax({                               
                url: "handlers/filterDateBoard.php",
                method:"POST",
                data:{selectedDate:dte,check:checkerAdmin},             
                success: function (data) {
                    
                    $("#boardMain").html(data);
                },
                error: function(){ alert("error");}
            });
        }
        else{
            alert("Please select date");
        }
    });


    
    $("#emailErrorMsg").hide();
    $("#nameErrorMsg").hide();
    $("#passRepeatErrorMsg").hide();
    $("#weightErrorMsg").hide();
    $("#heightErrorMsg").hide();
    $("#passLenErrorMsg").hide();

    var emailError=false;
    var nameError=false;
    var passLenError=false;
    var passRepeatError=false;
    var weightlError=false;
    var heightError=false;
    
    
    $("#emailCheckForm").focusout(function(){ checkmail()});
    $("#nameCheckForm").focusout(function(){ checkname()});
    $("#passRepeatCheckForm").focusout(function(){ checkpassrepeat()});
    $("#weightCheckForm").focusout(function(){ checkweight()});
    $("#heightCheckForm").focusout(function(){ checkheight()});
    $("#passLenCheckForm").focusout(function(){ checkpasslen()});

    $("#name").focusout(function(){ checkname()});
    $("#email").focusout(function(){ checkmail()});

    function checkheight(){
        
        var weightReg=/^[0-9]*$/;
        var weightVal=$("#heightCheckForm").val();
        
        if(weightReg.test(weightVal)){
            $("#heightErrorMsg").hide();
        }
        else
        {
            $("#heightErrorMsg").css('color', 'red');
            $("#heightErrorMsg").html("     Height must be a number");
            $("#heightErrorMsg").show();
            heightError=true;
        }

        
    }


    function checkweight(){
        
        var weightReg=/^[0-9]*$/;
        var weightVal=$("#weightCheckForm").val();
        
        if(weightReg.test(weightVal)){
            $("#weightErrorMsg").hide();
        }
        else
        {
            $("#weightErrorMsg").css('color', 'red');
            $("#weightErrorMsg").html("     Weight must be a number");
            $("#weightErrorMsg").show();
            weightlError=true;
        }

        
    }


    function checkpassrepeat(){
        
        
        var passValue=$("#passLenCheckForm").val();
        var repeatValue=$("#passRepeatCheckForm").val();
        if(passValue==repeatValue){
            $("#passRepeatErrorMsg").hide();
        }
        else
        {
            $("#passRepeatErrorMsg").css('color', 'red');
            $("#passRepeatErrorMsg").html("     Password does not match");
            $("#passRepeatErrorMsg").show();
            passRepeatError=true;
        }

        
    }

    function checkpasslen(){
        
        
        var passValue=$("#passLenCheckForm").val().length;

        if(passValue>8){
            $("#passLenErrorMsg").hide();
        }
        else
        {
            $("#passLenErrorMsg").css('color', 'red');
            $("#passLenErrorMsg").html("     Password must have more than 8 characters");
            $("#passLenErrorMsg").show();
            passLenError=true;
        }

        
    }


    function checkname(){
        
        var nameReg = /^[a-zA-Z\s]*$/;
        var nameValue=$("#nameCheckForm").val();

        if(nameReg.test(nameValue)){
            $("#nameErrorMsg").hide();
        }
        else
        {
            $("#nameErrorMsg").css('color', 'red');
            $("#nameErrorMsg").html("     Name must be letters only");
            $("#nameErrorMsg").show();
            nameError=true;
        }

        
    }



    function checkmail(){
        
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailValue=$("#emailCheckForm").val();

        if(emailReg.test(emailValue)){
            $("#emailErrorMsg").hide();
        }
        else
        {
            $("#emailErrorMsg").css('color', 'red');
            $("#emailErrorMsg").html("      Invalid email address");
            $("#emailErrorMsg").show();
            emailError=true;
        }
    }

    $("#submitForm").submit(function(){
        emailError=false;
        nameError=false;
        passLenError=false;
        passRepeatError=false;
        weightlError=false;
        heightError=false;

        checkheight();
        checkmail();
        checkname();
        checkpasslen();
        checkpassrepeat();
        checkweight();

        if(emailError==false && nameError==false&& passLenError==false && passRepeatError==false && weightlError==false  && heightError==false)
            {return true;}
        else{ return false;}

    })

    


    $("#dtpick").datepicker();
})

