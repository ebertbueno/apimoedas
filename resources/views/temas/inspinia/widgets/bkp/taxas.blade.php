<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover margin bottom">
                                <thead>
                                    <tr>
                                        <th style="width: 1%" class="text-center">#</th>
                                        <th style="width: 89%" class="text-left">Taxa</th>
                                        <th style="width: 10%" class="text-center">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total=1;
                                    @endphp
                                    @foreach( exibeTaxasContrato() as $key => $taxas )
                                    <tr>
                                        <td class="text-center">{!! $total++ !!}</td>
                                        <td class="text-left">{!! trataTraducoes($key) !!}</td>
                                        <td class="text-center"><span class="label label-primary">{!! $taxas !!}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>