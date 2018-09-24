// $(document).ready(function(){
//     $('[data-toggle="popover"]').popover();   
// });
$(document).ready(function(){
	// $('#myTabs a').click(function (e) {
	// 	e.preventDefault()
	// 	$('#myTabs a[href="#profile"]').tab('show')
	// });
	/* accoount instellingen */
	$( "#EditFont" ).click(function() {
	  $( "#EditFontTab" ).slideToggle( "fast" );
	});
	$( "#EditHeader" ).click(function() {
	  $( "#EditHeaderTab" ).slideToggle( "fast" );
	});
	$( "#EditBody" ).click(function() {
	  $( "#EditBodyTab" ).slideToggle( "fast" );
	});
	$( "#ProfielFoto" ).click(function() {
	  $( "#ProfielFotoTab" ).slideToggle( "fast" );
	});
	$( "#UpdateBio" ).click(function() {
	  $( "#UpdateBioTab" ).slideToggle( "fast" );
	});
	/* profiel instellingen */
	$( "#EditNickname" ).click(function() {
	  $( "#EditNicknameTab" ).slideToggle( "fast" );
	});
	$( "#EditFirstname" ).click(function() {
	  $( "#EditFirstnameTab" ).slideToggle( "fast" );
	});
	$( "#EditLastname" ).click(function() {
	  $( "#EditLastnameTab" ).slideToggle( "fast" );
	});
	$( "#EditEmail" ).click(function() {
	  $( "#EditEmailTab" ).slideToggle( "fast" );
	});
	$( "#EditPassword" ).click(function() {
	  $( "#EditPasswordTab" ).slideToggle( "fast" );
	});
	$( "#EditBirthday" ).click(function() {
	  $( "#EditBirthdayTab" ).slideToggle( "fast" );
	});
	$( "#DeleteAcc" ).click(function() {
	  $( "#DeleteAccTab" ).slideToggle( "fast" );
	});
	/* posts */
	$( "#close ").click(function() {
		$("#newpost").show();
		$("#newtekst").hide();
		$("#newfoto").hide();
		$("#newcitaat").hide();
	});
	$( "#tekst" ).click(function() {
		$( "#newtekst" ).slideToggle( "fast" );
		$( "#newpost" ).hide();
	});
	$( "#foto" ).click(function() {
		$( "#newfoto" ).slideToggle( "fast" );
		$( "#newpost" ).hide();
	});
	$( "#citaat" ).click(function() {
		$( "#newcitaat" ).slideToggle( "fast" );
		$( "#newpost").hide();
	});
	/* Likes */
	if ($( '#like' ).hasClass('far fa-heart fa-lg') == 'far fa-heart fa-lg') {
		$( '#like' ).attr('far fa-heart fa-lg', 'fas fa-heart fa-lg')
	}
});