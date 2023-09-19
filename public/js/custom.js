$(document).ready(function (){
    /* Page select*/
    $('.bulk-update-btn').on('click', function (e){
        e.preventDefault()
        var checkedValues = $('input[type=checkbox]:checked').map(function() {
            return $(this).val();
        }).get();
        $('.selecte_page').val(checkedValues);
        if($('.bulk-action').val()) {
            $('.bulk-update').submit();
        }
    })

    /* Blog Select*/
    $('.bulk-update-btn-blog').on('click', function (e){
        e.preventDefault()
        var checkedValues = $('input[type=checkbox]:checked').map(function() {
            return $(this).val();
        }).get();
        $('.selecte_blog').val(checkedValues);
        if($('.bulk-action').val()) {
            $('.bulk-update').submit();
        }
    })
    pre_key();
})


/* KeyWord */
//The entered keywords
var allKeywords = []

function pre_key() {
    var keyword = $('#meta_keyword_val').val()
    if (keyword && keyword.length > 0) {
        var key_array = keyword.split(', ');
        $.each(key_array, function(index, value) {
            addWord(value)
        });
    }
}

//Add a keyword
function addWord(word){
    if(word === undefined || word === ''){
        return;
    }
    allKeywords.push(word);
    $('#divKeywords > input[type=text]').after($('<span class="keyword">' + word + '<a class="delete" onclick="deleteWord(this)"><i class="fa fa-times" aria-hidden="true"></i></a></span>'));
    $('#txtInput').val('');
    $('#txtInput').focus();
    var key_val = allKeywords.join(', ');
    $('#meta_keyword_val').val(key_val)
}
//Delete a keyword
function deleteWord(element){
    var index = allKeywords.indexOf($(element).parent('.keyword').text());
    if(index !== -1){
        allKeywords.splice(index, 1);
    }
    $(element).parent('.keyword').remove();
    var key_val = allKeywords.join(', ');
    $('#meta_keyword_val').val(key_val)
}
//On focus out, add word
function addWordFromTextBox(){
    var val = $('#txtInput').val();
    if(val !== undefined && val !== ''){
        addWord(val);
    }
}

//On key press, check for , or ;
function checkLetter(){
    var val = $('#txtInput').val()
    if(val && val.length > 0){
        var letter = val.slice(-1);
        if(letter === ',' || letter === ';'){
            var word = val.slice(0,-1);
            if(word && word.length > 0){
                addWord(word);
            }
        }
    }
}
// checkLetter()

$('#txtInput').blur(addWordFromTextBox);
$('#txtInput').keyup(checkLetter);
// $('#divKeywords').click(function(){ $('#txtInput').focus(); });


// JavaScript code for drag and drop functionality
var dragItem = null;
document.addEventListener("dragstart", function(event) {
    // Save reference to the element being dragged
    dragItem = event.target;
    jQuery('.column-result input').attr('name', 'menu_order[]')
    jQuery('.column-prev input').attr('name', 'menu_order_prev[]')
});
document.addEventListener("dragover", function(event) {
    // Allow drops on element
    event.preventDefault();
    jQuery('.column-result input').attr('name', 'menu_order[]')
    jQuery('.column-prev input').attr('name', 'menu_order_prev[]')
});
document.addEventListener("drop", function(event) {
    // Only handle drops on columns
    if (event.target.classList.contains("column")) {
        // Append dragged element to column
        event.target.appendChild(dragItem);
        jQuery('.column-result input').attr('name', 'menu_order[]')
        jQuery('.column-prev input').attr('name', 'menu_order_prev[]')
    }
});


/*Form JS*/
/*$(document).ready(function (){
    var no = {{count($form_fields)+1}};
    $("#add-fild").on("click", ()=>{
        var lbl = $('#add_filds').val(); var dn = 'd-none'; var rq = '';
        if(['Checkbox', 'Radio', 'Select'].includes(lbl)) { dn = ''; rq = 'required';}
        no++;
        // <div class="col-xs-2 col-sm-2 col-md-2"><span class="btn btn-sm btn-danger btn-close remove">X</span></div>
        let template = '<div class="row new_row" > <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Type:</strong> <input type="text" name="filed['+no+'][type]" class="form-control" value="'+lbl+'" required readonly> </div> </div> <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Label:</strong> <input type="text" name="filed['+no+'][label]" class="form-control" value="" required> </div> </div> <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Required:</strong> <input type="radio" name="filed['+no+'][required]" value="1" > Yes <input type="radio" name="filed['+no+'][required]" value="0" checked> No </div> </div> <div class="col-xs-3 col-sm-3 col-md-3"> <div class="form-group"> <strong>Custom Attr:</strong> <input type="text" name="filed['+no+'][custom_attr]" class="form-control" value="" > </div> </div> <div class="col-xs-3 col-sm-3 col-md-3"> <div class="form-group '+dn+'"> <strong>Options:</strong> <input type="text" name="filed['+no+'][options]" class="form-control value="" '+rq+' > </div> </div>  </div>';
        $("#form-add").append(template);
    })
    $("body").on("click", ".remove", ()=>{
        $('.new_row:last').remove();
        // console.log($(this).closest('.new_row').html());
    })
})*/

/*Menu create blade*/
$(document).ready(function (){
    let template = '<div class="row new_row" > <div class="col-xs-4 col-sm-4 col-md-4"> <div class="form-group"> <strong>Name:</strong> <input type="text" name="name[]" class="form-control" placeholder="Name" value="" required> </div> </div> <div class="col-xs-6 col-sm-6 col-md-6"> <div class="form-group"> <strong>Slug/URL:</strong> <input type="text" name="slug[]" class="form-control" placeholder="Slug/URL" value="" required > </div> </div><div class="col-xs-2 col-sm-2 col-md-2"> <span class="btn btn-sm btn-danger btn-close remove">X</span></div></div>';

    $("#add_row").on("click", ()=>{
        $("#menu-add").append(template);
    })
    $("body").on("click", ".remove", ()=>{
        $('.new_row:last').remove();
    })
})


$('.multi-select').select2();
$(document).ready(function(){

    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:5,
        searchResultLimit:5,
        renderChoiceLimit:5
    });


});