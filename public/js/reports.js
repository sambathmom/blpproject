$(document).ready(function(e) {
    e.preventDefault();
    $('#endDate').on('change', function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        console.log(startDate + " " + endDate);

        $.ajax({
            url: 'http://localhost:8000/reports/viewworkedrecords',
            method: 'POST',
            data: {startDate : startDate, endDate: endDate},
            success: function() {
                
            }
        });
    });
});