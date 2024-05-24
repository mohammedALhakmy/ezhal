function validateFormSend() {
    var rtipType = document.querySelector(".rtip-type").value;
    var address = document.querySelector(".address").value;

    if (rtipType.trim() === "") {
        document.querySelector(".error-type").textContent = " نوع الرحلة مطلوب";
        return false;
    } else {
        document.querySelector(".error-type").textContent = "";
    }

    if (address.trim() === "") {
        document.querySelector(".error-address").textContent = "حقل العنوان مطلوب";
        return false;
    } else {
        document.querySelector(".error-address").textContent = "";
    }

    return true;
}

function validateForm() {
    var fromTrip = document.querySelector(".from-trip").value;
    var toTrip = document.querySelector(".to-trip").value;

    var radios = document.querySelectorAll(".type");
    var formValidType = false;

    var i = 0;
    while (!formValidType && i < radios.length) {
        if (radios[i].checked) formValidType = true;
        i++;        
    }

    if (!formValidType){
        console.log(formValidType)
        document.querySelector(".error-type").textContent = "نوع الرحلة مطلوب";
        return false;
    }else{
        document.querySelector(".error-type").textContent = "";
    }

    if (fromTrip.trim() === "") {
        document.querySelector(".error-from-trip").textContent = "حقل من مطلوب";
        return false;
    } else {
        document.querySelector(".error-from-trip").textContent = "";
    }

    if (toTrip.trim() === "") {
        document.querySelector(".error-to-trip").textContent = "حقل الى مطلوب";
        return false;
    } else {
        document.querySelector(".error-to-trip").textContent = "";
    }

    var radioList = document.querySelectorAll(".radio-list");
    var formValidradioList = false;

    var i = 0;
    while (!formValidradioList && i < radioList.length) {
        if (radioList[i].checked) formValidradioList = true;
        i++;        
    }

    if (!formValidradioList){
        document.querySelector(".error-radio-list").textContent = " نطاق البحث مطلوب";
        return false;
    }else{
        document.querySelector(".error-radio-list").textContent = "";
    }

    return true;
}