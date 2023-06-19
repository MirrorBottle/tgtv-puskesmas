{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<!-- row -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-warning">
				<div class="card-body p-4">
					<div class="media">
						<span class="mr-3">
							<i class="flaticon-381-user-1"></i>
						</span>
						<div class="media-body text-white text-right">
							<p class="mb-1">Total Lansia</p>
							<h3 class="text-white">{{$elderlies}}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-success">
				<div class="card-body p-4">
					<div class="media">
						<span class="mr-3">
							<i class="flaticon-381-file-1"></i>
						</span>
						<div class="media-body text-white text-right">
							<p class="mb-1">Total Data Pemeriksaan</p>
							<h3 class="text-white">{{$elderly_records}}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if (auth()->user()->isRoleAdmin)
		<div class="row">
			<div class="col-12">
				<div class="row">
					<!-- <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12"> -->
					<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header border-0 pb-2">
								<h4 class="card-title">Pengujung Bulan {{\Carbon\Carbon::now()->format('F')}}</h4>
							</div>
							<div class="card-body pt-2">
								<h3 class="text-primary font-w600">{{array_sum($tracks)}} Visits</h3>
								<div class="row mx-0 align-items-center">
									<div class="col-12  px-0">
										<div id="chartStrock"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>

@push('addition-scripts')
		<script>
			$(function() {
				const chartStrock = function(){
					const dates = JSON.parse('{!! json_encode($dates); !!}');
					const tracks = JSON.parse('{!! json_encode($tracks); !!}');
					const options = {
							series: [{
							data: tracks
						}],
							chart: {
							id: 'area-datetime',
							type: 'area',
							height: 350,
							width: '100%',
							//width: 300,
							zoom: {
								autoScaleYaxis: true
							},
							toolbar: {
								show: false
							},
						},
						colors:['#03489c', '#E91E63', '#2781D5'],
						dataLabels: {
							enabled: false
						},
						markers: {
							size: 0,
							style: 'hollow',
						},
						xaxis: {
							categories: dates,
						},
						yaxis: {
							show: false
						},
						grid: {
							show: false,
						},	
						responsive: [{
							breakpoint: 1024,
							options: {
								chart: {
									width: '100%',
								}
							}
						}],	
					};
					const chart = new ApexCharts(document.querySelector("#chartStrock"), options);
					chart.render();
					const resetCssClasses = function(activeEl) {
						const els = document.querySelectorAll('button')
						Array.prototype.forEach.call(els, function(el) {
							el.classList.remove('active')
						})
					
						activeEl.target.classList.add('active')
					}
				}
				chartStrock();
			})
</script>
@endpush

@endsection
