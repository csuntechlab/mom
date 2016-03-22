$(document).ready(function(){

    /* Preview the project image before upload */
    function previewImage(input) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            
            reader.onload = function (e) 
            {
                // Hide the project image text 'Upload Image'
                $('#project_image_preview_icon').css('display', 'none');

                // Show the what the image looks like before uploading
                $('#project_image_preview').css({
                    'background': 'url("'+ e.target.result +'") no-repeat center center',
                    'background-size': 'cover',
                    'width': '300px',
                    'z-index': '5',
                    'height': '300px',
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Calls previewImage function every time the input file is changed
    $("#project_image_file").change(function()
    {
        previewImage(this);
    })

});