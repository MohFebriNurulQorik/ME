
@extends('layouts.master_template')

<?php $data=Session::get('order'); ?>
@section('content')


<style>

.title {
    margin-bottom: 5vh
}

.card {
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border: transparent
}

@media(max-width:767px) {
    .card {
        margin: 3vh auto
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
    padding: 4vh;
    color: rgb(65, 65, 65)
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 7px
    }
}

.summary .col-2 {
    padding: 0
}

.summary .col-10 {
    padding: 0
}

.row {
    margin: 0
}

.title b {
    font-size: 1.5rem
}

.main {
    margin: 0;

    width: 100%
}

.col-2,
.col {
    padding: 0 1vh
}

a {
    padding: 0 1vh
}

.close {
    margin-left: auto;
    font-size: 0.7rem
}

img {
    width: 3.5rem
}

.back-to-shop {
    margin-top: 4.5rem
}

h5 {
    margin-top: 4vh
}

hr {
    margin-top: 1.25rem
}


select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input:focus::-webkit-input-placeholder {
    color: transparent
}







a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('order.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 cart">
                            <div class="title">
                                <div class="row">
                                    <div class="col">
                                        <h4><b>Keranjang</b></h4>
                                    </div>
                                    <div class="col align-self-center text-right text-muted">{{count($data)}} item</div>
                                </div>

                            </div>
                            <script>
                                super_total=0;

                          </script>

                            @foreach ($data as $key=> $item)
                                <?php $aa=Session::get($item); ?>
                                <div class="row border-top border-bottom">
                                    <div>{{$aa->NamaBRG}}</div>
                                    <div class="row main align-items-center" >
                                        <div class="col-2"><img class="img-fluid" src="{{url('product-icon.png')}}"></div>
                                        <div class="col-4">
                                            <div class="row text-muted">Kode : {{$aa->KodeBRG}}</div>
                                            <div class="row text-muted">Merk : {{$aa->NAMAMERK}}</div>
                                        </div>
                                        <div class="col-2" >
                                            <div class="form-group">
                                                <br>
                                            <input type="number"
                                                class="form-control form-control-sm" name="qty[{{$aa->KodeBRG}}]" id="qty{{$aa->KodeBRG}}" min="1" value="1" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-3" >Rp <span class="order_sub" id="hrg{{$aa->KodeBRG}}">{{number_format($aa->Hrg1_1,2)}}</span></div>
                                        <div class="col-1" style="padding: 0px"><a class="btn btn-sm btn-warning" href="{{url('delete_order/'.$key)}}" class="close"><i class="fas fa-trash-alt"></i></a></div>
                                    </div>
                                </div>
                                <script>

                                    $(document).ready(function () {
                                    super_total+={{$aa->Hrg1_1}};
                                    $('#super_total').text(super_total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                        $('#qty{{$aa->KodeBRG}}').change(function () {
                                        var qty = $(this).val();
                                        super_total = 0;
                                        if(qty>0){
                                            var hrg = {{$aa->Hrg1_1}};
                                            var total=hrg*qty;
                                            $('#hrg{{$aa->KodeBRG}}').text(total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

                                            $('.order_sub').each(function (index, element) {
                                                currency=$(this).text();
                                                super_total+= Number(currency.replace(/[^0-9.-]+/g,""));
                                            });
                                            $('#super_total').text(super_total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                        }else{
                                            $(this).val(1);
                                            var hrg = {{$aa->Hrg1_1}};
                                            $('#hrg{{$aa->KodeBRG}}').text(hrg.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                            $('.order_sub').each(function (index, element) {
                                                currency=$(this).text();
                                                super_total+= Number(currency.replace(/[^0-9.-]+/g,""));
                                            });
                                            $('#super_total').text(super_total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                        }
                                        });
                                    });



                                </script>
                            @endforeach


                            <a href="{{route('order')}}"><div class="back-to-shop">&leftarrow;<span class="text-muted"> Back to shop</span></div></a>
                        </div>
                        <div class="col-md-4 summary">
                            <div>
                                <h2><b>Pembayaran</b></h2>
                                @if ($message = Session::get('Success'))
                                <div class="alert alert-sm alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            </div>
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1);padding: 2vh 0;">
                                <div class="col" style="padding-left:0;">TOTAL HARGA</div>
                                <div class="col text-right " >Rp <span id="super_total">0</span></div>
                            </div>
                            <div  style="border-top: 1px solid rgba(0,0,0,.1);">
                                <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text"
                                    class="form-control form-control-sm " name="nama" id="" style="width:100%;" aria-describedby="nama" placeholder="Nama Perusahaan / Nama Pribadi" required>

                                </div>
                            </div>
                            <div  style="border-top: 1px solid rgba(0,0,0,.1);">
                                <div class="form-group">
                                <label for="email">email</label>
                                <input type="email"
                                    class="form-control form-control-sm " name="email" id="" style="width:100%;" aria-describedby="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div  style="border-top: 1px solid rgba(0,0,0,.1);">
                                <div class="form-group">
                                <label for="tlp">No. Telp</label>
                                <input type="text"
                                    class="form-control form-control-sm " name="tlp" id="" style="width:100%;" aria-describedby="tlp" placeholder="No. Telp yang dapat dihubungi" required>
                                </div>
                            </div>
                            <div  style="border-top: 1px solid rgba(0,0,0,.1);">
                                <div class="form-group">
                                <label for="keterenagan">Keterengan</label>
                                <textarea name="keterenagan" id="" cols="30" style="width: 100%" placeholder="Keteranagan Tambahan"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-dark" type="submit">ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

