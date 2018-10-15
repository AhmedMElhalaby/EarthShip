@extends('layout.app')
@section('content')
    <section id="howItWork">
		<div class="inside-header">
			<h2>How Earthship Works</h2>
		</div>
		<div class="circles">
			<img src="img/how-circle.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				@foreach ($Steps as $step)
					<div class="step">
						<div class="col-md-6 col-sm-6">
							<div class="info">
								<h2>{{$step->title}}</h2>
								<p> {{$step->description}}</p>
								<span class="number">{{$index++}}</span>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<img src="{{$step->image}}" alt="">
						</div>
					</div>
					@if ($step->subSteps)
						@foreach ($step->subSteps as $subStep)
							<div class="step">
								<div class="col-md-6 col-sm-6">
									<div class="info">
										<h2>{{$subStep->title}}</h2>
										<p> {{$subStep->description}}</p>
										<span class="number">{{$subIndex++}}</span>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<img src="{{$subStep->image}}" alt="">
								</div>
							</div>
						@endforeach
						<?php $subIndex = 'a'; ?>
					@endif
				@endforeach
				
				<div class="done">
					<h1>ALL DONE!</h1>
					<img src="{{asset('public/home/img/Done.png')}}" alt="">
				</div>
			</div>
		</div>
	</section>
	<section id="signup">
		<h2>Sign up now</h2>
		<button class="btn btn-primary">Sign up free</button>
	</section>
@include('layout.footer')
@endsection