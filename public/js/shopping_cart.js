function addToCart(url)
{
    $.ajax({
        url: url,
        type: 'POST',
        success: function(response) {

            Swal.fire(
              response.message,
              '',
              'success'
            )

            window.location.reload(true);
        }
    });
}