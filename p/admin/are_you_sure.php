
<?php 

session_start();
error_reporting(0);



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Really Simple Jquery Dialog</title>
	<style>


		
.simple-dialog {
	position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 11;
    width: 100%;
    min-height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
}

.simple-dialog.active {
	height: 100%;
    opacity: 1;
    -webkit-transition: -webkit-transform .25s;
    transition: -webkit-transform .25s;
    -o-transition: transform .25s;
    transition: transform .25s;
    transition: transform .25s, -webkit-transform .25s;
    -webkit-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.simple-dialog a:hover {
	cursor: pointer;
}

.simple-dialog-content {
	background-color: #fff;
    width: 280px;
    margin: 0 auto;
    top: 50%;
    left: 50%;
    position: absolute;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
    box-sizing: border-box;
}

.simple-dialog-header, .simple-dialog-footer {
	padding: 15px;
    position: relative;
    text-align: center;
}

.simple-dialog-body {
	padding: 0 15px;
}

.simple-dialog-header .title {
	margin: 0;
	padding: 0;
}

.simple-dialog-close {
	color: #999999;
    position: absolute;
    top: 15px;
    right: 10px;
    font-size: 30px;
    margin-top: -5px;
    display: inline-block;
    font-size: 24px;
    line-height: 1;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    float: right;
}

.simple-dialog-close:before {
	content: "\00d7"; // here is your X(cross) sign.
	color: #fff;
	font-weight: bold;
	font-family: Arial, sans-serif;
}
.btncolour{

	background-color: #4CAF50;
	height:40px;
	width:80px

}

.simple-dialog-button {
	display: block;
    width: 200px;
    margin: 15px auto;
    color: #fff;
    background-color: rgb(0, 123, 255);
    position: relative;
    display: inline-block;
    padding: 9px 20px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: top;
    cursor: pointer;
}

.simple-dialog-button.accept, .simple-dialog-button.cancel {
	width: 30%;
}

.simple-dialog-button.accept {
	background-color: rgb(40, 167, 69);
}

.simple-dialog-button.cancel {
	background-color: rgb(134, 142, 150);
}

	</style>
</head>
<body align="right">
	<input type="submit" value="Logout"  id="showConfirm"  class="btncolour"  >
	
	
	<div id="testConfirm" ></div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script >
	
(function($) {
	

	$.fn.simpleConfirm = function(options) {
		if (typeof options === 'undefined') options = {};

        var defaultOptions = {
	        title: 'Confirm!!',
	        message: '',
	        acceptBtnLabel: 'Logout',
	        cancelBtnLabel: 'Cancel',
	        success: function() {},
	        cancel: function() {}
	    }
	    options = $.extend(defaultOptions, options);

	    this.each(function() {
	    	var $this = $(this);
	    	var html;

	    	$this.addClass('simple-dialog active');

	    	html = '<div class="simple-dialog-content">';
	    	html += '<div class="simple-dialog-header"><h3 class="title">'+options.title+'</h3></div>';
	    	html += '<div class="simple-dialog-body"><p class="message">'+options.message+'</p></div>';
	    	html += '<div class="simple-dialog-footer clearfix"><a class="simple-dialog-button accept" data-action="close">'+options.acceptBtnLabel+'</a><a class="simple-dialog-button cancel" data-action="close">'+options.cancelBtnLabel+'</a></div>';
	    	html += '</div>';

	    	$this.html(html);

	    	$(document).on('click', 'a[data-action="close"]', function(e) {
				e.preventDefault();
				$(this).parents('.simple-dialog').removeClass('active');
				if($(this).hasClass('accept')) {
					options.success();
					
   
                          
   
                           
				}
				if($(this).hasClass('cancel')) {
					options.cancel();
				}
			});
	    });

	    return this;
	};

})(jQuery);
</script>
<script type="text/javascript">

	$('#showConfirm').click(function(e) {
		$('#testConfirm').simpleConfirm({
			message: "Are You sure want to logout!",
			success: function() {
				//$('#testAlert').simpleAlert({
					//message: "You clicked Accept button."
				//});
				window.location = "logout.php";

				
			},
			cancel: function() {
				//$('#testAlert').simpleAlert({
				//	message: "You clicked Cancel button."
				//});
				window.location = "adminhome.php";
			}
		});
	});

</script>
</body>
</html>