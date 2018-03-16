$(document).ready(function(e) {
    var urlHead = 'http://localhost:8000/';
    $('#endDate').on('change', function(e) {
        e.preventDefault();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        console.log(startDate + " " + endDate);

        $.ajax({
            url: urlHead + 'reports/viewrawproductlosing/' + startDate + '/' + endDate,
            method: 'get',
            data: {startDate : startDate, endDate: endDate},
            type: 'json',
            success: function(response) { 
                if (response.status == 200) {
                    var table = ' ';
                    var i = 1;
                    table += '<table  border="1" class="table table-striped"><thead class="thead-dark">';
                    table += '<tr><th>#</th><th >Raw product name</th><th>Total quantity</th><th>Separation losing</th><th width="80px"> Detail</th></tr>';
                    table += '</thead><tbody>';
                    table += '</tbody>';
                    table += '</tabel>';
                    $.each(response.data, function(index) {
                        table += '<tr><td>' + i + '</td>';
                        table += '<td>' + response.data[index].rp_name + '</td>';                                     
                        table += '<td>' + response.data[index].qty + '</td>';
                        table += '<td>' + (response.data[index].qty - response.data[index].totalqty) + '</td>';
                        table += '<td><a href="' + urlHead  + 'reports/viewlosingitemdetial/' + response.data[index].rp_id + '?from='+ startDate +'&to='+ endDate +'" class="btn btn-success">Detail</a></td>';
                        //table += '<td><a href="' + urlHead  + 'reports/viewlosingitemdetial/' + response.data[index].rp_id + '" class="btn btn-success">Detail</a></td></tr>';
                        i++;
                    });
                    $('#append-table').html(table);
                }     
            }
        });
    });
});