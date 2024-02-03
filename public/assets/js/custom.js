$(document).ready(function () {   
    handle_owl_carousel();
    handle_image_link();  
    handle_validate();
    handle_datatable();
}); 

function handle_owl_carousel()
{
    $(".owl-carousel").owlCarousel({
        loop:true,
        items : 1,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        dots: false,
        nav: true,
        navText: ['<button type"button" class="btn bg-theme text-white" style="border-radius:50%;"><span class="fa fa-chevron-left"></span></button>','<button type"button" class="btn bg-theme text-white" style="border-radius:50%"><span class="fa fa-chevron-right"></span></button>'],
    });
}
    
function handle_image_link()
{
    if($(".image-link").length){
        $(".image-link").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });
    }
}

function handle_validate()
{
    $("#form").validate();
}

function handle_datatable()
{ 
    $("#datatable").DataTable();
}

function readURL(input)
{
    // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
        var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

        reader.onload = function (e) {
            // Mulai pembacaan file
            $("#preview_gambar") // Tampilkan gambar yang dibaca ke area id #preview_gambar
                .attr("src", e.target.result);
            //.width(300); // Menentukan lebar gambar preview (dalam pixel)
            //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function VerifyUploadSizeIsOK()
{
    var UploadFieldID = "file-upload";
    var MaxSizeInBytes = 1048576;
    var fld = document.getElementById(UploadFieldID);
    if(fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes)
    {
        setTimeout(function () { 
            swal({
                position: 'top-end',
                icon: 'error',
                title: 'Ukuran gambar/foto terlalu besar!!',
                showConfirmButton: false,
                timer: 5000
            });
        },2000); 
        return false;
    }
    return true;
} 