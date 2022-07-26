<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Notif;
use App\Models\Role;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $user = User::count();
        $lengkap = Biodata::where('status', 'Sudah Lengkap')->count();
        $santri = Biodata::count();
        return view('admin.admin_dashboard', compact('user', 'lengkap', 'santri'));
    }

    public function manajemen_user(){
        $users = User::all();

        return view('admin.manajemen_user')->with(compact('users'));
    }

    
    public function edit_user($id){
        $user = User::where('id', $id)->first();
        $role = Role::all();
        return view('admin.edituser')->with(compact('user', 'role'));
    }

    public function update_user(Request $request)
    {        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'name.required' => 'Kolom Tidak Bolek Kosong',
            'email.required' => 'Kolom Tidak Boleh Kosong',
            'email.email' => 'Kolom harus dalam format email, contoh : yasin-assalam@gmail.com',
            'password.required' => 'Kolom Tidak Boleh Kosong',    
        ]);

        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'role_id' => $request->role_id
        ]);
           
        return redirect('manajemenuser')->with('success','Berhasil Terupdate');
    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->delete();
        $biodata = Biodata::where('user_id', $id)->delete();

        return redirect('manajemenuser')->with('success','Akun telah Terhapus');
    }

    public function daftar_santri(){
        $biodata = Biodata::get();

        return view('admin.daftar_santri')->with(compact('biodata'));
    }

    public function detail_santri($id){
        $biodata = Biodata::where('id', $id)->first();

        return view('admin.detail_santri')->with(compact('biodata'));
    }

    public function delete_biodata($id)
    {
        $biodata = Biodata::where('id', $id)->delete();

        return redirect('daftarsantri')->with('success','Form telah Terhapus');
    }
    

    public function cetak_pdf($id)
    {
    	$biodata = Biodata::where('id', $id)->first();
        return view('admin.cetak_pdf', compact('biodata'));
    	// $pdf = PDF::loadview('admin.cetak_pdf',['biodata'=>$biodata])->setPaper('A4','potrait');
    	// // return $pdf->download('form-santri-pdf');
        // return $pdf->Stream();
    }

    public function search(Request $request){
        $cari = $request->cari;
        $biodata = Biodata::where('full_name', 'like', "%".$request->cari."%")->orWhere('nik', 'like', "%" . $request->cari. "%")->paginate();

        // mengambil data terakhir dan pagination 10 list
        return view('admin.daftar_santri',['biodata' => $biodata])->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function report(){
        
        return view('admin.report');
    }

    public function tampil_cetak(Request $request){
        // $bulan = date('m',strtotime($request->bulan));
        $tahun = $request->tahun;

        // $laporan_bulan = Biodata::whereMonth('created_at', $bulan)->whereYear('created_at', date('Y'))->get();
        // $laporan = Biodata::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
        $laporan_tahun = Biodata::whereYear('created_at', $request->tahun)->get();
        return view('admin.tampil_cetak',compact('laporan_tahun', 'tahun'));
    }

    public function cetak_laporan($tahun)
    {
        // $bulan = date('m',strtotime($request->bulan));
        // $tahun = date('Y',strtotime($request->tahun));
        // $tahun = $request->tahun;
        
        $laporan_tahun = Biodata::whereYear('created_at', $tahun)->get();
        return view('admin.cetak_laporan', compact('laporan_tahun', 'tahun'));
    }
}
