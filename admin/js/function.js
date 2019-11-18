jQuery(document).ready(function() { 
    var $ = jQuery;
    
	
	
	
	
	
	if ($('.set_custom_images').length > 0) {
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $(document).on('click', '.set_custom_images', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.prev();
                wp.media.editor.send.attachment = function(props, attachment) {
                    alert(JSON.stringify(attachment))
					id.val(attachment.id);
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }
	
	if ($('.addImage').length > 0) {
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $(document).on('click', '.addImage', function(e) {
                e.preventDefault();
               var button = $(this);
                var id = button.prev();
                wp.media.editor.send.attachment = function(props, attachment) {
                    //alert(JSON.stringify(attachment))
					//id.val(attachment.id);
					$('.apllicationbody').append('<tr> <td> <input type="checkbox"  class="scpt_check" /> </td> <td> <img src="'+attachment.sizes.thumbnail.url+'" /><input type="hidden" name="image[file][]" value="'+attachment.id+'" /></td> <td><input class="form-control" type="text" name="image[title][]" value="'+attachment.title+'" /></td> <td> <textarea class="form-control" name="image[description][]"></textarea>'+attachment.description+'</td></tr>');
					
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }
	
	$(document).on('click', '.scpt_delete_item', function(e) { 
	 	e.preventDefault();  
		$('.scpt_check:checked').parents('tr').remove(); 
		
	 });
	
});