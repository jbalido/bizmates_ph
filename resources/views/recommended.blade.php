@isset($recommendations)
<hr>
<div class="row">
	<div class="col-12">
		<div class="tagline p-3">
			<h3>
				Experience the best of {{ $place['data']['name'] }}! 最高の体験 {{ $place['data']['name'] }}!
			</h3>
		</div>
	</div>
</div>
<div class="row">
	@foreach ($recommendations['data'] as $value)
	<div class="col-12">
		<div class="recommendation_details mt-2 p-3 mb-3">
			<h6>
				{{ $value['categories'][0]->name }} <img id="picon" src="{{ $value['categories'][0]->icon->prefix }}64.png" alt="Place icon">
			</h6>
			<h5>{{ $value['name'] }}</h5>
			<h6>
				Address : 
				@foreach($value['location']['formattedAddress'] as $address)
					<span>{{ $address }} </span>
				@endforeach
				@isset($value['location']['neighborhood']) near {{ $value['location']['neighborhood'] }} @endisset
			</h6>
		</div>
	</div>
	@endforeach
</div>
@endisset


<div class="recommendations_pagination_container">
@isset($details)
    {{ $details->render() }}
@endisset
</div>