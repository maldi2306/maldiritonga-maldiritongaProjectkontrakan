@extends('layout.page', ['title' => 'Daftar Kontrakan'])
@section('content')
<div class="col-md-12 d-flex align-items-center" style="margin-top: 10px; margin-left: 35px">
    <div class="tab-content ftco-animate" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
            aria-labelledby="v-pills-1-tab">
            <div class="row justify-content-center mb-5" >
                
            </div>
            <div class="row">
<div style="text-align: center; ">
    <h1><b>Kontrakan & Kos Bapak Edi</b></h1>
    <br><br>
</div>

@foreach ($kontrakans as $item)

                <div class="col-md-4 text-center" style="width: 360px">
                    <div class="menu-wrap">
                        <div class="menu-img img mb-4"
                            style="background-image:  @if ($item->foto) <a href="{{ Storage::url($item->foto) }} target="blank">
                                                <img src="{{ Storage::url($item->foto) }}" width="200px" height="200px" alt="" style="margin-bottom: 20px"></a> @endif
                                        <div class="text">
                            <h2>{{ $item->keterangan }}
                            </h2>
                            <p class="price"><span>Rp.{{ $item->harga }}</span></p>
                            <p class="price"><span>{{ $item->deskripsi }}</span></p>
                            
                        </div>
                    </div>
                    <div class="text">
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>
   

  
      
@endforeach
</div>
</div>
</div>
</div>

@endsection
