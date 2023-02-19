$(() => {
    $("#register-btn").click(() => {
        var email = $("#email").val()
        var username = $("#username").val()
        var phonenum = $("#phone-num").val()
        var password = $("#password").val()
        var confPassword = $("#confPassword").val()

        var phonePattern = /(\+62|0)8[1-9][0-9]{6,9}$/
        if(email == ""){
            alert("Email required.")
            return;
        }
        else if(!email.match(/\S+@\S+\.\S+/)){
            alert("Email format is incorrect.");
            return;
        }

        if(username == ""){
            alert("Username required.")
            return;
        }
        else if(username.length < 5){
            alert("Minimal username length is 5.")
            return;
        }
        else if(username.search(/[0-9]/) != -1){
            alert("Username must not consist of numbers.")
            return;
        }

        if(phonenum == ""){
            alert("Phone number required.")
            return;
        }
        else if(phonenum.length < 10){
            alert("Phone number is too short")
            return;
        }
        else if(!phonenum.match(phonePattern)){
            alert("Phone number should start with '08' or '+628' and should not consist of any alphabet or symbol.")
            return;
        }
        
        
        if(password == "" || confPassword == ""){
            alert("Password required.")
            return;
        }
        else if(password < 6){
            alert("Password is too short.")
            return;
        }
        else if(password != confPassword){
            alert("Password does not match.")
            return;
        }

        $("#register-form").submit();
    })

})

