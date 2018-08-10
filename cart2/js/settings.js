// JavaScript Document
$(document).ready(function() {
$('#set1').hide();
$('#user').hide();
$('#sale').hide();
$('#report').hide();
$('#statistic').hide();
$('#product').hide();
$('#change').hide();


$('#settings').hover(function()
   {   
   $('#set1').show('slow');
	},function(){
	$('#set1').toggle('slow');
	});
	
	
$('#uManagement').hover(function()
   {   
   $('#user').show('slow');
	},function(){
	$('#user').toggle('slow');
	});
	
	$('#sales').hover(function()
   {   
   $('#sale').show('slow');
	},function(){
	$('#sale').toggle('slow');
	});
	
	$('#reports').hover(function()
   {   
   $('#report').show('slow');
	},function(){
	$('#report').toggle('slow');
	});
	
	$('#statistics').hover(function()
   {   
   $('#statistic').show('slow');
	},function(){
	$('#statistic').toggle('slow');
	});
	
	$('#products').hover(function()
   {   
   $('#product').show('slow');
	},function(){
	$('#product').toggle('slow');
	});
	
	$('#changes').hover(function()
   {   
   $('#change').css('margin-top','20px').show('slow');
	},function(){
	$('#change').toggle('slow');
	});
	
});