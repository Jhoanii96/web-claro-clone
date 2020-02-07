
/* event listener */
document.getElementsByName("dni")[0].addEventListener('input', doThing);
document.getElementsByName("contact_point")[0].addEventListener('input', phoneNumber);

/* function */
function doThing(){
    document.getElementById("qr").value = btoa(this.value);
}

/* function */
function phoneNumber(){

    var string2 = this.value;
    var phone = string2.replace(/(\d{2})(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 $4');
    document.getElementById("contact_point").value = phone;

}