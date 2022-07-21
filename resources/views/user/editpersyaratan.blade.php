@extends ('user.index')

@section ('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Persyaratan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"></li>
                </ol>
                <div class="row">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                   <a class="btn btn-secondary" href="/profile/{{auth()->user()->id}}"> Back</a>
                                </div>
                            </div>
                            <div class="body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Terjadi Sebuah Kesalahan<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form action="/updatepersyaratan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                 
                                    <input type="hidden" name="id" value="{{ $user->biodata->id }}">
        
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Pas Foto 3x4 :</strong><br>
                                                @if($user->biodata->foto)
                                                    <img src="{{asset('images/' .$user->biodata->full_name. '/' .$user->biodata->foto)}}" class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @else
                                                    <img class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @endif
                                                <input type="file" name="foto" class="form-control" placeholder="Pas Foto" value="{{$user->biodata->foto}}" id="dokumen" onchange="previewDokumen()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Akte Kelahiran :</strong><br>
                                                @if($user->biodata->akte)
                                                    <iframe src="{{asset('images/' .$user->biodata->full_name. '/' .$user->biodata->akte)}}" align="top width="150" height="400" frameborder="0" scrolling="auto" class="dokumen-preview img-fluid mb-3 col-sm-3"></iframe>
                                                @else
                                                    <img class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @endif
                                                <input type="file" name="akte" class="form-control" placeholder="Akte Kelahiran" value="{{$user->biodata->akte}}" id="dokumen" onchange="previewDokumen()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Kartu Keluarga:</strong><br>
                                                @if($user->biodata->kk)
                                                    <iframe src="{{asset('images/' .$user->biodata->full_name. '/' .$user->biodata->kk)}}" align="top width="150" height="400" frameborder="0" scrolling="auto" class="dokumen-preview img-fluid mb-3 col-sm-3"></iframe>
                                                @else
                                                    <img class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @endif
                                                <input type="file" name="kk" class="form-control" placeholder="Kartu Keluarga" value="{{$user->biodata->kk}}" id="dokumen" onchange="previewDokumen()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>KTP Orang Tua / Wali :</strong><br>
                                                @if($user->biodata->ktp)
                                                    <img src="{{asset('images/' .$user->biodata->full_name. '/' .$user->biodata->ktp)}}" class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @else
                                                    <img class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @endif
                                                <input type="file" name="ktp" class="form-control" placeholder="KTP Orang Tua / Wali" value="{{$user->biodata->ktp}}" id="dokumen" onchange="previewDokumen()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Surat Keterangan Tidak Mampu (SKTM) :</strong><br>
                                                @if($user->biodata->sktm)
                                                    <iframe src="{{asset('images/' .$user->biodata->full_name. '/' .$user->biodata->sktm)}}" align="top width="150" height="400" frameborder="0" scrolling="auto" class="dokumen-preview img-fluid mb-3 col-sm-3"></iframe>
                                                @else
                                                    <img class="dokumen-preview img-fluid mb-3 col-sm-3">
                                                @endif
                                                <input type="file" name="sktm" class="form-control" placeholder="SKTM" value="{{$user->biodata->sktm}}" id="dokumen" onchange="previewDokumen()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                 
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script>
        function previewDokumen(){
             const dokumen = document.querySelector('#dokumen');
             const dokumenPreview = document.querySelector('.dokumen-preview')
             dokumenPreview.style.display = 'block';
    
             const oFReader = new FileReader();
             oFReader.readAsDataURL(dokumen.files[0]);
    
             oFReader.onload = function(oFREvent){
                dokumenPreview.src = oFREvent.target.result;
             }
        }
        </script>
@endsection