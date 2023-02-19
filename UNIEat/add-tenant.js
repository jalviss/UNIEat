$(() => {
    $("#save-btn").click(() => {
        var name = $("#name").val()
        var email = $("#email").val()
        var phonenum = $("#phone-num").val()

        var phonePattern = /(\+62|0)8[1-9][0-9]{6,9}$/

        if(name == ""){
            alert("Name required.")
            return;
        }
        else if(name.length < 5){
            alert("Minimal name length is 5.")
            return;
        }
        else if(name.search(/[0-9]/) != -1){
            alert("Name must not consist of numbers.")
            return;
        }

        if(email == ""){
            alert("Email required.")
            return;
        }
        else if(!email.match(/\S+@\S+\.\S+/)){
            alert("Email format is incorrect.");
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
    

        $("#tenant-form").submit();
    })

})

