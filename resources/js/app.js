require('./bootstrap');

$('search-button').on('click', function(){
    $.ajax({
        url: 'https://api.binderbyte.com/v1/track?api_key=9421cc74f5eeb586f785529d0cceced18f3fe226f7fc18b549c5ad84ef24b328',
        type: 'get',
        dataType: 'json',
        data: {
            'courier': $('#courier_input').val(),
            'awb': $('awb_input').val()
        },

        success: function(result){
            if(result.status == 200){
                let resi = result.data;
                console.log(resi);
                $('#resi.status').html(`
                    <div class="col-md-8">
                        <div>`+"STATUS PENGIRIMAN"+`</div>
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <th scope = "row">`+"STATUS"+`</th>
                                    <td>`+ resi.summery.status +`</td>
                                </tr>
                                
                                <tr>
                                    <th scope = "row">`+"LAYANAN"+`</th>
                                    <td>`+ resi.summery.service +`</td>
                                </tr>
                                
                                <tr>
                                    <th scope = "row">`+"PENGIRIM"+`</th>
                                    <td>`+ resi.summery.shipper +`</td>
                                </tr>
                                <tr>
                                    <th scope = "row">`+"ASAL"+`</th>
                                    <td>`+ resi.summery.origin +`</td>
                                </tr>
                                <tr>
                                    <th scope = "row">`+"PENERIMA"+`</th>
                                    <td>`+ resi.summery.receiver +`</td>
                                </tr>
                                <tr>
                                    <th scope = "row">`+"TUJUAN"+`</th>
                                    <td>`+ resi.summery.destionation +`</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `) 
            }else{
                $('#resi-result').html(`
                    <div class="col">
                        <h1 class = "text-center">`+ result.message +`</h1>
                    </div>
                `)
            }
        }
    })
})


