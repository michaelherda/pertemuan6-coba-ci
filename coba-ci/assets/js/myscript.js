const flashData = $('.flash-data').data('flashdata');

if (flashData) {
  console.log("hello");
Swal.fire({
      title: 'Data Mahasiswa ',
      text: 'Berhasil ' + flashData,
      type: 'success'
});
}


// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data mahasiswa akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
              
            }
          })


});