$(() => {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  const SWAL_CONFIG = {
    title: "Apa anda yakin?",
    text: "Data tidak bisa dikembalikan lagi setelahnya!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    cancelButtonColor: "#d33",
    reverseButtons: true,
    confirmButtonText: "Ya, Hapus",
    cancelButtonText: "Batal",
  };


  $("#nav-control").on('click', function() {
    $('#main-wrapper').toggleClass("menu-toggle");
    $(".hamburger").toggleClass("is-active");
  });
  
  if ($('#datatable').length) {
    $.extend(true, $.fn.dataTable.defaults, {
      language: {
        emptyTable: "Tidak ada data yang tersedia pada tabel ini",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
        infoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
        lengthMenu: "Tampilkan _MENU_ entri",
        loadingRecords: "Sedang memuat...",
        processing: "Sedang memproses...",
        search: "Cari:",
        zeroRecords: "Tidak ditemukan data yang sesuai",
        thousands: "'",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "Selanjutnya",
          previous: "Sebelumnya",
        },
        aria: {
          sortAscending: ": aktifkan untuk mengurutkan kolom ke atas",
          sortDescending: ": aktifkan untuk mengurutkan kolom menurun",
        },
        autoFill: {
          cancel: "Batalkan",
          fill: "Isi semua sel dengan <i>%d</i>",
          fillHorizontal: "Isi sel secara horizontal",
          fillVertical: "Isi sel secara vertikal",
        },
        buttons: {
          collection: "Kumpulan <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'/>",
          colvis: "Visibilitas Kolom",
          colvisRestore: "Kembalikan visibilitas",
          copy: "Salin",
          copySuccess: {
            "1": "1 baris disalin ke papan klip",
            _: "%d baris disalin ke papan klip",
          },
          copyTitle: "Salin ke Papan klip",
          csv: "CSV",
          excel: "Excel",
          pageLength: {
            "-1": "Tampilkan semua baris",
            "1": "Tampilkan 1 baris",
            _: "Tampilkan %d baris",
          },
          pdf: "PDF",
          print: "Cetak",
          copyKeys: "Tekan ctrl atau u2318 + C untuk menyalin tabel ke papan klip.<br /><br />Untuk membatalkan, klik pesan ini atau tekan esc.",
        },
        searchBuilder: {
          add: "Tambah Kondisi",
          button: {
            "0": "Cari Builder",
            _: "Cari Builder (%d)",
          },
          clearAll: "Bersihkan Semua",
          condition: "Kondisi",
          data: "Data",
          deleteTitle: "Hapus filter",
          leftTitle: "Ke Kiri",
          logicAnd: "Dan",
          logicOr: "Atau",
          rightTitle: "Ke Kanan",
          title: {
            "0": "Cari Builder",
            _: "Cari Builder (%d)",
          },
          value: "Nilai",
          conditions: {
            date: {
              after: "Setelah",
              before: "Sebelum",
              between: "Diantara",
              empty: "Kosong",
              equals: "Sama dengan",
              not: "Tidak sama",
              notBetween: "Tidak diantara",
              notEmpty: "Tidak kosong",
            },
            number: {
              between: "Diantara",
              empty: "Kosong",
              equals: "Sama dengan",
              gt: "Lebih besar dari",
              gte: "Lebih besar atau sama dengan",
              lt: "Lebih kecil dari",
              lte: "Lebih kecil atau sama dengan",
              not: "Tidak sama",
              notBetween: "Tidak diantara",
              notEmpty: "Tidak kosong",
            },
            string: {
              contains: "Berisi",
              empty: "Kosong",
              endsWith: "Diakhiri dengan",
              equals: "Sama Dengan",
              not: "Tidak sama",
              notEmpty: "Tidak kosong",
              startsWith: "Diawali dengan",
            },
            array: {
              equals: "Sama dengan",
              empty: "Kosong",
              contains: "Berisi",
              not: "Tidak",
              notEmpty: "Tidak kosong",
              without: "Tanpa",
            },
          },
        },
        searchPanes: {
          clearMessage: "Bersihkan Semua",
          count: "{total}",
          countFiltered: "{shown} ({total})",
          title: "Filter Aktif - %d",
          collapse: {
            "0": "Panel Pencarian",
            _: "Panel Pencarian (%d)",
          },
          emptyPanes: "Tidak Ada Panel Pencarian",
          loadMessage: "Memuat Panel Pencarian",
        },
        infoThousands: ",",
        searchPlaceholder: "Masukkan kata kunci yang dicari",
        select: {
          "1": "%d baris terpilih",
          _: "%d baris terpilih",
          cells: {
            "1": "1 sel terpilih",
            _: "%d sel terpilih",
          },
          columns: {
            "1": "1 kolom terpilih",
            _: "%d kolom terpilih",
          },
        },
        datetime: {
          previous: "Sebelumnya",
          next: "Selanjutnya",
          hours: "Jam",
          minutes: "Menit",
          seconds: "Detik",
          unknown: "-",
          amPm: ["am", "pm"],
        },
        editor: {
          close: "Tutup",
          create: {
            button: "Tambah",
            submit: "Tambah",
            title: "Tambah inputan baru",
          },
          remove: {
            button: "Hapus",
            submit: "Hapus",
            confirm: {
              _: "Apakah Anda yakin untuk menghapus %d baris?",
              "1": "Apakah Anda yakin untuk menghapus 1 baris?",
            },
            title: "Hapus inputan",
          },
          multi: {
            title: "Beberapa Nilai",
            info: "Item yang dipilih berisi nilai yang berbeda untuk input ini. Untuk mengedit dan mengatur semua item untuk input ini ke nilai yang sama, klik atau tekan di sini, jika tidak maka akan mempertahankan nilai masing-masing.",
            restore: "Batalkan Perubahan",
            noMulti: "Masukan ini dapat diubah satu per satu, tetapi bukan bagian dari grup.",
          },
          edit: {
            title: "Edit inputan",
            submit: "Edit",
            button: "Edit",
          },
          error: {
            system: 'Terjadi kesalahan pada system. (<a target="\\" rel="\\ nofollow" href="\\">Informasi Selebihnya</a>).',
          },
        },
      },
    });
  }

  $(document).on("click", ".delete-button", async function (e) {
    e.preventDefault();
    Swal
      .fire(SWAL_CONFIG)
      .then(result => {
        if(result.isConfirmed) {
          $.ajax({
            url: $(this).data("route") || $(this).prop("href"),
            type: "DELETE",
            dataType: "JSON",
            data: {
              _method: "DELETE",
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success(val) {
              Swal.fire("Sukses!", "Data berhasil dihapus", "success");
    
              $("#datatable").DataTable().ajax.reload();
            },
            error(xhr, ajaxOptions, thrownError) {
              Swal.fire("Gagal!", xhr.responseJSON.message || "Data Gagal Dihapus", "error");
            },
          });
        }
      });
  });

  $(document).on("click", ".custom-post-button", async function (e) {
    e.preventDefault();
    Swal
      .fire({...SWAL_CONFIG, text:  "Data akan diubah!", confirmButtonText: "Ya", cancelButtonText: "Batal" })
      .then(result => {
        if(result.isConfirmed) {
          $.ajax({
            url: $(this).data("route") || $(this).prop("href"),
            type: "POST",
            dataType: "JSON",
            data: {
              _method: "POST",
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success(val) {
              Swal.fire("Sukses!", "Data Berhasil Diubah!", "success");
    
              $("#datatable").DataTable().ajax.reload();
            },
            error(xhr, ajaxOptions, thrownError) {
              Swal.fire("Gagal!", xhr.responseJSON.message || "Data Gagal Diubah!", "error");
            },
          });
        }
      });
  });

  // Order
  $(document).on("click", ".order-confirm-button", async function (e) {
    e.preventDefault();
    Swal
      .fire({...SWAL_CONFIG, text:  "Order akan dimulai!", confirmButtonText: "Ya", cancelButtonText: "Batal"})
      .then(result => {
        if(result.isConfirmed) {
          $.ajax({
            url: $(this).data("route") || $(this).prop("href"),
            type: "POST",
            dataType: "JSON",
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success(val) {
              Swal.fire("Sukses!", "Order berhasil dimulai", "success");
    
              $("#datatable").DataTable().ajax.reload();
            },
            error(xhr, ajaxOptions, thrownError) {
              Swal.fire("Gagal!", xhr.responseJSON.message || "Order gagal dimulai", "error");
            },
          });
        }
      });
  });

  $(document).on("click", ".order-done-button", async function (e) {
    e.preventDefault();
    const isUser = $(this).data('role') == 'user';
    const redirect = `/user-feedbacks/create/${$(this).data('order-id')}`;
    Swal
      .fire({...SWAL_CONFIG, text:  "Order akan diselesaikan!", confirmButtonText: "Ya", cancelButtonText: "Batal"})
      .then(result => {
        if(result.isConfirmed) {
          $.ajax({
            url: $(this).data("route") || $(this).prop("href"),
            type: "POST",
            dataType: "JSON",
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success(val) {
              if(isUser) {
                Swal
                .fire({...SWAL_CONFIG, text:  "Order telah selesai! Apa anda ingin memberikan feedback?", confirmButtonText: "Ya", cancelButtonText: "Tidak", icon: 'success'})
                .then(result => {
                  if(result.isConfirmed) {
                    window.location.href = redirect;
                  }
                });
              } else {
                Swal.fire("Sukses!", "Order telah selesai", "success");
              }
              $("#datatable").DataTable().ajax.reload();
            },
            error(xhr, ajaxOptions, thrownError) {
              Swal.fire("Gagal!", xhr.responseJSON.message || "Order gagal dimulai", "error");
            },
          });
        }
      });
  });

  $(document).on("click", ".vehicle-notification-button", function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).data("route") || $(this).prop("href"),
      type: "POST",
      dataType: "JSON",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
      },
      success(val) {
        Swal.fire("Sukses!", "Pesan berhasil terkirim", "success");
      },
      error(xhr, ajaxOptions, thrownError) {
        Swal.fire("Gagal!", xhr.responseJSON.message || "Order gagal dimulai", "error");
      },
    });
  });
})