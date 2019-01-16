function Delete(id, url)
{
    console.log("Delete function called!");
    $.ajax({
        url: 'reserveringen/destroy/'+id,
        type: 'DELETE',
        success: function(result)
        {

        }
    });

}
