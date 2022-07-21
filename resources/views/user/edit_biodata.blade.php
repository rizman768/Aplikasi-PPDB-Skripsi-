@extends ('user.index')

@section ('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Biodata</h1>
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
                                        <strong>Kolom Tidak Boleh Kosong</strong><br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form action="/updatebiodata" method="POST">
                                    @csrf
                                 
                                    <input type="hidden" name="id" value="{{ $biodata->id }}">
        
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Full Name :</strong>
                                                <input type="text" name="nama" class="form-control" value="{{ $biodata->full_name }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Jenis Kelamin :</strong>
                                                <select class="form-select" name="jk" >
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>NIK :</strong>
                                                <input type="text" name="nik" class="form-control" value="{{ $biodata->nik }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Tempat, Tanggal Lahir :</strong>
                                                <input type="text" name="ttl" class="form-control" value="{{ $biodata->ttl }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Alamat :</strong>
                                                <textarea class="form-control" style="height:150px" name="alamat" value="{{ $biodata->alamat }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Agama :</strong>
                                                <input type="text" name="agama" class="form-control" value="{{ $biodata->agama }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Tempat Tinggal :</strong>
                                                <select class="form-select" name="tempat_tinggal" >
                                                        <option value="orang tua">Bersama Orang Tua</option>
                                                        <option value="saudara">Tinggal Dengan Saudara</option>
                                                        <option value="wali">Tinggal Dengan Wali</option>
                                                        <option value="lainnya">lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Nomor Handphone :</strong>
                                                <input type="text" name="hp" class="form-control" value="{{ $biodata->no_hp }}">
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
@endsection