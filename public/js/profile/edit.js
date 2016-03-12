/* JS FOR ANYTHING ON PROFILE EDIT VIEW */

$(document).ready(function(){
	var skill_counter = { counter: 2 };
	var exp_counter   = { counter: 2 };
	var back_counter  = { counter: 2 };

	// Creates a new textbox
	function addTextbox(ob, name, placeholder, selector)
	{
		// No more than 10 textboxes can be created
		if(ob.counter > 10)
		{
            alert("Only 10 textboxes allowed");
            return false;
		}   
		
		// New li to hold each input
		var newTextBox = $(document.createElement('li')).attr('class', 'student-seb-list-items');
                
        // Textbox
		newTextBox.after().html('<input type="text" class="input-text" placeholder="' + placeholder + '" name="' + name + ob.counter + 
	      '" value="" ><button style="background: transparent; border: 0;" id="' + name + '"><span class="student-seb-list-del">X</span></button>');

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

	// Add a skill textbox
	$('#add_skill').click(function()
	{
		addTextbox(skill_counter, 'skill', 'Add skill', $('#skills_list'));
	})

	// Remove a skill textbox
	$('#skills_list').on('click', '#skill', function(e)
	{
		e.preventDefault();

		$(this).parent('li').remove();

		skill_counter.counter--;
	})

	// Add an experience textbox
	$('#add_experience').click(function()
	{
		addTextbox(exp_counter, 'experience', 'Add experience', $('#experience_list'));
	})

	// Remove an experience textbox
	$('#experience_list').on('click', '#experience', function(e)
	{
		e.preventDefault();

		$(this).parent('li').remove();

		exp_counter.counter--;
	})

	// Add a background textbox
	$('#add_background').click(function()
	{
		addTextbox(back_counter, 'background', 'Add background', $('#background_list'));
	})

	// Remove a background textbox
	$('#background_list').on('click', '#background', function(e)
	{
		e.preventDefault();

		$(this).parent('li').remove();

		back_counter.counter--;
	})
})



