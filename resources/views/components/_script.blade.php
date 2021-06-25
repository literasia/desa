{{-- Required Jquery --}}
<script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
{{-- waves js --}}
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
{{-- jquery slimscroll js --}}
<script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
{{-- Float Chart js --}}
<script src="{{ asset('assets/pages/chart/float/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/curvedLines.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script>
{{-- Chartlist charts --}}
<script src="{{ asset('bower_components/chartist/js/chartist.js') }}"></script>
{{-- amchart js --}}
<script src="{{ asset('assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/light.js') }}"></script>
{{-- Custom js --}}
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vertical/vertical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}" ></script>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/608138f662662a09efc0feb5/1f3scd0so';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

$(document).on('click', '.profile', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/profile/change-profile',
            dataType: 'JSON',
            success: function (data, username) {
                $('#username').val(data.username);
                $('#profile_name').val(data.data.desa);
                $('#profile_provinsi').val(data.data.provinsi);
                $('#profile_kabupaten').val(data.data.kabupaten);
                $('#profile_kecamatan').val(data.data.kecamatan);
                
                $('#modal-setting').modal('show');
            }
        });
    });

$('#form-profile').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: `{{ route('admin.change-profile.update') }}`,
                method: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.success) {
                        Swal.fire("Berhasil", data.success, "success");
                        $('#form-profile')[0].reset();
                        $('#modal-setting').modal('hide');
                    }else{
                        Swal.fire("Gagal", data.message, "error");
                    }
                },
            });
        });
</script>
<script>
    $(document).on('click', '.profile-employee', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/pegawai/profile',
            dataType: 'JSON',
            success: function (data) {
                $('.modal-title').html('Ganti Passwords');
                $('#btnUpdate')
                    .removeClass('btn-success')
                    .addClass('btn-info')
                    .text('Update');
                $('#btnCancel')
                    .removeClass('btn-outline-success')
                    .addClass('btn-outline-info')
                    .text('Batal');
                $('#modal-profile-employee').modal('show');
            }
        });
    });
    $('#form-profile-employee').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: `{{ route('pegawai.profile.change-profile') }}`,
                method: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        Swal.fire("Berhasil", data.message, "success");
                        $('#form-profile-employee')[0].reset();
                        $('#modal-profile-employee').modal('hide');
                    }else{
                        Swal.fire("Gagal", data.message, "error");
                    }
                },
            });
        });
</script>
{{-- add ons JS --}}
@stack('js')    