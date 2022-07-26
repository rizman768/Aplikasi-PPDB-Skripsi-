@extends('admin.template')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Report Pendaftar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin-dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- <div class="col-7">
                <div class="text-end upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white"
                        target="_blank">Upgrade to Pro</a>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success')}}
                            </div>
                        @endif
                        <div class="col-my-12">
                            <form action="/tampil-cetak" method="GET" class="d-flex flex-row justify-content-center">
                                @csrf
                                <div class="form-group mx-3 focused">
                                    <select name="tahun" style="cursor:pointer;" class="form-select" id="tag_select1">
                                        <option value="0" selected> Pilih Tahun</option>
                                        <?php 
                                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }?>                       
                                    </select>
                                </div>
                                <div class="form-group">
                                  <button class="btn btn-success" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                            <div class="text-end upgrade-btn">
                                <a href="cetak-laporan/{{$tahun}}" target="_black" class="btn btn-danger text-white ">Cetak</a>
                           </div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Full Name</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th width="210px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0 ?>
                                    @foreach ( $laporan_tahun as $bio )
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $bio->nik }}</td>
                                            <td>{{ $bio->full_name }}</td>
                                            <td>{{ $bio->ttl }}</td>
                                            <td>{{ $bio->jenis_kelamin}}</td>
                                            <td>{{ $bio->alamat }}</td>
                                            @if ($bio->status == "Sudah Lengkap")
                                                <td><span class="label label-rounded label-success">{{ $bio->status }}</span></td>
                                            @else
                                                <td><span class="label label-rounded label-danger">{{ $bio->status }}</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
