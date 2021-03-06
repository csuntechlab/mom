/* JS FOR ANYTHING ON PROFILE EDIT VIEW */

$(document).ready(function(){
	var skill_counter = { counter: 2 };
	var exp_counter   = { counter: 2 };
	var back_counter  = { counter: 2 };

	// Creates a new textbox
	function addTextbox(ob, name, placeholder, selector)
	{
		// No more than 10 textboxes can be created
		if(selector.children().length >= 10)
		{
            alert("Only 10 textboxes allowed");
            return false;
		}   
		
		// New li to hold each input
		var newTextBox = $(document.createElement('li'));
                
        // Textbox
		newTextBox.after().html('<input type="text" class="form-control" placeholder="' + placeholder + '" name="' + name + '[]" value="" ><button style="background: transparent; border: 0;" id="' + name + '"><span class="student-seb-list-del">X</span></button>');

		selector.prepend(newTextBox);
            
		ob.counter++;

	}

	/* Preview the profile image before upload */
	function previewImage(input) 
	{
	    if (input.files && input.files[0]) 
	    {
	        var reader = new FileReader();
	        
	        reader.onload = function (e) 
	        {
	        	// Hide the profile image text 'Upload Image'
	        	$('#profile_image_preview_text').css('display', 'none');

	        	// Show the what the image looks like before uploading
	            $('#profile_image_preview').css({
	            	'background': 'url("'+ e.target.result +'") no-repeat center center',
	            	'background-size': 'cover',
	            	'width': '300px', 
	            	'height': '300px',
	            	'border-radius': '50%'
	            });
	        }
	        
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	// Calls previewImage function every time the input file is changed
	$("#profile_image_file").change(function()
	{
    	previewImage(this);
	})

	// Add an experience textbox
	$('#add_experience').click(function(e)
	{
		e.preventDefault();
		addTextbox(exp_counter, 'experiences', 'Add experience', $('#experience_list'));
	})

	// Remove an experience textbox
	$('#experience_list').on('click', '#experiences', function(e)
	{
		e.preventDefault();

		$(this).parent('li').remove();

		exp_counter.counter--;
	})

	// Prevents modal button click from submitting form
	$('#edit-profile-modal-btn').click(function(e){
		e.preventDefault();
	})

	// Add a skill textbox
	// $('#add_skill').click(function(e)
	// {	
	// 	e.preventDefault();
	// 	addTextbox(skill_counter, 'skills', 'Add skill', $('#skills_list'));
	// })

	// Remove a skill textbox
	// $('#skills_list').on('click', '#skill', function(e)
	// {
	// 	e.preventDefault();

	// 	$(this).parent('li').remove();

	// 	skill_counter.counter--;
	// })

	// Add a background textbox
	// $('#add_background').click(function(e)
	// {
	// 	e.preventDefault();
	// 	addTextbox(back_counter, 'backgrounds', 'Add background', $('#background_list'));
	// })

	// Remove a background textbox
	// $('#background_list').on('click', '#background', function(e)
	// {
	// 	e.preventDefault();

	// 	$(this).parent('li').remove();

	// 	back_counter.counter--;
	// })
})



