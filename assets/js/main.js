// lightbox.option({
//     'resizeDuration': 200,
//     'wrapAround': true
//   })
//   function readUrl(input, id) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function(e) {
//             $("#"+id).attr("src", e.target.result);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
            
        };
        

        reader.readAsDataURL(input.files[0]);
    }
}
$('.img_tag').each(function () {
    if (this.src.length < 0) {
        $('.img_tag')
        .addAttr('hidden');
    }
});
setTimeout(function(){
        $('.alert').slideUp();
    }, 3000);


    function removehidden(id) {
        
            reader.onload = function (e) {
                $('#'+id)
                    .removeAttr('hidden');
            };  
    }

