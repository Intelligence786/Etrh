
var globId=0;
var globBodyElement=null;

$('.glob').find('interaction').find('.edit').on('click',function(event){
event.preventDefault();

globBodyElement=event.target.parentNode.parentNode.childNodes[1];
var globBody=globBodyElement.textContent;
globId=event.target.parentNode.parentNode.dataset['id'];
$('#glob-body').val(globBody);
$('#edit-modal').modal();

});


$('#modal-save').on('click', function(){

	$.ajax({
method:'POST',
url:urlEdit,
data:{body:$('#glob-body').val(), globId:globId,_token:token}
	});

	.done(function(msg){
$(globBodyElement).text(msg['new_body']);
$('#edit-modal').modal('hide');
	});
});


$('.like').on('click', function(event){
	var isLike = event.target.previousElementSibling==null;
$.ajax({
method:'POST',
url: URL('/'),
data:{isLike: isLike, globId: globId, _token:token}
});
	console.log(isLike);
});