namespace App\Controllers;

use App\Models\SiswaModel;

class SiswaController extends BaseController{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    //Tampilkan semua data 
    public function index()
    {
        $data['siswa'] = $this->siswaModel->findAll();
        return view('siswa/index', $data);
    }

    //Bagian tambah data
    public function create()
    {

    return view('siswa/Create');

    }

    //menyimpan data ke database
    public function store()

    {
        $This->siswaModel->save([
            'nama' => $this->request->getPost('nama'),
            'nis' => $this->request->getPost('nis'),
            'jurusan, => $this->request->getPost('jurusan'),
            ]),
            return redirect()->to('/siswa')->with('success', 'Data berhasil disimpan');
}
//menampilkan form edit data
    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        return view('siswa/edit', $data);
    }

    //menyimpan data yang di edit ke database
    public function update($id)
    {

        $this->siswaModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'nis' => $this->request->getPost('nis'),
            'jurusan' => $this->request->getPost('jurusan'),
        ]);
        return redirect()->to('/siswa')->with('success', 'Data berhasil diupdate');
    }

    //menghapus data
    public function delete($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/siswa')->with('success', 'Data berhasil dihapus');
    }
}
