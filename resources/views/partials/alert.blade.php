<script>
    @if (session()->has('succes'))
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

        Toast.fire({
            icon: 'success',
            title: "{{ session('succes') }}"
        })
    @endif

    @if (session()->has('failed'))
        swal("{{ session('failed')[0] }}", "{{session('failed')[1]}}", "error");
    @endif
</script>
