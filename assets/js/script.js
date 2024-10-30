jQuery(document).ready(function( $ ) {

$("#addpostfield").click(function(){
    var offset = $("#srcpt-offset").val();
    $("#srcpt-cptappend").append("<div class='ctp_mapper_right_card_block'><div><h3>New Post Type</h3></div><div><label class='ctp_mapper_label'>Name of Post Type:</label><div><input type='text' class='ctp_mapper_field' name='srcpt_cpt["+offset+"][name]' required></div></div><div><label class='ctp_mapper_label'>Icon:</label><div><input type='text' name='srcpt_cpt["+offset+"][icon]' class='ctp_mapper_field' ><a class='srcptlink' href='https://developer.wordpress.org/resource/dashicons' target='_blank'>get icons</a></div></div><div><label class='ctp_mapper_label'>Post Slug:</label><div><input type='text' class='ctp_mapper_field' name='srcpt_cpt["+offset+"][slug]' required></div></div><div class='standard-padding'>Support:</div><label class='ctp_mapper_label'>Title</label><input type='checkbox' value='title' name='srcpt_cpt["+offset+"][title]'><label class='ctp_mapper_label'>Editor</label><input type='checkbox' value='editor' name='srcpt_cpt["+offset+"][editor]'><label class='ctp_mapper_label'>Author</label><input type='checkbox' value='author' name='srcpt_cpt["+offset+"][author]'><label class='ctp_mapper_label'>Thumbnail</label><input type='checkbox' value='thumbnail' name='srcpt_cpt["+offset+"][thumbnail]'><label class='ctp_mapper_label'>Excerpt</label><input type='checkbox' value='excerpt' name='srcpt_cpt["+offset+"][excerpt]'><label class='ctp_mapper_label'>Comments</label><input type='checkbox' value='comments' name='srcpt_cpt["+offset+"][comments]'></div>").hide().fadeIn(300);
})

$("#add_tax_field").click(function(){
    var toffset = $("#srcpt-taxoffset").val();
   	$("#srcpt-taxappend").append("<div class='ctp_mapper_right_card_block'><div><h3>New Taxonomy:</h3></div><div><label class='ctp_mapper_label'>Name of Taxonomy:</label><div><input type='text' class='ctp_mapper_field' name='srcpt_tax["+toffset+"][tname]' required></div></div><div><label class='ctp_mapper_label'>Slug:</label><div><input type='text' class='ctp_mapper_field' name='srcpt_tax["+toffset+"][tslug]' required></div><label class='ctp_mapper_label'>Post Types:</label><span class='notice_txt'>If you want to associate this taxonomy with multiple post types then just saperate them with a comma e.g post1,post2</span><div><input class='ctp_mapper_field' type='text' name='srcpt_tax["+toffset+"][srcpt_ptypes]' required></div></div>").hide().fadeIn(300);
})

$("#ctp_mapper_text").click(function(){
    var moffset = $("#srcpt-metaoffset").val();
	$("#metafieldappend").append("<div class='ctp_mapper_right_card_block'><div><h3>New Meta Box:</h3></div><div><label class='ctp_mapper_label'>Name of Meta Box:</label><div><input type='text' name='srcpt_meta["+moffset+"][mname]' class='ctp_mapper_field'  required></div></div><div><label class='ctp_mapper_label'>ID of Meta Box:</label><div><input type='text' name='srcpt_meta["+moffset+"][mid]' class='ctp_mapper_field'  required></div></div><div><label>Post Type:</label><div><input type='text' name='srcpt_meta["+moffset+"][mscreen]' class='ctp_mapper_field' required><div>Note: Saperate names for post types with comma e.g  postone,posttwo </div></div></div><div><label>Context:</label><div><select class='srcptselect' name='srcpt_meta["+moffset+"][mcontext]'><option value='normal'>normal</option><option value='side'>side</option><option value='advanced'>advanced</option></select></div></div><div><label>Priority:</label><div><select name='srcpt_meta["+moffset+"][mpriority]' class='srcptselect'><option value='high' >high</option><option value='low'>low</option></select></div></div><div><label>Meta Box Type:</label><div><select class='srcptselect' id='metaselect' name='srcpt_meta["+moffset+"][mtype]'><option value='text'>Text Field</option><option value='textarea'>Text Area</option><option value='checkbox'>Checkbox</option><option value='select'>Select</option><option value='radio'>Radio Button</option></select></div></div><div class='standard-padding'><span id='partials'></span></div><span id='sub-partial'></span></div>").hide().fadeIn(300);
	
	$("#metaselect").on("change", function() {
     	if ( (  $("#metaselect").val() == "radio"  ) || ( $("#metaselect").val() == "checkbox" ) || ( $("#metaselect").val() == "select"  ) ) {
     		if($('#addbox').length == 0){
                $("#partials").append("<div class='standard-padding'><span id='add_opt_field' class='srcptlink'>Add Option</span></div><span id='srcpt-optappend'></span>");
                $("#add_opt_field").click(function(){
                    $("#srcpt-optappend").append("<div class='standard-padding-two'><input type='text class='ctp_mapper_field' name='srcpt_opt_meta["+moffset+"][]' placeholder='enter name of option' required></div>").hide().fadeIn(300);
                })	
     		}	
     	}
    });

})

$(".removeblock").click(function(){
    $(this).parent().remove();
})
$(".editposttypes").click(function(){
    $(this).next().slideToggle(800);
});



});
