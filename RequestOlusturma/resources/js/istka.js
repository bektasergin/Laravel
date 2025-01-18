$('#addProduct').on('click', function () {
    const productName = $('#productName').val();
    const productDescription = $('#productDescription').val();
    const productPrice = $('#productPrice').val();
    const productStock = $('#productStock').val();

    const product = {
        name: productName,
        description: productDescription,
        price: productPrice,
        stock: productStock
    };
    try {
        $.ajax({
            url: '/product/create',
            method: 'POST',
            data: {
                ...product,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $.notify(response.message, "success");
                    setTimeout(function () {
                        window.location.reload();
                    },1000);
                }else{
                    $.notify(response.message, "error");
                    console.log(response.error);
                    
                }
            },

            error:function (error) {
                $.notify("Ürün eklenirken bir sorun oluştu!", "error");
                console.log(error);
                
            }

        });
    } catch (e) {
        console.log(e);
    }


});