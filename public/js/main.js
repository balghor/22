$(".jalali-date-input").persianDatepicker({
    observer: true,
    format: 'YYYY/MM/DD',
});
$('.select').select2();

$(".listproject").on('select2:select', function (e) {
    var data = e.params.data;
    console.log(data.id);
});
