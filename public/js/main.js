$(".jalali-date-input").persianDatepicker({
    initialValue: false,
    format: 'YYYY/MM/DD',
});
$('.select,.select2').select2();

function deleteitem() {
    state = confirm('آیا از حذف این مورد اطمینان دارید؟')
    if(state == true){
        return true;
    }else{
    return false;
    }
}
function copy(sender,el) {
    /* Get the text field */
    var copyText = document.getElementById(el);

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    $(sender).html("کپی شد!");
}
