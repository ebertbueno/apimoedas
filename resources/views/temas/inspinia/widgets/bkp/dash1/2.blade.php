<div class="col-md-12">
                        <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;">
                            	<canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 419.2px; height: 180px;" width="524" height="225">
                            		
                            	</canvas>
                            	<div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                            	<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 11px; text-align: center;">0.0</div>
                            	<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 72px; text-align: center;">2.5</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 133px; text-align: center;">5.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 194px; text-align: center;">7.5</div>
                            	<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 252px; text-align: center;">10.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 312px; text-align: center;">12.5</div>
                            	<div class="flot-tick-label tickLabel" style="position: absolute; max-width: 52px; top: 163px; left: 373px; text-align: center;">15.0</div></div>
                            	<div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                            	<div class="flot-tick-label tickLabel" style="position: absolute; top: 150px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 113px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 75px; left: 1px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 38px; left: 1px; text-align: right;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">40</div></div></div><canvas class="flot-overlay" width="524" height="225" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 419.2px; height: 180px;"></canvas></div>
                        </div>
                        <div class="row text-left">

                        	@foreach($info as $i)
                        		<div class="col">
	                                <div class=" m-l-md">
	                                <span class="h5 font-bold m-t block">$ {{ number_format($i->valor,2,',','.') }}</span>
	                                <small class="text-muted m-b block">{{ $i->descricao }}</small>
	                                </div>
                            	</div>
                        	@endoreach

                        </div>
                    </div>