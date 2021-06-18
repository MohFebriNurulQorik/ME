
@extends('layouts..master_template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-responsive" id="datatable-basic2">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Code Barang</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <div class="media">
                                                    <a class="thumbnail pull-left" href="#">
                                                        <img class="media-object" src="{{url('product-icon.png')}}" style="width: 72px; height: 72px;" />
                                                    </a>
                                                    <div class="media-body pl-4">
                                                        <h4 class="media-heading"><a href="#">{{$item->NamaBRG}}</a></h4>
                                                        <h5 class="media-heading">by <a href="#">{{$item->NAMAMERK}}</a></h5>
                                                        <span>Status: </span><span class="text-success"><strong>Ready</strong></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->Hrg1_1}}</strong></td>
                                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->KodeBRG}}</strong></td>
                                            <td class="col-sm-1 col-md-1">
                                                <a href="order_detail/{{$item->KodeBRG}}" class="btn btn-sm btn-danger"><i class="fas fa-shopping-basket"></i></a>
                                            </td>
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
@endsection

