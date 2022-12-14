@extends('admin.layouts.main')

@section('container')
<div class="row">
    <div class="col-sm-12 mb-xl-0">
        <div class="d-flex bd-highlight ">
            <div class="me-auto p-2 bd-highlight">
                <h5 class="text-dark font-weight-bold py-2   m-0">Detail Qrcode </h6>

            </div>
            <div class="p-2 bd-highlight">

            </div>

        </div>
    </div>
</div>
<div class="row justify-content-center ">
    <div class="card float-start" style="width:500px;">
        <div class="card-body">
            <h4 class="card-title">Buat Qrcode meja</h4>
            <p>nama : <span class="text-muted">{{ $meja->nama }}</span></p>
            <p class="text-dark">created : <span class="text-muted">{{ $meja->created_at }}</span></p>
            <p class="m-0">Qrcode : </p>
            <p class="text-muted">{{ $meja->qrcode }}</p>

            <button class="btn btn-primary" id="cetak-qrcode"><i class="fas fa-print"></i> cetak Qrcode</button>

        </div>
    </div>
    <div class="card float-end ms-sm-0 ms-md-3 mt-sm-3 mt-md-3 mt-lg-0 " style="width:500px">
        <div class="card-body text-center">
            <h5 class="pb-2 ">Qrcode</h5>
            <div class="p-2" style="display:inline-block; border: 5px solid rgb(221, 221, 221); border-style: dashed;">
                <div class="text-center" style="border: 5px solid rgb(221, 221, 221); border-style: dashed;;">
                    {!! QrCode::size(300)->generate($meja->qrcode) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row float-end py-5">
    <form action="/admin/setting/meja/{{ $meja->id }}" method="post" id="submit-form" hidden>
        @method('delete')
        @csrf
    </form>
    <p class="me-5 pb-5"> Tekan <a href="/admin" id='delete-meja'>Hapus</a>, jika ingin menghapus Qrocode
        <b id="meja-nama">{{ $meja->nama }}</b> ?
    </p>
</div>
@endsection
@section('script')
<script>
    const btnDelete = document.getElementById('delete-meja');
        const meja = document.getElementById('meja-nama');
        btnDelete.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                text: "apakah anda yakin ingin meghapus " + meja.innerText,
                imageUrl: '/assets/images/sea_coff-logo.jpeg',
                showCancelButton: true,
                imageHeight: 80,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('submit-form').submit()

                }
            })
        })

        const cetakQr = document.getElementById('cetak-qrcode');
        cetakQr.addEventListener('click',function(e){
            alert('Fitur Cetak Qrcode Belum Tersedia')
        })
</script>
@endsection