$(".jalali-date-input").persianDatepicker({
    initialValue: false,
    format: 'YYYY/MM/DD',
});
$('.select').select2();

$(".listproject").on('select2:select', function (e) {
    var data = e.params.data;
    $.get("/ajax/load_project",{id:data.id},function (data) {
        $("#project_name").val(data.ProjectName);
        $("#start_date").val(data.StartDate);
        $("#end_date").val(data.EndDate);
        $("#physical_progress").val(data.Physical);
        $("#cost").val(data.Financial);
        if(data.finished=="0"){
            $("#ccv2").select();
            $("#ccv2").click();
        }
        if(data.finished=="1"){
            $("#ccv3").select();
            $("#ccv3").click();
        }
        $("#description").val(data.description);
    })
});
function deleteitem() {
    state = confirm('آیا از حذف این مورد اطمینان دارید؟')
    if(state == true){
        return true;
    }else{
    return false;
    }
}
