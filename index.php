<!DOCTYPE html>
<html>
<head>
<title>Index Page</title>
<link rel="stylesheet" href="../bootstrap.min.css">
<!-- <link rel="stylesheet" href="open-iconic-master/font/css/open-iconic-bootstrap.css"> -->
</head>
<style type="text/css">
	.card{
		margin: 15px 0;
	}
	.card p {
		margin: 15px;
	}
	.icon {
		width: 24px;
		height: 24px;
		margin: 15px;
		vertical-align: middle;
	}
	.card-body {
		display: none;
	}
	.card img {
		cursor: pointer;
	}
	.error{
		color: #f00f00;
	}
</style>
<body>

	<div class="container">
		<form name="new">
			<p class="message text-center"></p>
			<div class="container-fluid">
				<div class="card">
					<div class="card-head">
						<div class="row">
							<div class="col-md-9">
								<div class="card-title">
									<p></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-icon">
									<img class="icon add" src="open-iconic-master/svg/plus.svg" alt="icon name">
									<img class="icon minus" src="open-iconic-master/svg/minus.svg" alt="icon name">
									<img class="icon open" src="open-iconic-master/svg/caret-bottom.svg" alt="icon name">
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<label class="text-muted" for="card-title">Card'd Title:</label>
								<input class="form-control" type="text" name="card0['card_title']">
								<span></span>
							</div>
							<div class="col-md-3">
								<label class="text-muted" for="Text1">Input 1:</label>
								<input class="form-control" type="text" name="card0['Text1']">
								<span></span>
							</div>
							<div class="col-md-3">
								<label class="text-muted" for="Text2">Input 2:</label>
								<input class="form-control" type="text" name="card0['Text2']">
								<span></span>
							</div>
							<div class="col-md-3">
								<label class="text-muted" for="Text3">Input 3:</label>
								<input class="form-control" type="text" name="card0['Text3']">
								<span></span>
							</div>
						</div>
						<br />
					</div> 
				</div>
			</div>
			<button class="btn btn-success" type="submit" style="float: right" type="submit">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="../jquery.min.js"></script>
	<script type="text/javascript">	

		var cards = 1;
		
		function appendCard(cards){

			return '<div class="card"><div class="card-head"><div class="row"><div class="col-md-9"><div class="card-title"><p></p></div></div><div class="col-md-3"><div class="card-icon"><img class="icon add" src="open-iconic-master/svg/plus.svg" alt="icon name"><img class="icon minus" src="open-iconic-master/svg/minus.svg" alt="icon name"><img class="icon open" src="open-iconic-master/svg/caret-bottom.svg" alt="icon name"></div></div></div></div><div class="card-body"><div class="row"><div class="col-md-3"><label class="text-muted" for="card'+cards+'-title">Card\'d Title:</label><input class="form-control" type="text" name="card'+cards+'card_title"><span></span></div><div class="col-md-3"><label class="text-muted" for="card'+cards+'Text2">Input 1:</label><input class="form-control" type="text" name="card'+cards+'Text1"><span></span></div><div class="col-md-3"><label class="text-muted" for="card'+cards+'Text2">Input 2:</label><input class="form-control" type="text" name="card'+cards+'Text2"><span></span></div><div class="col-md-3"><label class="text-muted" for="card'+cards+'Text2">Input 3:</label><input class="form-control" type="text" name="card'+cards+'Text3"><span></span></div></div><br /></div></div>';
		}
		
		
		$('body').on('click', '.add', function(){
			cards++;
			$('.container-fluid').append(appendCard(cards));
			$(this).remove('img.add');
		});
		
		$('body').on('click', '.minus', function(){

			if(cards == 1){
				$('.message').addClass('text-danger').text('This Can\'t be deleted');
			}
			else{
				$(this).parents('.card').remove();
				cards--;
			}
			$('.card .add').remove();
			$('body .card:last-child .card-icon').prepend('<img class="icon add" src="open-iconic-master/svg/plus.svg" alt="icon name">');
		});
		
		$('body').on('click', '.open', function(){
			$(this).parents('.card-head').next().toggle();
		});

		$('body').on('keyup keydown', 'input[name*=card_title]', function(){
			var title = $(this).val();
			$(this).parents('.card').find('.card-title p').text(title);
		});

		$('form[name=new]').submit(function(e){
			e.preventDefault();
			if($('body').find('input').val() == '' || $('body').find('input').val() == null){
				$('body').find('input').next().addClass("error").text('This is required');
			}
			else{
				var formData = $(this).serialize();
				console.log(formData);
			}
		});
	</script>

</body>
</html>
