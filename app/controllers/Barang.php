<?php
class Barang extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Barang',
            'index' => 'barang',
            'barangs' => $this->model('BarangModel')->getAllBarangs()
        ];
        $this->view('barang/layout/header', $data);
        $this->view('barang/index', $data);
        $this->view('barang/layout/footer', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Barang',
            'index' => 'barang',
            'barang' => $this->model('BarangModel')->getBarang($id),
            'barangs' => $this->model('BarangModel')->getAllBarangs()
        ];
        $this->view('barang/layout/header', $data);
        $this->view('barang/index', $data);
        $this->view('barang/layout/footer', $data);
    }

    public function create()
    {
        if ($this->model('BarangModel')->createBarang($_POST) > 0) {
            Flasher::setFlash('Data Barang', 'berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('Data Barang', 'gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('BarangModel')->deleteBarang($id) > 0) {
            Flasher::setFlash('Data Barang', 'berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('Data Barang', 'gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('BarangModel')->updateBarang($_POST) > 0) {
            Flasher::setFlash('Data Barang', 'berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('Data Barang', 'gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }
}
